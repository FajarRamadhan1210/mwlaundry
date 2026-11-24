@extends('layouts.app')

@section('title', 'Tambah Layanan - MW Laundry')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 bg-white">
            <h4 class="fw-bold mb-3"><i class="bi bi-plus-circle me-2 text-primary"></i>Tambah Jenis Layanan</h4>

            <form action="{{ route('layanan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Layanan</label>
                    <input type="text" name="nama_layanan" value="{{ old('nama_layanan') }}" class="form-control" placeholder="Contoh: Reguler / Kilat" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga per Kg (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga') }}" class="form-control" placeholder="Contoh: 8000" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Estimasi Durasi Selesai</label>
                    <input type="text" name="durasi" value="{{ old('durasi') }}" class="form-control" placeholder="Contoh: 2-3 hari / 5 jam" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection