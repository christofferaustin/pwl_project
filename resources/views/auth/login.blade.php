<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="card shadow-lg border-0 rounded-4" style="width:460px;">
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
                    <label class="form-label">Nama</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Masukkan nama" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan email" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Daftar Sebagai</label>
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
                    <label class="form-label">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-shield-lock"></i></span>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Ulangi password" required>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-person-plus-fill"></i> Register
                    </button>
                </div>

                <div class="d-grid">
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                </div>
            </form>

            <hr>
            <p class="text-center mb-0">
                Sudah memiliki akun? <a href="{{ route('login.view') }}">Login</a>
            </p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Registrasi Gagal',
        text: '{{ $errors->first() }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

</body>
</html>