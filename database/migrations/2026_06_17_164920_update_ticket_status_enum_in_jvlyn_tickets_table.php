<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Using DB::statement because Schema doesn't support changing ENUM values easily across all DB drivers
        if (config('database.default') !== 'sqlite') {
            DB::statement("ALTER TABLE jvlyn_tickets MODIFY COLUMN ticket_status ENUM('pending_delivery', 'sent', 'failed', 'fail_order') DEFAULT 'pending_delivery'");
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (config('database.default') !== 'sqlite') {
            DB::statement("ALTER TABLE jvlyn_tickets MODIFY COLUMN ticket_status ENUM('pending_delivery', 'sent', 'failed') DEFAULT 'pending_delivery'");
        }
    }
};
