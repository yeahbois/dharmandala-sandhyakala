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
        Schema::create('jvlyn_tickets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('ticket_type', 100)->nullable();
            $table->enum('ticket_status', ['pending_delivery', 'sent', 'failed'])->default('pending_delivery');
            $table->boolean('is_scanned')->default(false);
            $table->string('referral_code', 100)->nullable();
            $table->string('ticket_id', 100)->nullable()->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jvlyn_tickets');
    }
};
