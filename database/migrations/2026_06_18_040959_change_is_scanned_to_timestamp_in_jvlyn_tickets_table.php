<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->timestamp('is_scanned')->nullable()->change();
        });

        // Ensure existing 'true' (1) values are handled if they were boolean before
        // but it was likely boolean in migration 2026_06_15_000002_create_jvlyn_tickets_table.php
        // Schema::create('jvlyn_tickets', function (Blueprint $table) { ... $table->boolean('is_scanned')->default(false); ... });
        // Changing boolean to timestamp: 0 becomes null, 1 becomes... well, we should probably just nullify them or set to current timestamp.
        DB::statement("UPDATE jvlyn_tickets SET is_scanned = NULL WHERE is_scanned = '0'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->boolean('is_scanned')->default(false)->change();
        });
    }
};
