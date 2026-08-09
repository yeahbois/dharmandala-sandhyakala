<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->string('is_scanned')->nullable()->default('0')->change();
        });

        // Now that it is a string column, we can safely set NULL or empty strings to '0'
        DB::statement("UPDATE jvlyn_tickets SET is_scanned = '0' WHERE is_scanned IS NULL OR is_scanned = ''");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jvlyn_tickets', function (Blueprint $table) {
            $table->timestamp('is_scanned')->nullable()->change();
        });

        DB::statement("UPDATE jvlyn_tickets SET is_scanned = NULL WHERE is_scanned = '0'");
    }
};
