<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    // Menampilkan daftar layanan
    public function index()
    {
        $layanans = Layanan::latest()->get();
        return view('layanan.index', compact('layanans'));
    }

    // Form tambah layanan (Khusus Admin)
    public function create()
    {
        return view('layanan.create');
    }

    // Simpan layanan baru (Khusus Admin)
    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'harga'        => 'required|numeric|min:0',
            'durasi'       => 'required|string|max:50',
        ]);

        Layanan::create($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    // Form edit layanan (Khusus Admin)
    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    // Update layanan (Khusus Admin)
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama_layanan' => 'required|string|max:100',
            'harga'        => 'required|numeric|min:0',
            'durasi'       => 'required|string|max:50',
        ]);

        $layanan->update($request->all());

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui!');
    }

    // Hapus layanan (Khusus Admin)
    public function destroy(Layanan $layanan)
    {
        // Cek jika layanan masih dipakai di transaksi
        if ($layanan->transaksis()->count() > 0) {
            return back()->with('error', 'Layanan tidak bisa dihapus karena masih ada transaksi yang terhubung!');
        }

        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus!');
    }
}