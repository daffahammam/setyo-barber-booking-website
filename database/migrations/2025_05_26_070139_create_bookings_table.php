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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
           // $table->foreignId('user_id')->constrained()->onDelete('cascade');
            //$table->foreignId('capster_id')->constrained()->onDelete('cascade');
            $table->string('name'); // tanggal jadwal booking
            $table->string('phone'); // tanggal jadwal booking
            $table->date('date'); // tanggal jadwal booking
            $table->time('time')->format('H:i'); // Waktu jadwal booking
            $table->enum('barber', ['Setyo', 'Thariq']); // Pilihan tukang cukur
            $table->enum('status', ['diterima', 'proses', 'selesai'])->default('diterima');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
