@extends('layouts.app')

@section('title', 'Rekap Transaksi - MW Laundry')

@section('content')
<div class="card p-4 bg-white">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
        <div>
            <h4 class="fw-bold mb-1"><i class="bi bi-receipt me-2 text-primary"></i>Rekap Transaksi Laundry</h4>
            <p class="text-muted small mb-0">Kelola dan pantau seluruh cucian yang masuk dan selesai</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('transaksi.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Transaksi Baru
            </a>
        </div>
    </div>

    <!-- Filter Status -->
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-3 bg-light rounded">
        <div class="btn-group mb-2 mb-md-0" role="group">
            <a href="{{ route('transaksi.index') }}" class="btn btn-sm {{ empty($status) ? 'btn-primary' : 'btn-outline-primary' }}">Semua</a>
            <a href="{{ route('transaksi.index', ['status' => 'proses']) }}" class="btn btn-sm {{ $status == 'proses' ? 'btn-warning text-dark fw-bold' : 'btn-outline-warning text-dark' }}">Sedang Proses</a>
            <a href="{{ route('transaksi.index', ['status' => 'selesai']) }}" class="btn btn-sm {{ $status == 'selesai' ? 'btn-success fw-bold' : 'btn-outline-success' }}">Selesai</a>
        </div>
        <div class="text-end">
            <span class="text-muted small">Total Pemasukan (Tercantum):</span>
            <span class="fw-bold fs-6 text-success ms-1">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</span>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode TRX</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Layanan & Tarif</th>
                    <th>Berat</th>
                    <th>Total Bayar</th>
                    <th>Status Pengerjaan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksis as $index => $trx)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $trx->kode_transaksi }}</span></td>
                        <td class="small text-muted">{{ $trx->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <div class="fw-bold">{{ $trx->nama_pelanggan }}</div>
                            <small class="text-muted"><i class="bi bi-telephone"></i> {{ $trx->no_hp }}</small>
                        </td>
                        <td>
                            <span class="fw-semibold text-dark">{{ $trx->layanan->nama_layanan ?? '-' }}</span><br>
                            <small class="text-muted">Rp {{ number_format($trx->layanan->harga ?? 0, 0, ',', '.') }}/kg ({{ $trx->layanan->durasi ?? '-' }})</small>
                        </td>
                        <td><span class="fw-bold">{{ $trx->berat }}</span> kg</td>
                        <td class="fw-bold text-primary">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                        <td>
                            @if ($trx->status == 'proses')
                                <span class="badge bg-warning text-dark"><i class="bi bi-arrow-repeat"></i> Proses</span>
                            @else
                                <span class="badge bg-success"><i class="bi bi-check-circle"></i> Selesai</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <!-- Tombol Update Status (Proses -> Selesai) -->
                            <form action="{{ route('transaksi.status', $trx->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                @if ($trx->status == 'proses')
                                    <button type="submit" class="btn btn-sm btn-success" title="Tandai Selesai">
                                        <i class="bi bi-check-lg"></i> Selesai
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Kembalikan ke Proses">
                                        <i class="bi bi-arrow-counterclockwise"></i> Proses
                                    </button>
                                @endif
                            </form>

                            <!-- Tombol Cetak Nota -->
                            <a href="{{ route('transaksi.cetak', $trx->id) }}" target="_blank" class="btn btn-sm btn-outline-info" title="Cetak Nota">
                                <i class="bi bi-printer"></i>
                            </a>

                            <!-- Tombol Hapus (Khusus Admin) -->
                            @if (Auth::user()->role === 'admin')
                                <form action="{{ route('transaksi.destroy', $trx->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus transaksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-4 text-muted">Belum ada transaksi pada filter ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection