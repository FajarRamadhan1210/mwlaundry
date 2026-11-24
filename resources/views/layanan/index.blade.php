@extends('layouts.app')

@section('title', 'Data Layanan - MW Laundry')

@section('content')
<div class="card p-4 bg-white">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1"><i class="bi bi-tags me-2 text-primary"></i>Daftar Jenis Layanan</h4>
            <p class="text-muted small mb-0">Kelola tarif dan estimasi waktu pengerjaan laundry</p>
        </div>
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('layanan.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Layanan
            </a>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th style="width: 60px;">No</th>
                    <th>Nama Layanan</th>
                    <th>Harga / Kg</th>
                    <th>Estimasi Durasi</th>
                    @if (Auth::user()->role === 'admin')
                        <th class="text-center" style="width: 160px;">Aksi</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @forelse ($layanans as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-bold text-dark">{{ $item->nama_layanan }}</td>
                        <td class="text-primary fw-semibold">Rp {{ number_format($item->harga, 0, ',', '.') }} / kg</td>
                        <td><span class="badge bg-secondary">{{ $item->durasi }}</span></td>
                        @if (Auth::user()->role === 'admin')
                            <td class="text-center">
                                <a href="{{ route('layanan.edit', $item->id) }}" class="btn btn-sm btn-outline-warning me-1">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <form action="{{ route('layanan.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        @endif
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">Belum ada jenis layanan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection