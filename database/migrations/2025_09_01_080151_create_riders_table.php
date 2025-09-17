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
        Schema::create('riders', function (Blueprint $table) {
            $table->id();
            // Relasi ke user (nullable)
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('nama');
            $table->string('panggilan')->nullable();
            $table->string('number_plate')->nullable();
            $table->string('team')->nullable();
            $table->string('asal_kota')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_kia')->nullable();
            // Upload file (simpan path)
            $table->string('photo_rider')->nullable();
            $table->string('photo_kia')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riders');
    }
};
