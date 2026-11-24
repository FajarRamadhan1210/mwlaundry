<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MW Steam Laundry Est. 1888</title>
    <!-- Google Fonts 1800s Typography -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700;900&family=Crimson+Pro:ital,wght@0,400;0,600;0,700;1,400&family=Playfair+Display:ital,wght@0,700;1,600&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        :root {
            --vintage-paper: #f4ecdc;
            --vintage-paper-light: #fbf7ee;
            --vintage-dark: #24160d;
            --vintage-leather: #573722;
            --vintage-gold: #c5a059;
            --vintage-gold-bright: #dfb86c;
            --vintage-burgundy: #73231a;
            --vintage-border: #a48259;
        }

        body {
            background-color: #1f120a;
            background-image: 
                radial-gradient(ellipse at center, rgba(87, 55, 34, 0.7) 0%, rgba(20, 10, 5, 0.95) 100%),
                repeating-linear-gradient(45deg, transparent, transparent 35px, rgba(197, 160, 89, 0.03) 35px, rgba(197, 160, 89, 0.03) 70px);
            font-family: 'Crimson Pro', Georgia, serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .card-login {
            background-color: var(--vintage-paper-light);
            border: 3px double var(--vintage-gold);
            border-radius: 4px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), inset 0 0 40px rgba(164, 130, 89, 0.15);
            position: relative;
            padding: 2.5rem 2rem;
        }

        .card-login::before {
            content: "";
            position: absolute;
            top: 6px;
            left: 6px;
            right: 6px;
            bottom: 6px;
            border: 1px solid rgba(164, 130, 89, 0.45);
            pointer-events: none;
        }

        h2, h3, .brand-title {
            font-family: 'Cinzel', serif;
            letter-spacing: 2px;
            color: var(--vintage-dark);
            text-transform: uppercase;
        }

        .form-label {
            font-family: 'Cinzel', serif;
            font-size: 0.8rem;
            letter-spacing: 1px;
            color: var(--vintage-leather);
            text-transform: uppercase;
            font-weight: 700;
        }

        .form-control {
            background-color: #faf6ed;
            border: 1px solid var(--vintage-border);
            color: var(--vintage-dark);
            border-radius: 3px;
            font-family: 'Crimson Pro', Georgia, serif;
            font-size: 1.1rem;
            padding: 0.55rem 0.75rem;
        }

        .form-control:focus {
            background-color: #ffffff;
            border-color: var(--vintage-burgundy);
            box-shadow: 0 0 0 0.2rem rgba(115, 35, 26, 0.15);
            color: var(--vintage-dark);
        }

        .input-group-text {
            background-color: #ebdcc4;
            border: 1px solid var(--vintage-border);
            color: var(--vintage-leather);
        }

        .btn-vintage {
            background: linear-gradient(180deg, #822b21 0%, #571c15 100%);
            border: 1px solid var(--vintage-gold);
            color: #fff8eb;
            font-family: 'Cinzel', serif;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 0.65rem 1rem;
            border-radius: 3px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            transition: all 0.2s ease;
        }

        .btn-vintage:hover {
            background: linear-gradient(180deg, #9b3327 0%, #69221a 100%);
            color: #ffffff;
            box-shadow: 0 6px 15px rgba(87, 28, 21, 0.4);
        }

        .vintage-ornament {
            color: var(--vintage-gold);
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .badge-est {
            background-color: var(--vintage-leather);
            color: var(--vintage-gold-bright);
            font-family: 'Cinzel', serif;
            letter-spacing: 2px;
            font-size: 0.65rem;
            padding: 0.35rem 0.65rem;
            border: 1px solid var(--vintage-gold);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card card-login">
                    <div class="text-center mb-4">
                        <div class="d-inline-block p-2 rounded-circle border border-2 border-warning mb-2" style="background-color: #ebdcc4;">
                            <i class="bi bi-water fs-1" style="color: var(--vintage-burgundy);"></i>
                        </div>
                        <h3 class="fw-bold mb-1 brand-title">MW LAUNDRY</h3>
                        <p class="text-muted small mb-2 fst-italic" style="font-size: 0.95rem;">Steam & Fine Garment Care Parlour</p>
                        <span class="badge badge-est">ESTABLISHED 1888</span>
                        <div class="vintage-ornament">❖ ❦ ❖</div>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show small" style="background-color: #e4efe7; color: #1e4d2b; border: 1px solid #2a5235;" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger small" style="background-color: #f7e6e4; color: #731e15; border: 1px solid #a4382c;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Alamat Surat Elektronik (Email)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope-paper"></i></span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="admin@laundry.com" required autofocus>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Kata Sandi Rahasia</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-key"></i></span>
                                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-vintage w-100">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Sistem
                        </button>

                        <div class="text-center mt-3 small" style="color: var(--vintage-leather);">
                            Belum punya akun petugas? 
                            <a href="{{ route('register') }}" class="fw-bold text-decoration-none" style="color: var(--vintage-burgundy);">
                                Daftar di sini
                            </a>
                        </div>
                    </form>

                    <div class="mt-4 pt-3 border-top text-center small" style="border-color: var(--vintage-border) !important; color: var(--vintage-leather);">
                        <p class="mb-1 fw-bold font-monospace" style="font-family: 'Cinzel', serif; letter-spacing: 1px;">KREDENSIAL PENGUJIAN:</p>
                        <p class="mb-0"><strong>Administrator:</strong> <code>admin@laundry.com</code> (admin123)</p>
                        <p class="mb-0"><strong>Juru Kasir:</strong> <code>kasir@laundry.com</code> (kasir123)</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
