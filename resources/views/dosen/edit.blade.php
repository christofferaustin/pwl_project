<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html,
        body{
            height:100%;
            margin:0;
        }

        body{
            min-height:100vh;
            display:flex;
            flex-direction:column;
            padding-top:90px;
        }

        main{
            flex:1 0 auto;
        }

        footer{
            margin-top:auto;
        }

        body{
            background:#f5f7fb;
        }

        .page-card{
            background:#fff;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            overflow:hidden;
        }

        .page-header{
            padding:25px 30px;
            border-bottom:1px solid #ececec;
        }

        .page-title{
            font-size:30px;
            font-weight:700;
            color:#1f2937;
        }

        .page-subtitle{
            color:#6b7280;
            margin-bottom:0;
        }

        .page-body{
            padding:30px;
        }

        .form-label{
            font-weight:600;
            color:#374151;
        }

        .form-control,
        .form-select{
            border-radius:10px;
            padding:11px 14px;
            border:1px solid #d1d5db;
        }

        .form-control:focus{
            box-shadow:0 0 0 .2rem rgba(37,99,235,.15);
            border-color:#2563eb;
        }

        .btn-save{
            background:#2563eb;
            color:white;
            border:none;
            border-radius:10px;
            padding:10px 25px;
        }

        .btn-save:hover{
            background:#1d4ed8;
            color:white;
        }

        .btn-cancel{
            border-radius:10px;
            padding:10px 25px;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top py-2">
    <div class="container-fluid px-md-5"> <!-- Menggunakan container-fluid agar benar-benar mentok ke ujung layar dengan padding horizontal aman -->
        
        <!-- BRAND LOGO (Paling Kiri) -->
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/download (4).png') }}" alt="Logo Itbss" width="50" height="auto">
        </a>
        
        <!-- Toggler untuk Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- KONTEN NAVBAR -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            
            <!-- Pembungkus internal untuk membagi kiri & kanan secara ekstrem -->
            <div class="d-md-flex justify-content-between align-items-center w-100">
                
                <!-- MENU AKADEMIK (Mentok Kiri setelah Logo) -->
                <ul class="navbar-nav mb-2 mb-lg-0 fs-6 align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active fw-semibold" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            Menu Academic
                        </a>
                        <ul class="dropdown-menu shadow-sm border-0">

                            @auth

                                @if(Auth::user()->role == 'admin')

                                    <li><a class="dropdown-item" href="{{ route('dosen.index') }}">Dosen</a></li>
                                    <li><a class="dropdown-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="{{ route('kelas.index') }}">Kelas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('matakuliah.index') }}">Mata Kuliah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('admin.krs.index') }}">KRS</a></li>

                                @elseif(Auth::user()->role == 'mahasiswa')

                                    <li><a class="dropdown-item" href="{{ route('krs.index') }}">KRS</a></li>

                                @elseif(Auth::user()->role == 'dosen')

                                    <li><a class="dropdown-item" href="{{ route('dosen.mahasiswa.index') }}">Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.dosen.index') }}">Dosen</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.kelas.index') }}">Kelas</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.jurusan.index') }}">Jurusan</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.matakuliah.index') }}">Mata Kuliah</a></li>
                                    <li><a class="dropdown-item" href="{{ route('dosen.krs.index') }}">KRS Mahasiswa</a></li>
                                    <li><a class="dropdown-item" href="{{ route('krsdetail.index') }}">Approval Mata Kuliah</a></li>

                                @endif

                            @endauth

                        </ul>
                    </li>
                </ul>

                <!-- BAGIAN AUTENTIKASI (Mentok Kanan) -->
                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    @guest
                    <div class="d-flex gap-2 w-100 justify-content-center">
                        <a class="btn btn-primary rounded-3 px-4" href="{{ action([App\Http\Controllers\AuthController::class, 'loginView']) }}">
                            Login
                        </a>
                        <a class="btn btn-outline-primary rounded-3 px-4" href="{{ action([App\Http\Controllers\AuthController::class, 'registerView']) }}">
                            Register
                        </a>
                    </div>
                    @endguest

                    @auth
                    <div class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center gap-2 fw-semibold" data-bs-toggle="dropdown">
                            <img src="{{ asset('img/user.png') }}" width="32" height="32" class="rounded-circle border">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">
                            <li><a href="" class="dropdown-item">👤 Profile Akun</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">🚪 Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth
                </div>

            </div> <!-- /d-md-flex -->
            
        </div>
    </div>
</nav>

    <main>
    <div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card border-0 shadow rounded-4">

                <div class="card-header bg-white py-4 border-bottom">

                    <h3 class="fw-bold mb-1">
                        Edit Data Dosen
                    </h3>

                    <small class="text-muted">Perbarui informasi dosen.</small>

                </div>

                <div class="card-body p-4">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Terjadi kesalahan, mohon periksa kembali isian Anda:</strong>
                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif


                    <form action="{{ action([App\Http\Controllers\DosenController::class,'update'],[$dosen->id]) }}" method="POST">

                        @csrf
                        @method('PUT')

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Nama Lengkap</label>
                                <input type="text"
                                       class="form-control"
                                       name="Fullname"
                                       value="{{ $dosen->Fullname }}"
                                       placeholder="Masukkan nama lengkap"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NIP</label>
                                <input type="text"
                                       class="form-control"
                                       name="NIP"
                                       value="{{ $dosen->NIP }}"
                                       placeholder="Masukkan NIP"
                                       required>
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">NIDN</label>
                                <input type="text"
                                       class="form-control"
                                       name="NIDN"
                                       value="{{ $dosen->NIDN }}"
                                       placeholder="Masukkan NIDN"
                                       required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Pendidikan Terakhir</label>
                                <input type="text"
                                       class="form-control"
                                       name="Pendidikan_Terakhir"
                                       value="{{ $dosen->Pendidikan_Terakhir }}"
                                       placeholder="Contoh: S2 Teknik Informatika"
                                       required>
                            </div>

                        </div>

                        <div class="mb-3">

                            <label class="form-label fw-semibold">
                                Jurusan
                            </label>

                            <select name="Jurusan_id" class="form-select" required>
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusan as $j)
                                    <option value="{{ $j->id }}" {{ $dosen->Jurusan_id == $j->id ? 'selected' : '' }}>
                                        {{ $j->Nama_Jurusan }}
                                    </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Tempat Lahir
                                </label>

                                <input type="text"
                                       class="form-control"
                                       name="Tempat_Lahir"
                                       value="{{ $dosen->Tempat_Lahir }}"
                                       placeholder="Masukkan tempat lahir"
                                       required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label fw-semibold">
                                    Tanggal Lahir
                                </label>

                                <input type="date"
                                       class="form-control"
                                       name="Tanggal_Lahir"
                                       value="{{ $dosen->Tanggal_Lahir }}"
                                       required>

                            </div>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Alamat
                            </label>

                            <textarea class="form-control"
                                      rows="4"
                                      name="Alamat"
                                      placeholder="Masukkan alamat lengkap"
                                      required>{{ $dosen->Alamat }}</textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Tautkan ke Akun Login (opsional)
                            </label>

                            <select name="user_id" class="form-select">
                                <option value="">-- Belum ditautkan --</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}" {{ old('user_id', $dosen->user_id) == $u->id ? 'selected' : '' }}>{{ $u->name }} ({{ $u->email }})</option>
                                @endforeach
                            </select>

                            <small class="text-muted">
                                Pilih akun login (role Dosen) supaya dosen ini bisa mengakses menu approval KRS.
                            </small>

                        </div>

                        <hr>

                        <div class="d-flex justify-content-end gap-2">

                            <a href="{{ action([App\Http\Controllers\DosenController::class,'index']) }}"
                               class="btn btn-outline-secondary">

                                Kembali

                            </a>

                            <button type="reset"
                                    class="btn btn-warning text-white">

                                Reset

                            </button>

                            <button type="submit"
                                    class="btn btn-primary">

                                Simpan Perubahan

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>
</main>

@include('footer')

</body>
</html>