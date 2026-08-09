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
        Schema::create('program_kerjas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->date('date')->nullable();
            $table->longText('content')->nullable();
            $table->json('pictures_urls')->nullable();
            $table->foreignId('divisi_id')->nullable()->constrained('divisis')->onDelete('cascade');
            $table->string('type')->default('osis'); // osis or mpk
            $table->boolean('featured')->default(false);
            $table->boolean('homepage')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_kerjas');
    }
};
