@extends('layouts.app')

@section('title', 'Transaksi Baru - MW Laundry')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        <div class="card p-4 bg-white">
            <h4 class="fw-bold mb-3"><i class="bi bi-plus-circle me-2 text-primary"></i>Catat Transaksi Laundry Baru</h4>

            <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Kode Transaksi</label>
                        <input type="text" name="kode_transaksi" value="{{ $kodeTransaksi }}" class="form-control bg-light" readonly>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Nomor WhatsApp / HP Pelanggan</label>
                        <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-control" placeholder="Contoh: 081234567890" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Nama Pelanggan</label>
                    <input type="text" name="nama_pelanggan" value="{{ old('nama_pelanggan') }}" class="form-control" placeholder="Nama lengkap pelanggan" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Jenis Layanan</label>
                    <select name="layanan_id" id="layanan_id" class="form-select" required>
                        <option value="" disabled selected>-- Pilih Jenis Layanan --</option>
                        @foreach ($layanans as $layanan)
                            <option value="{{ $layanan->id }}" data-harga="{{ $layanan->harga }}">
                                {{ $layanan->nama_layanan }} - Rp {{ number_format($layanan->harga, 0, ',', '.') }}/kg ({{ $layanan->durasi }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Berat Cucian (Kg)</label>
                        <input type="number" step="0.1" name="berat" id="berat" class="form-control" placeholder="Contoh: 2.5" required>
                    </div>

                    <div class="col-md-6 mb-4">
                        <label class="form-label fw-semibold">Estimasi Total Harga</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="text" id="total_display" class="form-control bg-light fw-bold text-primary fs-5" value="0" readonly>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('transaksi.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="bi bi-save me-1"></i> Simpan Transaksi</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Script Hitung Total Otomatis --}}
@push('scripts')
<script>
    const layananSelect = document.getElementById('layanan_id');
    const beratInput = document.getElementById('berat');
    const totalDisplay = document.getElementById('total_display');

    function hitungTotal() {
        const selectedOption = layananSelect.options[layananSelect.selectedIndex];
        const harga = selectedOption ? parseFloat(selectedOption.getAttribute('data-harga')) || 0 : 0;
        const berat = parseFloat(beratInput.value) || 0;
        const total = Math.round(harga * berat);

        totalDisplay.value = new Intl.NumberFormat('id-ID').format(total);
    }

    layananSelect.addEventListener('change', hitungTotal);
    beratInput.addEventListener('input', hitungTotal);
</script>
@endpush
@endsection