<?php

namespace App\Http\Controllers;

use App\Services\SupabaseService;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    protected SupabaseService $supabase;

    // Inject SupabaseService lewat Constructor
    public function __construct(SupabaseService $supabase)
    {
        $this->supabase = $supabase;
    }

    /**
     * Mendapatkan Kuota Live Tiket dari Supabase untuk dikirim ke Tampilan Web
     */
    public function getLiveQuota()
    {
        // Mengambil kolom id, category_name, dan available_quota dari tabel ticket_categories
        $categories = $this->supabase->from('ticket_categories')->select('id,category_name,available_quota');

        return response()->json([
            'status' => 'success',
            'data' => $categories
        ]);
    }

    /**
     * Menyimpan Keranjang Sementara (Cart Items) User Baru ke Supabase
     */
    public function addToCart(Request $request)
    {
        // Validasi request input dari user
        $request->validate([
            'session_id' => 'required|string',
            'category_id' => 'required|integer',
            'quantity' => 'required|integer'
        ]);

        // Hitung masa kadaluarsa keranjang (Waktu Sekarang + 5 Menit)
        $expiresAt = now()->addMinutes(5)->toIso8601String();

        $cartData = [
            'session_id' => $request->session_id,
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'expires_at' => $expiresAt
        ];

        // Lakukan eksekusi INSERT ke tabel cart_items di Supabase
        $result = $this->supabase->from('cart_items')->insert($cartData);

        return response()->json([
            'status' => 'success',
            'message' => 'Berhasil menambahkan tiket ke dalam keranjang',
            'data' => $result
        ]);
    }
}