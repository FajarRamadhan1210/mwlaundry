<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Petugas - MW Steam Laundry Est. 1888</title>
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
            padding: 30px 15px;
        }

        .card-register {
            background-color: var(--vintage-paper-light);
            border: 3px double var(--vintage-gold);
            border-radius: 4px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.6), inset 0 0 40px rgba(164, 130, 89, 0.15);
            position: relative;
            padding: 2.2rem 2rem;
        }

        .card-register::before {
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

        .form-control, .form-select {
            background-color: #faf6ed;
            border: 1px solid var(--vintage-border);
            color: var(--vintage-dark);
            border-radius: 3px;
            font-family: 'Crimson Pro', Georgia, serif;
            font-size: 1.05rem;
            padding: 0.5rem 0.75rem;
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
            font-size: 1.1rem;
            margin: 0.3rem 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card card-register">
                    <div class="text-center mb-3">
                        <div class="d-inline-block p-2 rounded-circle border border-2 border-warning mb-2" style="background-color: #ebdcc4;">
                            <i class="bi bi-person-plus-fill fs-2" style="color: var(--vintage-burgundy);"></i>
                        </div>
                        <h4 class="fw-bold mb-1 brand-title">REGISTRASI PETUGAS</h4>
                        <p class="text-muted small mb-1 fst-italic" style="font-size: 0.95rem;">MW Steam Laundry & Garment Care Est. 1888</p>
                        <div class="vintage-ornament">❖ ❦ ❖</div>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger small p-2 mb-3" style="background-color: #f7e6e4; color: #731e15; border: 1px solid #a4382c;">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap Petugas</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Contoh: Fajar Ramadhan" required autofocus>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="nama@laundry.com" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Peran / Jabatan (Role)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                                <select name="role" class="form-select" required>
                                    <option value="kasir" {{ old('role') == 'kasir' ? 'selected' : '' }}>Kasir (Pencatatan Transaksi)</option>
                                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin (Pengelola Layanan & Transaksi)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                            </div>

                            <div class="col-md-6 mb-4">
                                <label class="form-label">Konfirmasi Sandi</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi sandi" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-vintage w-100 py-2">
                            <i class="bi bi-check-circle me-1"></i> Daftarkan Akun Baru
                        </button>
                    </form>

                    <div class="mt-4 pt-2 border-top text-center small" style="border-color: var(--vintage-border) !important; color: var(--vintage-leather);">
                        Sudah memiliki akun terdaftar? 
                        <a href="{{ route('login') }}" class="fw-bold text-decoration-none" style="color: var(--vintage-burgundy);">
                            Masuk ke Sistem di sini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>