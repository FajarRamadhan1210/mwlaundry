<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode_transaksi',
        'nama_pelanggan',
        'no_hp',
        'layanan_id',
        'berat',
        'total_harga',
        'status',
    ];

    // Relasi: Satu transaksi terhubung ke satu jenis layanan
    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}