<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thanos_responders', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('event_id');
            $blueprint->string('name');
            $blueprint->string('answer');
            $blueprint->string('payment');
            $blueprint->string('payment_number');
            $blueprint->string('phone');
            $blueprint->timestamps();

            $blueprint->foreign('event_id')->references('event_id')->on('thanos_events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thanos_responders');
    }
};
