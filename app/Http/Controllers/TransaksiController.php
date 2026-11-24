<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Menampilkan Rekap Transaksi Laundry
    public function index(Request $request)
    {
        $status = $request->get('status');

        $query = Transaksi::with('layanan')->latest();

        // Filter berdasarkan status jika ada
        if ($status && in_array($status, ['proses', 'selesai'])) {
            $query->where('status', $status);
        }

        $transaksis = $query->get();
        $totalPemasukan = $transaksis->sum('total_harga');

        return view('transaksi.index', compact('transaksis', 'totalPemasukan', 'status'));
    }

    // Form input transaksi baru
    public function create()
    {
        $layanans = Layanan::all();

        // Generate kode transaksi otomatis, contoh: TRX-20261124-001
        $countToday = Transaksi::whereDate('created_at', today())->count() + 1;
        $kodeTransaksi = 'TRX-' . date('Ymd') . '-' . str_pad($countToday, 3, '0', STR_PAD_LEFT);

        return view('transaksi.create', compact('layanans', 'kodeTransaksi'));
    }

    // Simpan transaksi baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required|unique:transaksis,kode_transaksi',
            'nama_pelanggan' => 'required|string|max:100',
            'no_hp'          => 'required|string|max:20',
            'layanan_id'     => 'required|exists:layanans,id',
            'berat'          => 'required|numeric|min:0.1',
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);

        // Hitung total harga otomatis (harga layanan * berat)
        $totalHarga = $layanan->harga * $request->berat;

        Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_hp'          => $request->no_hp,
            'layanan_id'     => $request->layanan_id,
            'berat'          => $request->berat,
            'total_harga'    => $totalHarga,
            'status'         => 'proses', // default status
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat!');
    }

    // Update status pengerjaan (Proses -> Selesai)
    public function updateStatus(Transaksi $transaksi)
    {
        $statusBaru = $transaksi->status === 'proses' ? 'selesai' : 'proses';
        $transaksi->update(['status' => $statusBaru]);

        return redirect()->back()->with('success', "Status transaksi {$transaksi->kode_transaksi} berhasil diubah jadi {$statusBaru}!");
    }

    // Cetak nota transaksi (Fitur nilai plus penguji)
    public function cetak(Transaksi $transaksi)
    {
        return view('transaksi.nota', compact('transaksi'));
    }

    // Hapus transaksi (Opsional jika salah input)
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();
        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus!');
    }
}