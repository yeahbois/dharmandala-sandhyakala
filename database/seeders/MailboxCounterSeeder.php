<?php

namespace Database\Seeders;

use App\Models\MailboxCounter;
use Illuminate\Database\Seeder;

class MailboxCounterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $emails = [
            'jvlynxticketing01@ospkmhthamrin.com',
            'jvlynxticketing02@ospkmhthamrin.com',
            'jvlynxticketing03@ospkmhthamrin.com',
            'jvlynxticketing04@ospkmhthamrin.com',
            'jvlynxticketing05@ospkmhthamrin.com',
            'jvlynxticketing06@ospkmhthamrin.com',
            'jvlynxticketing07@ospkmhthamrin.com',
            'jvlynxticketing08@ospkmhthamrin.com',
            'jvlynxticketing09@ospkmhthamrin.com',
            'jvlynxticketing10@ospkmhthamrin.com',
        ];

        foreach ($emails as $email) {
            MailboxCounter::updateOrCreate(
                ['mailbox_email' => $email],
                [
                    'current_usage' => 0,
                    'last_reset' => now()->toDateString(),
                ]
            );
        }
    }
}
