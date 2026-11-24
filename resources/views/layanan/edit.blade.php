@extends('layouts.app')

@section('title', 'Edit Layanan - MW Laundry')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card p-4 bg-white">
            <h4 class="fw-bold mb-3"><i class="bi bi-pencil-square me-2 text-warning"></i>Edit Jenis Layanan</h4>

            <form action="{{ route('layanan.update', $layanan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Layanan</label>
                    <input type="text" name="nama_layanan" value="{{ old('nama_layanan', $layanan->nama_layanan) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Harga per Kg (Rp)</label>
                    <input type="number" name="harga" value="{{ old('harga', $layanan->harga) }}" class="form-control" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Estimasi Durasi Selesai</label>
                    <input type="text" name="durasi" value="{{ old('durasi', $layanan->durasi) }}" class="form-control" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('layanan.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning text-white"><i class="bi bi-check-circle me-1"></i> Update Layanan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection