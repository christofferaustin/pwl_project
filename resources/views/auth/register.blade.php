<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        /* Transisi warna halus saat berganti tema */
        body, .card, .form-control, .form-select, .input-group-text {
            transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
        }

        /* Tema Terang (Default) */
        body {
            background-color: #f8f9fa;
            color: #212529;
        }
        .register-card {
            background-color: #ffffff;
            border: none;
        }

        /* Tema Gelap */
        [data-theme="dark"] body {
            background-color: #0f121d;
            color: #f8f9fa;
        }
        [data-theme="dark"] .register-card {
            background-color: #1a1f31;
            box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.35) !important;
        }
        [data-theme="dark"] .form-control, [data-theme="dark"] .form-select {
            background-color: #242b42;
            border-color: #333d5a;
            color: #ffffff;
        }
        [data-theme="dark"] .form-control::placeholder {
            color: #a0aec0;
        }
        /* Menyesuaikan background teks dropdown di chrome/firefox dark mode */
        [data-theme="dark"] .form-select option {
            background-color: #1a1f31;
            color: #ffffff;
        }
        [data-theme="dark"] .form-control:focus, [data-theme="dark"] .form-select:focus {
            background-color: #2a334e;
            border-color: #10b981; /* Variasi warna hijau sukses untuk register */
            color: #ffffff;
        }
        [data-theme="dark"] .input-group-text {
            background-color: #2d3652;
            border-color: #333d5a;
            color: #cbd5e1;
        }
        [data-theme="dark"] .text-secondary {
            color: #94a3b8 !important;
        }
        [data-theme="dark"] hr {
            border-color: #333d5a;
            opacity: 0.4;
        }
        [data-theme="dark"] .btn-outline-secondary {
            color: #cbd5e1;
            border-color: #4b5563;
        }
        [data-theme="dark"] .btn-outline-secondary:hover {
            background-color: #374151;
            color: #ffffff;
        }
    </style>
</head>
<body>

<!-- Tombol Sakelar Pojok Atas -->
<div class="position-absolute top-0 end-0 p-3">
    <button onclick="toggleTheme()" class="btn btn-sm btn-outline-secondary rounded-circle" style="width: 40px; height: 40px;" aria-label="Toggle Theme">
        <span id="theme-toggle-icon">🌞</span>
    </button>
</div>

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card register-card shadow-lg rounded-4" style="width:460px;">
        <div class="card-body p-5">
            <div class="text-center mb-4">
                <div class="bg-success text-white rounded-circle d-inline-flex justify-content-center align-items-center" style="width:70px;height:70px;">
                    <i class="bi bi-person-plus-fill fs-3"></i>
                </div>
                <h2 class="fw-bold mt-3">Register</h2>
                <p class="text-secondary">Buat akun baru untuk Sistem Informasi Akademik</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label small fw-medium">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-medium">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-medium">Daftar Sebagai</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                        <select name="role" class="form-select" required>
                            <option value="">-- Pilih Role --</option>
                            <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa</option>
                            <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>Dosen</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-medium">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label small fw-medium">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi password" required>
                    </div>
                </div>

                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-success py-2 fw-semibold">
                        <i class="bi bi-person-plus-fill me-1"></i> Register
                    </button>
                </div>

                <div class="d-grid">
                    <button type="reset" class="btn btn-outline-secondary py-1.5 btn-sm">Reset</button>
                </div>
            </form>

            <hr>
            <p class="text-center mb-0 small">
                Sudah memiliki akun? <a href="{{ route('login.view') }}" class="text-decoration-none fw-medium">Login</a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Logika Sinkronisasi Tema -->
<script>
    function applyTheme(theme) {
        const icon = document.getElementById('theme-toggle-icon');
        if (theme === 'dark') {
            document.documentElement.setAttribute('data-theme', 'dark');
            if(icon) icon.innerText = '🌙';
        } else {
            document.documentElement.removeAttribute('data-theme');
            if(icon) icon.innerText = '🌞';
        }
    }

    function toggleTheme() {
        const currentTheme = document.documentElement.getAttribute('data-theme') === 'dark' ? 'light' : 'dark';
        localStorage.setItem('theme', currentTheme);
        applyTheme(currentTheme);
    }

    applyTheme(localStorage.getItem('theme') || 'light');
</script>

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Registrasi Gagal',
        text: '{{ $errors->first() }}',
        confirmButtonText: 'OK',
        background: localStorage.getItem('theme') === 'dark' ? '#1a1f31' : '#fff',
        color: localStorage.getItem('theme') === 'dark' ? '#fff' : '#000'
    });
</script>
@endif

</body>
</html>