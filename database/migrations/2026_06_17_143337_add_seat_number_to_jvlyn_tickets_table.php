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
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->string('seat_number', 10)->nullable()->after('ticket_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->dropColumn('seat_number');
        });
    }
};
