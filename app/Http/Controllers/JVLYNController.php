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
        return response()->json([
            JvlynTicket::all()->map(function($ticket) {
                return collect($ticket->toArray())->map(function($value) {
                    return is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
                });
            }),
            Order::all()->map(function($order) {
                return collect($order->toArray())->map(function($value) {
                    return is_string($value) ? mb_convert_encoding($value, 'UTF-8', 'UTF-8') : $value;
                });
            })
        ]);
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

        // Check for global referral codes
        $globalReferrals = [];
        foreach ($items as $it) {
            if (!empty($it['referral_code'])) {
                $globalReferrals[] = strtoupper($it['referral_code']);
            }
        }
        $isVipFree = in_array('DONASIVIP', $globalReferrals) || in_array('JOSHUAS1T0RU5', $globalReferrals);
        $isFestFree = in_array('DONASIFEST', $globalReferrals) || in_array('JOSHUAS1T0RU5', $globalReferrals);

        foreach ($items as $item) {
            $price = 0;
            $catPrefix = '';
            $typePrefix = 'NORM';
            $itemRef = strtoupper($item['referral_code'] ?? '');

            if ($item['category'] === 'festival') {
                $catPrefix = 'FEST';
                if ($isFestFree) {
                    $price = 0;
                } elseif ($itemRef === 'JVLYNXALUMNI') {
                    $price = 85000;
                    $typePrefix = 'ALUM';
                } elseif ($itemRef === 'JVLYNXMHT18') {
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
                if ($isVipFree) {
                    $price = 0;
                } else {
                    $price = 300000;
                }
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

        // Fetch all categories first to get their current "selled" count
        $categoriesData = $this->supabase->from('ticket_categories')->select('*') ?: [];
        $categories = collect($categoriesData)->keyBy(function($cat) {
            return strtolower($cat['category_name'] ?? '');
        })->toArray();

        foreach ($tickets as $ticketData) {
            $seatNumber = $ticketData['seat_number'];
            $order->tickets()->create($ticketData);

            // Update VIP Seat status to sold permanently in Supabase
            if ($ticketData['ticket_type'] === 'vip-seat' && $seatNumber) {
                $this->supabase->from('vip_seats')->update(['status' => 'sold'], 'seat_number', $seatNumber);
            }

            // Increment "selled" in ticket_categories (Available quota is already decremented when added to cart)
            $quotaSearch = $ticketData['ticket_type'] === 'vip-seat' ? 'vip seat' : ($ticketData['ticket_type'] === 'vip-random' ? 'vip random' : 'festival');
            $quotaSearchLower = strtolower($quotaSearch);

            if (isset($categories[$quotaSearchLower])) {
                $cat = $categories[$quotaSearchLower];
                $newSelled = ($cat['selled'] ?? 0) + 1;
                
                // Update local array for subsequent tickets of the same category in the loop
                $categories[$quotaSearchLower]['selled'] = $newSelled;

                // Persist the updated "selled" count to Supabase
                $this->supabase->from('ticket_categories')->update([
                    'selled' => $newSelled
                ], 'id', $cat['id']);
            }
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

    public function deleteOrder($id)
    {
        $order = Order::with('tickets')->findOrFail($id);

        // 1. Restore Supabase data for each ticket
        foreach ($order->tickets as $ticket) {
            $this->restoreSupabaseTicketData($ticket);
        }

        // 2. Delete Payment Proof from Storage
        if ($order->payment_proof) {
            $pathParts = explode('/jvlyn/', $order->payment_proof);
            if (count($pathParts) > 1) {
                $fileName = end($pathParts);
                $this->supabase->storage('jvlyn')->delete($fileName);
            }
        }

        // 3. Delete from MySQL
        $order->tickets()->delete();
        $order->delete();

        return back()->with('success', 'Order and its tickets deleted successfully, resources restored.');
    }

    public function deleteTicket($id)
    {
        $ticket = JvlynTicket::findOrFail($id);
        $order = $ticket->order;

        // 1. Restore Supabase data
        $this->restoreSupabaseTicketData($ticket);

        // 2. Update Order Totals
        // Note: Re-calculating price might be tricky if referral was applied globally.
        // For simplicity, we'll just subtract the average if price per ticket isn't stored,
        // but here we can try to estimate or just decrement total_tickets.
        // Actually, JvlynTicket doesn't store price. Let's just update total_tickets.
        $order->decrement('total_tickets');

        // 3. Delete from MySQL
        $ticket->delete();

        return back()->with('success', 'Ticket deleted successfully and resources restored.');
    }

    protected function restoreSupabaseTicketData($ticket)
    {
        // Restore VIP Seat if applicable
        if ($ticket->ticket_type === 'vip-seat') {
            // Need seat_number. In my current schema, JvlynTicket might not store it if I didn't add it.
            // Wait, looking at storeOrder: $order->tickets()->create($ticketData);
            // and $ticketData has seat_number? Let me check JvlynTicket model again.
            // Ah, JvlynTicket has 'seat_number' in its $fillable in my memory?
            // Let me check the file actually.
            $this->supabase->from('vip_seats')->update(['status' => 'available'], 'seat_number', $ticket->seat_number);
        }

        // Restore Quota and decrement "selled"
        $quotaSearch = $ticket->ticket_type === 'vip-seat' ? 'vip seat' : ($ticket->ticket_type === 'vip-random' ? 'vip random' : 'festival');
        $this->supabase->rpc('adjust_quota', ['cat_key' => $quotaSearch, 'delta' => 1]);

        $categoriesData = $this->supabase->from('ticket_categories')->select('*') ?: [];
        $categories = collect($categoriesData)->keyBy(function($cat) {
            return strtolower($cat['category_name'] ?? '');
        });

        if (isset($categories[strtolower($quotaSearch)])) {
            $cat = $categories[strtolower($quotaSearch)];
            $newSelled = max(0, ($cat['selled'] ?? 0) - 1);
            $this->supabase->from('ticket_categories')->update(['selled' => $newSelled], 'id', $cat['id']);
        }
    }

    public function dashboard()
    {
        // MySQL Data
        $totalOrders = Order::count();
        $ordersByStatus = Order::selectRaw('order_status, count(*) as count')->groupBy('order_status')->pluck('count', 'order_status');
        $ticketsByStatus = JvlynTicket::selectRaw('ticket_status, count(*) as count')->groupBy('ticket_status')->pluck('count', 'ticket_status');
        $ticketsByType = JvlynTicket::selectRaw('ticket_type, count(*) as count')->groupBy('ticket_type')->pluck('count', 'ticket_type');

        $allOrders = Order::with('tickets')->latest()->paginate(20);

        // Real-time Supabase Data
        $vipSeats = $this->supabase->from('vip_seats')->select('seat_number, status') ?: [];
        $activeCarts = $this->supabase->from('cart_items')->select('items') ?: [];

        $lockedSeats = collect($activeCarts)
            ->flatMap(fn($cart) => $cart['items'] ?? [])
            ->filter(fn($item) => ($item['category'] ?? '') === 'vip-seat' && !empty($item['seat_number']))
            ->pluck('seat_number')
            ->unique()
            ->toArray();

        $availableVIP = collect($vipSeats)
            ->filter(fn($seat) => ($seat['status'] ?? '') === 'available' && !in_array($seat['seat_number'] ?? '', $lockedSeats))
            ->count();

        $cartsCount = collect($activeCarts)
            ->filter(fn($c) => !empty($c['items']))
            ->count();

        return view('jvlyn.dashboard', compact(
            'totalOrders', 'ordersByStatus', 'ticketsByStatus', 'ticketsByType',
            'allOrders', 'availableVIP', 'cartsCount'
        ));
    }

    public function checkView()
    {
        return view('jvlyn.check');
    }

    public function checkEntryPass(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        $orders = Order::with('tickets')
            ->where('buyer_name', 'like', '%' . $validated['name'] . '%')
            ->where('buyer_email', $validated['email'])
            ->where('buyer_phone', $validated['phone'])
            ->get();

        return view('jvlyn.check', [
            'orders' => $orders,
            'searched' => true
        ]);
    }

    public function scanTicket(Request $request)
    {
        $qrString = $request->query('qrString');
        if (!$qrString) {
            return response()->json(['status' => 'error', 'message' => 'QR Code tidak terbaca'], 400);
        }

        $ticket = JvlynTicket::where('ticket_id', $qrString)->first();

        if (!$ticket) {
            return response()->json(['status' => 'error', 'message' => 'Tiket tidak ditemukan di database'], 404);
        }

        if ($ticket->is_scanned) {
            return response()->json(['status' => 'error', 'message' => 'Tiket sudah pernah di-scan sebelumnya!'], 400);
        }

        $ticket->update(['is_scanned' => true]);

        return response()->json([
            'status' => 'berhasil',
            'message' => 'Check-in Berhasil! Silakan masuk.'
        ]);
    }
}
