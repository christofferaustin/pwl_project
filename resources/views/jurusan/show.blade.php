<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Jurusan - SIAKAD ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            background:#f5f7fb;
        }

        main{
            flex:1 0 auto;
        }

        .info-card{
            border:0;
            border-radius:18px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
        }

        .info-item{
            padding:18px 0;
            border-bottom:1px solid #ececec;
        }

        .info-item:last-child{
            border-bottom:none;
        }

        .info-label{
            color:#6b7280;
            font-weight:600;
            margin-bottom:4px;
        }

        .info-value{
            color:#111827;
            font-size:17px;
            font-weight:600;
        }

        .badge-code{
            background:#e8f1ff;
            color:#2563eb;
            padding:8px 16px;
            border-radius:50px;
            font-weight:600;
            font-size:14px;
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top py-2">
    <div class="container-fluid px-md-5">

        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/download (4).png') }}"
                 alt="Logo Itbss"
                 width="50">
        </a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse"
             id="navbarSupportedContent">

            <div class="d-md-flex justify-content-between align-items-center w-100">

                <ul class="navbar-nav mb-2 mb-lg-0 fs-6 align-items-center">

                    <li class="nav-item">
                        <a class="nav-link active fw-semibold"
                           href="/">
                            Home
                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">

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
                                    <!-- BAGIAN AUTENTIKASI -->
                    <div class="d-flex align-items-center mt-2 mt-lg-0">

                        @guest
                        <div class="d-flex gap-2 w-100 justify-content-center">

                            <a class="btn btn-primary rounded-3 px-4"
                               href="{{ action([App\Http\Controllers\AuthController::class,'loginView']) }}">
                                Login
                            </a>

                            <a class="btn btn-outline-primary rounded-3 px-4"
                               href="{{ action([App\Http\Controllers\AuthController::class,'registerView']) }}">
                                Register
                            </a>

                        </div>
                        @endguest

                        @auth

                        <div class="dropdown">

                            <a href="#"
                               class="nav-link dropdown-toggle d-flex align-items-center gap-2 fw-semibold"
                               data-bs-toggle="dropdown">

                                <img src="{{ asset('img/user.png') }}"
                                     width="32"
                                     height="32"
                                     class="rounded-circle border">

                                {{ Auth::user()->name }}

                            </a>

                            <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2">

                                <li>
                                    <a href=""
                                       class="dropdown-item">
                                        👤 Profile Akun
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>

                                    <form method="POST"
                                          action="{{ route('logout') }}">

                                        @csrf

                                        <button type="submit"
                                                class="dropdown-item text-danger">

                                            🚪 Logout

                                        </button>

                                    </form>

                                </li>

                            </ul>

                        </div>

                        @endauth

                    </div>

                </div>

            </div>

        </div>

    </div>

</nav>

<main>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card info-card">

                <div class="card-header bg-white py-4 border-bottom d-flex justify-content-between align-items-center">

                    <div>

                        <h3 class="fw-bold mb-1">
                            Detail Jurusan
                        </h3>

                        <small class="text-muted">
                            Informasi lengkap data jurusan.
                        </small>

                    </div>

                    <a href="{{ route('jurusan.index') }}"
                       class="btn btn-outline-secondary rounded-3">

                        <i class="bi bi-arrow-left"></i>
                        Kembali

                    </a>

                </div>

                <div class="card-body p-4">

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-bookmark-fill text-primary me-2"></i>

                            Kode Jurusan

                        </div>

                        <div class="info-value">

                            <span class="badge-code">

                                {{ $jurusan->Kode_Jurusan }}

                            </span>

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-mortarboard-fill text-primary me-2"></i>

                            Nama Jurusan

                        </div>

                        <div class="info-value">

                            {{ $jurusan->Nama_Jurusan }}

                        </div>

                    </div>
                                        <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-calendar-check-fill text-primary me-2"></i>

                            Tanggal Dibuat

                        </div>

                        <div class="info-value">

                            {{ $jurusan->created_at->format('d F Y') }}

                        </div>

                    </div>

                    @if($jurusan->updated_at)

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-clock-history text-primary me-2"></i>

                            Terakhir Diperbarui

                        </div>

                        <div class="info-value">

                            {{ $jurusan->updated_at->format('d F Y') }}

                        </div>

                    </div>

                    @endif

                </div>

                <div class="card-footer bg-white border-top py-3">

                    <div class="d-flex justify-content-end">

                        <a href="{{ route('jurusan.index') }}"
                           class="btn btn-primary px-4 rounded-3">

                            <i class="bi bi-arrow-left-circle me-1"></i>

                            Kembali ke Data Jurusan

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

</main>

@include('footer')

</body>
</html>