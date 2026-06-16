<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JvlynTicket;
use App\Models\Order;
use App\Services\SupabaseService;
use Illuminate\Support\Str;

class JVLYNController extends Controller
{
    protected $supabase;

    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    public function data()
    {
        return response()->json([JvlynTicket::all(), Order::all()]);
    }

    public function storeOrder(Request $request)
    {
        $validated = $request->validate([
            'buyer_name' => 'required|string|max:255',
            'buyer_email' => 'required|email|max:255',
            'buyer_phone' => 'required|string|max:20',
            'session_id' => 'required|string',
            'payment_proof' => 'required|image|max:5120', // 5MB
        ]);

        // Fetch cart from Supabase
        $cartData = $this->supabase->from('cart_items')
            ->eq('session_id', $validated['session_id'])
            ->select('items') ?: [];

        if (empty($cartData) || empty($cartData[0]['items'])) {
            return response()->json(['message' => 'Cart is empty or session expired'], 400);
        }

        $items = $cartData[0]['items'];
        $totalPrice = 0;
        $tickets = [];

        foreach ($items as $item) {
            $price = 0;
            $catPrefix = '';
            $typePrefix = 'NORM';

            if ($item['category'] === 'festival') {
                $catPrefix = 'FEST';
                if (($item['referral_code'] ?? '') === 'JVLYNXALUMNI') {
                    $price = 85000;
                    $typePrefix = 'ALUM';
                } elseif (($item['referral_code'] ?? '') === 'JVLYNXMHT18') {
                    $price = 132000;
                    $typePrefix = 'MH18';
                } else {
                    $price = 150000;
                }
            } elseif ($item['category'] === 'vip-seat') {
                $catPrefix = 'VIP1';
                $price = 325000;
            } elseif ($item['category'] === 'vip-random') {
                $catPrefix = 'VIP2';
                $price = 300000;
            }

            $totalPrice += $price;

            // Generate Ticket ID: [FEST/VIP1/VIP2][NORM/ALUM/MH18][RANDOM 2 NUMBERS AND 3 ALPHABETS]
            $randomPart = $this->generateRandomTicketSuffix();
            $ticketId = $catPrefix . $typePrefix . $randomPart;

            $tickets[] = [
                'ticket_type' => $item['category'],
                'ticket_status' => 'pending_delivery',
                'referral_code' => $item['referral_code'] ?? null,
                'ticket_id' => $ticketId,
                'is_scanned' => false,
                'seat_number' => $item['seat_number'] ?? null,
            ];
        }

        // Upload payment proof
        $file = $request->file('payment_proof');
        $fileName = time() . '_' . $file->getClientOriginalName();
        $uploadResult = $this->supabase->storage('jvlyn')->upload($fileName, $file);

        if (isset($uploadResult['error'])) {
            return response()->json(['message' => 'Upload failed', 'error' => $uploadResult['error']], 500);
        }

        $paymentProofUrl = $this->supabase->storage('jvlyn')->getPublicUrl($fileName);

        // Save to MySQL
        $order = Order::create([
            'buyer_name' => $validated['buyer_name'],
            'buyer_email' => $validated['buyer_email'],
            'buyer_phone' => $validated['buyer_phone'],
            'price' => $totalPrice,
            'payment_proof' => $paymentProofUrl,
            'total_tickets' => count($tickets),
            'order_status' => 'pending',
        ]);

        foreach ($tickets as $ticketData) {
            $seatNumber = $ticketData['seat_number'];
            unset($ticketData['seat_number']);
            $order->tickets()->create($ticketData);

            // Update VIP Seat status to sold permanently in Supabase
            if ($ticketData['ticket_type'] === 'vip-seat' && $seatNumber) {
                $this->supabase->from('vip_seats')->update(['status' => 'sold'], 'seat_number', $seatNumber);
            }

            // Decrement quota in ticket_categories
            $quotaSearch = $ticketData['ticket_type'] === 'vip-seat' ? 'vip seat' : ($ticketData['ticket_type'] === 'vip-random' ? 'vip random' : 'festival');
            $this->supabase->rpc('adjust_quota', ['cat_key' => $quotaSearch, 'delta' => -1]);
        }

        // Clear Supabase Cart
        $this->supabase->from('cart_items')->update(['items' => []], 'session_id', $validated['session_id']);

        return response()->json([
            'message' => 'Order placed successfully',
            'order_id' => $order->id
        ]);
    }

    private function generateRandomTicketSuffix()
    {
        $numbers = '0123456789';
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $res = '';
        for ($i = 0; $i < 2; $i++) {
            $res .= $numbers[rand(0, strlen($numbers) - 1)];
        }
        for ($i = 0; $i < 3; $i++) {
            $res .= $letters[rand(0, strlen($letters) - 1)];
        }

        return $res;
    }

    public function summary($order_id)
    {
        $order = Order::with('tickets')->findOrFail($order_id);
        return view('jvlyn.summary', compact('order'));
    }

    public function checker()
    {
        $orders = Order::with('tickets')->where('order_status', 'pending')->latest()->get();
        return view('jvlyn.checker', compact('orders'));
    }

    public function updateOrderStatus(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'action' => 'required|in:approve,decline',
        ]);

        $order = Order::findOrFail($validated['order_id']);

        if ($validated['action'] === 'approve') {
            $order->update(['order_status' => 'paid']);
            $order->tickets()->update(['ticket_status' => 'pending_delivery']);
        } else {
            $order->update(['order_status' => 'declined']);
            $order->tickets()->update(['ticket_status' => 'fail_order']);
        }

        return back()->with('success', 'Order ' . $validated['action'] . 'd successfully');
    }

    public function dashboard()
    {
        // MySQL Data
        $totalOrders = Order::count();
        $ordersByStatus = Order::selectRaw('order_status, count(*) as count')->groupBy('order_status')->pluck('count', 'order_status');
        $ticketsByStatus = JvlynTicket::selectRaw('ticket_status, count(*) as count')->groupBy('ticket_status')->pluck('count', 'ticket_status');
        $ticketsByType = JvlynTicket::selectRaw('ticket_type, count(*) as count')->groupBy('ticket_type')->pluck('count', 'ticket_type');

        $allOrders = Order::with('tickets')->latest()->get();

        // Real-time Supabase Data
        $vipSeats = $this->supabase->from('vip_seats')->select('id, status');
        $availableVIP = collect($vipSeats)->where('status', 'available')->count();

        $activeCarts = $this->supabase->from('cart_items')->select('session_id, items');
        $cartsCount = collect($activeCarts)->filter(fn($c) => !empty($c['items']))->count();

        return view('jvlyn.dashboard', compact(
            'totalOrders', 'ordersByStatus', 'ticketsByStatus', 'ticketsByType',
            'allOrders', 'availableVIP', 'cartsCount'
        ));
    }
}
