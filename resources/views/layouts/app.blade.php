<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MW Steam Laundry - Est. 1888')</title>

    <!-- Google Fonts: 1800s Victorian Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;900&family=Crimson+Pro:ital,wght@0,400;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,600;0,800;1,600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --vintage-paper: #f4ecdc;
            --vintage-paper-light: #fbf7ee;
            --vintage-dark: #24160d;
            --vintage-walnut: #3d2618;
            --vintage-leather: #573722;
            --vintage-gold: #c5a059;
            --vintage-gold-bright: #dfb86c;
            --vintage-burgundy: #73231a;
            --vintage-forest: #2a5235;
            --vintage-border: #a48259;
        }

        body {
            background-color: var(--vintage-paper);
            background-image: 
                radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.45) 0%, rgba(197, 160, 89, 0.15) 100%),
                repeating-linear-gradient(0deg, transparent, transparent 24px, rgba(164, 130, 89, 0.05) 24px, rgba(164, 130, 89, 0.05) 25px);
            font-family: 'Crimson Pro', Georgia, serif;
            font-size: 1.05rem;
            color: var(--vintage-dark);
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Playfair Display', 'Cinzel', Georgia, serif;
            letter-spacing: 0.5px;
            color: var(--vintage-dark);
        }

        /* Victorian Navbar */
        .navbar-vintage {
            background: linear-gradient(180deg, #2b180e 0%, #1c0f08 100%);
            border-bottom: 3px double var(--vintage-gold);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            padding: 0.75rem 0;
        }

        .navbar-vintage .navbar-brand {
            font-family: 'Cinzel', serif;
            font-weight: 900;
            font-size: 1.45rem;
            letter-spacing: 2px;
            color: var(--vintage-gold-bright) !important;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.8);
        }

        .navbar-vintage .nav-link {
            font-family: 'Cinzel', serif;
            font-size: 0.88rem;
            letter-spacing: 1px;
            color: #d8c7af !important;
            padding: 0.5rem 1rem !important;
            transition: all 0.2s ease;
            text-transform: uppercase;
        }

        .navbar-vintage .nav-link:hover,
        .navbar-vintage .nav-link.active {
            color: var(--vintage-gold-bright) !important;
            text-shadow: 0 0 8px rgba(223, 184, 108, 0.5);
        }

        .navbar-vintage .nav-link.active {
            border-bottom: 2px solid var(--vintage-gold);
        }

        /* 1800s Vintage Parchment Card */
        .card {
            background-color: var(--vintage-paper-light) !important;
            border: 2px solid var(--vintage-border) !important;
            border-radius: 4px !important;
            box-shadow: 0 8px 20px rgba(58, 36, 21, 0.12), inset 0 0 30px rgba(197, 160, 89, 0.08) !important;
            position: relative;
        }

        .card::before {
            content: "";
            position: absolute;
            top: 4px;
            left: 4px;
            right: 4px;
            bottom: 4px;
            border: 1px solid rgba(164, 130, 89, 0.35);
            pointer-events: none;
            border-radius: 2px;
        }

        /* Buttons Victorian Style */
        .btn {
            font-family: 'Cinzel', serif;
            font-size: 0.85rem;
            letter-spacing: 1px;
            text-transform: uppercase;
            border-radius: 3px;
            font-weight: 700;
            padding: 0.45rem 1.1rem;
            transition: all 0.25s ease;
        }

        .btn-primary {
            background: linear-gradient(180deg, #822b21 0%, #571c15 100%) !important;
            border: 1px solid var(--vintage-gold) !important;
            color: #fff9ee !important;
            box-shadow: 0 2px 5px rgba(0,0,0,0.25);
        }

        .btn-primary:hover {
            background: linear-gradient(180deg, #963428 0%, #69221a 100%) !important;
            box-shadow: 0 4px 10px rgba(87, 28, 21, 0.4);
            color: #ffffff !important;
        }

        .btn-warning {
            background: linear-gradient(180deg, #c59837 0%, #8f6c1e 100%) !important;
            border: 1px solid #6c5113 !important;
            color: #ffffff !important;
        }

        .btn-success {
            background: linear-gradient(180deg, #326340 0%, #1e4128 100%) !important;
            border: 1px solid var(--vintage-gold) !important;
            color: #fff !important;
        }

        .btn-outline-primary {
            border: 1px solid var(--vintage-burgundy) !important;
            color: var(--vintage-burgundy) !important;
        }

        .btn-outline-primary:hover {
            background-color: var(--vintage-burgundy) !important;
            color: #fff !important;
        }

        .btn-outline-secondary {
            border: 1px solid var(--vintage-leather) !important;
            color: var(--vintage-leather) !important;
        }

        .btn-outline-light {
            border: 1px solid var(--vintage-gold) !important;
            color: var(--vintage-gold) !important;
        }

        .btn-outline-light:hover {
            background-color: var(--vintage-gold) !important;
            color: var(--vintage-dark) !important;
        }

        /* Victorian Badges */
        .badge {
            font-family: 'Cinzel', serif;
            letter-spacing: 1px;
            padding: 0.4em 0.7em;
            border-radius: 2px;
            font-weight: 700;
        }

        .badge.bg-primary {
            background-color: var(--vintage-burgundy) !important;
            border: 1px solid var(--vintage-gold);
            color: #fff !important;
        }

        .badge.bg-warning {
            background-color: #f7edd4 !important;
            color: #7b590e !important;
            border: 1px dashed #c59837;
        }

        .badge.bg-success {
            background-color: #e4efe7 !important;
            color: #1e4d2b !important;
            border: 1px dashed #2a5235;
        }

        /* Vintage Table */
        .table {
            --bs-table-bg: transparent;
            color: var(--vintage-dark);
            border-color: rgba(164, 130, 89, 0.4);
        }

        .table-light, thead.table-light th {
            background-color: #ebdcc4 !important;
            color: var(--vintage-dark) !important;
            font-family: 'Cinzel', serif;
            font-size: 0.85rem;
            letter-spacing: 1px;
            border-bottom: 2px solid var(--vintage-border) !important;
            text-transform: uppercase;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(197, 160, 89, 0.12);
        }

        /* Form Controls */
        .form-control, .form-select {
            background-color: #fbf7f0;
            border: 1px solid var(--vintage-border);
            color: var(--vintage-dark);
            border-radius: 3px;
            font-family: 'Crimson Pro', Georgia, serif;
            font-size: 1.05rem;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff;
            border-color: var(--vintage-burgundy);
            box-shadow: 0 0 0 0.2rem rgba(115, 35, 26, 0.15);
            color: var(--vintage-dark);
        }

        .input-group-text {
            background-color: #ebdcc4;
            border: 1px solid var(--vintage-border);
            color: var(--vintage-dark);
            font-family: 'Cinzel', serif;
        }

        .vintage-divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: var(--vintage-gold);
            margin: 1rem 0;
            font-family: 'Cinzel', serif;
            font-size: 0.85rem;
            letter-spacing: 2px;
        }

        .vintage-divider::before, .vintage-divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px double var(--vintage-border);
        }

        .vintage-divider:not(:empty)::before { margin-right: .75em; }
        .vintage-divider:not(:empty)::after { margin-left: .75em; }
    </style>
</head>
<body>
    <!-- Navbar Bergaya 1800-an -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-vintage mb-4">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="{{ route('dashboard') }}">
                <i class="bi bi-water me-2 fs-4" style="color: var(--vintage-gold);"></i> 
                <span>MW LAUNDRY</span>
                <span class="badge bg-transparent ms-2 text-warning border border-warning" style="font-size: 0.65rem; letter-spacing: 2px;">EST. 1888</span>
            </a>
            <button class="navbar-toggler border-secondary" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-compass me-1"></i> Dashboard
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('layanan.*') ? 'active' : '' }}" href="{{ route('layanan.index') }}">
                            <i class="bi bi-journal-bookmark me-1"></i> Data Layanan
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('transaksi.*') ? 'active' : '' }}" href="{{ route('transaksi.index') }}">
                            <i class="bi bi-receipt-cutoff me-1"></i> Rekap Transaksi
                        </a>
                    </li>
                </ul>

                <!-- User Info & Logout -->
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <span class="d-block" style="color: var(--vintage-gold-bright); font-family: 'Cinzel', serif; font-size: 0.85rem; letter-spacing: 1px;">
                            {{ Auth::user()->name }}
                        </span>
                        <span class="badge" style="background-color: var(--vintage-leather); color: var(--vintage-gold-bright); font-size: 0.65rem;">
                            {{ Auth::user()->role }}
                        </span>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-light">
                            <i class="bi bi-box-arrow-right"></i> Keluar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Konten Halaman -->
    <main class="container mb-5">
        {{-- Flash Alert Pesan Sukses / Error Bergaya Vintage --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-success" style="background-color: #e6f0e8; color: #1e4827; font-family: 'Crimson Pro', serif;" role="alert">
                <i class="bi bi-check2-circle me-2 fs-5"></i> <strong>Pemberitahuan:</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-danger" style="background-color: #f7e6e4; color: #731e15; font-family: 'Crimson Pro', serif;" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i> <strong>Peringatan:</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Footer Bergaya Klasik 1800-an -->
    <footer class="text-center py-4 text-muted small mt-5 border-top" style="border-color: var(--vintage-border) !important; font-family: 'Cinzel', serif; letter-spacing: 1.5px;">
        <p class="mb-1" style="color: var(--vintage-leather);">❖ MW STEAM LAUNDRY & DRY CLEANING PARLOUR ❖</p>
        <p class="mb-0" style="color: #8c735a; font-size: 0.75rem;">FINE WASHING & GARMENT CARE SINCE 1888 — ALL RIGHTS RESERVED</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
