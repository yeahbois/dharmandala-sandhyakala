<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\JvlynTicket;
use Illuminate\Database\Seeder;

class JvlynTicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::updateOrCreate(
            ['buyer_email' => 'saviourly@gmail.com'],
            [
                'buyer_name' => 'Saviourly',
                'buyer_phone' => '081234567890',
                'price' => 125000,
                'total_tickets' => 1,
                'payment_proof' => 'hello.jpg',
                'order_status' => 'paid',
            ]
        );

        JvlynTicket::updateOrCreate(
            [
                'order_id' => $order->id,
                'ticket_type' => 'VIP',
            ],
            [
                'ticket_status' => 'pending_delivery',
                'is_scanned' => '0',
                'referral_code' => 'SAVIOURLY10',
                'ticket_id' => 'TKT-VIP-0001',
            ]
        );
    }
}
