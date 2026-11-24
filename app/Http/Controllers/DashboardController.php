<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLayanan = Layanan::count();
        $transaksiProses = Transaksi::where('status', 'proses')->count();
        $transaksiSelesai = Transaksi::where('status', 'selesai')->count();
        $totalPendapatan = Transaksi::sum('total_harga');

        // 5 transaksi terbaru
        $transaksiTerbaru = Transaksi::with('layanan')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalLayanan',
            'transaksiProses',
            'transaksiSelesai',
            'totalPendapatan',
            'transaksiTerbaru'
        ));
    }
}