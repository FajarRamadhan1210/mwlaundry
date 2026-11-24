<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('transaksis', function (Blueprint $table) {
        $table->id();
        $table->string('kode_transaksi')->unique(); // misal: TRX-20261124-001
        $table->string('nama_pelanggan');
        $table->string('no_hp');
        $table->foreignId('layanan_id')->constrained('layanans')->onDelete('cascade'); // Relasi wajib
        $table->decimal('berat', 8, 2);              // berat dalam kg (misal 2.5 kg)
        $table->integer('total_harga');              // harga * berat
        $table->enum('status', ['proses', 'selesai'])->default('proses'); // status pengerjaan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
