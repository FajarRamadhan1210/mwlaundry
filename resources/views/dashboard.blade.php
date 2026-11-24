@extends('layouts.app')

@section('title', 'Ikhtisar Harian - MW Steam Laundry Est. 1888')

@section('content')
<div class="row mb-4">
    <div class="col-12">
        <div class="card p-4">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3">
                <div>
                    <h3 class="fw-bold mb-1" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">
                        Selamat Bertugas, Tuan/Nyonya {{ Auth::user()->name }} 🎩
                    </h3>
                    <p class="text-muted mb-0 fst-italic" style="font-size: 1.1rem;">
                        Bertindak sebagai 
                        <span class="badge bg-primary text-uppercase">{{ Auth::user()->role }}</span> 
                        pada Pembukuan Steam Laundry & Garment Care MW Tahun 1888.
                    </p>
                </div>
                <div>
                    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                        <i class="bi bi-feather me-1"></i> Catat Pesanan Baru
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Kartu Statistik Bergaya 1800-an -->
<div class="row g-3 mb-4">
    <div class="col-md-3">
        <div class="card p-3 border-start border-4" style="border-left-color: var(--vintage-burgundy) !important;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="small fw-bold text-muted" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">JENIS LAYANAN</span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-family: 'Cinzel', serif;">{{ $totalLayanan }}</h2>
                </div>
                <div class="p-3 rounded-circle border border-warning" style="background-color: #ebdcc4; color: var(--vintage-burgundy);">
                    <i class="bi bi-journal-bookmark fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 border-start border-4" style="border-left-color: #c59837 !important;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="small fw-bold text-muted" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">DALAM PENGERJAAN</span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-family: 'Cinzel', serif; color: #856108;">{{ $transaksiProses }}</h2>
                </div>
                <div class="p-3 rounded-circle border border-warning" style="background-color: #f7edd4; color: #856108;">
                    <i class="bi bi-hourglass-split fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 border-start border-4" style="border-left-color: var(--vintage-forest) !important;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="small fw-bold text-muted" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">CUCIAN SELESAI</span>
                    <h2 class="fw-bold mb-0 mt-1" style="font-family: 'Cinzel', serif; color: #1e4128;">{{ $transaksiSelesai }}</h2>
                </div>
                <div class="p-3 rounded-circle border border-success" style="background-color: #e4efe7; color: #1e4128;">
                    <i class="bi bi-shield-check fs-3"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card p-3 border-start border-4" style="border-left-color: var(--vintage-leather) !important;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="small fw-bold text-muted" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">TOTAL PENDAPATAN</span>
                    <h4 class="fw-bold mb-0 mt-1" style="font-family: 'Cinzel', serif; color: var(--vintage-burgundy);">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h4>
                </div>
                <div class="p-3 rounded-circle border border-warning" style="background-color: #ebdcc4; color: var(--vintage-leather);">
                    <i class="bi bi-safe2 fs-3"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Transaksi Terbaru (Buku Catatan Klasik) -->
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h4 class="fw-bold mb-0" style="font-family: 'Cinzel', serif;">
                <i class="bi bi-book me-2" style="color: var(--vintage-gold);"></i>Buku Besar Transaksi Terakhir
            </h4>
            <small class="text-muted fst-italic">Catatan 5 cucian masuk paling mutakhir</small>
        </div>
        <a href="{{ route('transaksi.index') }}" class="btn btn-sm btn-outline-primary">Lihat Seluruh Arsip</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Kode Stempel</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Layanan</th>
                    <th>Bobot</th>
                    <th>Biaya Layanan</th>
                    <th>Status Pengerjaan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksiTerbaru as $trx)
                    <tr>
                        <td>
                            <span class="badge border border-secondary text-dark" style="background-color: #ece3d2; font-family: 'Cinzel', serif;">
                                {{ $trx->kode_transaksi }}
                            </span>
                        </td>
                        <td>
                            <strong class="d-block" style="font-size: 1.15rem;">{{ $trx->nama_pelanggan }}</strong>
                            <small class="text-muted"><i class="bi bi-telephone me-1"></i>{{ $trx->no_hp }}</small>
                        </td>
                        <td>
                            <strong>{{ $trx->layanan->nama_layanan ?? '-' }}</strong><br>
                            <small class="text-muted">Estimasi: {{ $trx->layanan->durasi ?? '-' }}</small>
                        </td>
                        <td><span class="fw-bold">{{ $trx->berat }}</span> kg</td>
                        <td class="fw-bold" style="color: var(--vintage-burgundy); font-size: 1.1rem;">
                            Rp {{ number_format($trx->total_harga, 0, ',', '.') }}
                        </td>
                        <td>
                            @if ($trx->status == 'proses')
                                <span class="badge bg-warning"><i class="bi bi-hourglass-split me-1"></i>Dalam Proses</span>
                            @else
                                <span class="badge bg-success"><i class="bi bi-check2-circle me-1"></i>Tuntas Dikerjakan</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted fst-italic">Belum ada catatan transaksi pada buku besar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
