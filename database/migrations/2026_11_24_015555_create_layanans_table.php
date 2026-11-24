<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('layanans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_layanan');       // contoh: Reguler, Ekspres, Superkilat
        $table->integer('harga');              // harga per kg, misal: 7000, 12000, 25000
        $table->string('durasi');              // misal: 3-4 hari, 1-2 hari, 5 jam
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
