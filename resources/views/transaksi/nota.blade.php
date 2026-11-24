<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Resi Cucian - {{ $transaksi->kode_transaksi }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&family=Crimson+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { 
            font-family: 'Crimson Pro', Georgia, serif; 
            font-size: 14px; 
            width: 320px; 
            margin: 20px auto; 
            padding: 20px; 
            background: #faf6ee;
            color: #24160d;
            border: 3px double #a48259;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .text-center { text-align: center; }
        .title { font-family: 'Cinzel', serif; font-size: 18px; letter-spacing: 2px; margin: 0; font-weight: 700; }
        .sub { font-size: 11px; letter-spacing: 1px; text-transform: uppercase; margin: 2px 0 8px 0; color: #573722; }
        .line { border-bottom: 1px double #a48259; margin: 10px 0; }
        .flex { display: flex; justify-content: space-between; }
        .fw-bold { font-weight: bold; }
        .stamp {
            display: inline-block;
            border: 2px dashed #73231a;
            color: #73231a;
            font-family: 'Cinzel', serif;
            padding: 3px 10px;
            text-transform: uppercase;
            font-weight: bold;
            font-size: 12px;
            letter-spacing: 1px;
            transform: rotate(-3deg);
            margin-top: 5px;
        }
        @media print { 
            body { border: 2px solid #000; box-shadow: none; background: #fff; width: 100%; }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="text-center">
        <div style="font-size: 16px;">❖ ❦ ❖</div>
        <h3 class="title">MW STEAM LAUNDRY</h3>
        <p class="sub">Atelier Du Linge • Established 1888</p>
        <p style="margin: 2px 0; font-size: 12px;">Batavia • Telefoon: (021) 888-1888</p>
    </div>
    <div class="line"></div>
    <div>
        <div class="flex"><span>No. Bukti:</span> <strong style="font-family: 'Cinzel', serif;">{{ $transaksi->kode_transaksi }}</strong></div>
        <div class="flex"><span>Waktu:</span> <span>{{ $transaksi->created_at->format('d M Y, H:i') }}</span></div>
        <div class="flex"><span>Tuan/Nyonya:</span> <strong>{{ $transaksi->nama_pelanggan }}</strong></div>
        <div class="flex"><span>Kontak:</span> <span>{{ $transaksi->no_hp }}</span></div>
    </div>
    <div class="line"></div>
    <div>
        <div class="fw-bold" style="font-size: 15px;">{{ $transaksi->layanan->nama_layanan }}</div>
        <div class="flex" style="margin-top: 4px;">
            <span>{{ $transaksi->berat }} kg x Rp {{ number_format($transaksi->layanan->harga, 0, ',', '.') }}</span>
            <span class="fw-bold">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
        </div>
        <div style="font-size: 12px; color: #573722;">Estimasi Selesai: {{ $transaksi->layanan->durasi }}</div>
    </div>
    <div class="line"></div>
    <div class="flex fw-bold" style="font-size: 16px; margin: 6px 0;">
        <span>JUMLAH TOTAL:</span>
        <span style="font-family: 'Cinzel', serif;">Rp {{ number_format($transaksi->total_harga, 0, ',', '.') }}</span>
    </div>
    <div class="text-center" style="margin: 12px 0;">
        <span class="stamp">Status: {{ $transaksi->status }}</span>
    </div>
    <div class="line"></div>
    <div class="text-center" style="font-size: 11px; color: #573722;">
        <p style="margin: 3px 0;">Terima kasih atas kepercayaan Anda merawat pakaian.</p>
        <p style="margin: 3px 0; font-style: italic;">"Kerapian & Kebersihan Adalah Keanggunan Sejati."</p>
    </div>
</body>
</html>
