<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Dosen - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body { height: 100%; margin: 0; }
        body { min-height: 100vh; display: flex; flex-direction: column; padding-top: 90px; background: #f5f7fb; }
        main { flex: 1 0 auto; }
        .detail-label { font-size: 12px; color: #6b7280; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 2px; }
        .detail-value { font-size: 15px; color: #1f2937; font-weight: 500; margin-bottom: 18px; }
    </style>
</head>

<body class="d-flex flex-column h-100">
<!-- Navbar yang sama seperti index -->
<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top py-2">
    <div class="container-fluid px-md-5">
        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/download (4).png') }}" alt="Logo Itbss" width="50" height="auto">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-md-flex justify-content-between align-items-center w-100">
                <ul class="navbar-nav mb-2 mb-lg-0 fs-6 align-items-center">
                    <li class="nav-item"><a class="nav-link active fw-semibold" href="/">Home</a></li>
                </ul>
                <div class="d-flex align-items-center mt-2 mt-lg-0">
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
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow rounded-4">
                    
                    <!-- Card Header -->
                    <div class="card-header bg-white py-4 border-bottom d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <div>
                            <h3 class="fw-bold mb-0">Profil Lengkap Dosen</h3>
                            <small class="text-muted">Informasi data diri dosen pengajar terdaftar.</small>
                        </div>
                        <a href="{{ route('dosen.index') }}" class="btn btn-outline-secondary rounded-3 px-3 d-inline-flex align-items-center gap-1.5">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                    </div>

                    <!-- Card Body -->
                    <div class="card-body p-4">
                        <!-- Profil Banner Singkat -->
                        <div class="row align-items-center mb-4 bg-light p-3 rounded-4 mx-0 border">
                            <div class="col-auto">
                                <img src="{{ asset('img/user.png') }}" class="rounded-circle border bg-white p-1" width="65" height="65" alt="Avatar">
                            </div>
                            <div class="col">
                                <h4 class="fw-bold text-dark mb-0">{{ $dosen->Fullname }}</h4>
                                <span class="text-muted fs-7"><i class="bi bi-card-text"></i> NIP. {{ $dosen->NIP }}</span>
                            </div>
                        </div>

                        <!-- Grid Data -->
                        <div class="row px-1">
                            <div class="col-md-6">
                                <div class="detail-label">Nomor Induk Pegawai (NIP)</div>
                                <div class="detail-value text-dark fw-bold">{{ $dosen->NIP }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-label">Nomor Induk Dosen Nasional (NIDN)</div>
                                <div class="detail-value">{{ $dosen->NIDN ?? '-' }}</div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="detail-label">Pendidikan Terakhir</div>
                                <div class="detail-value">
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2.5 py-1 fs-7 rounded-2">
                                        {{ $dosen->Pendidikan_Terakhir }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-label">Homebase Jurusan</div>
                                <div class="detail-value fw-semibold text-dark">{{ $dosen->jurusan->Nama_Jurusan ?? '-' }}</div>
                            </div>

                            <div class="col-md-6">
                                <div class="detail-label">Tempat Lahir</div>
                                <div class="detail-value">{{ $dosen->Tempat_Lahir ?? '-' }}</div>
                            </div>
                            <div class="col-md-6">
                                <div class="detail-label">Tanggal Lahir</div>
                                <div class="detail-value">
                                    {{ $dosen->Tanggal_Lahir ? \Carbon\Carbon::parse($dosen->Tanggal_Lahir)->translatedFormat('d F Y') : '-' }}
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="detail-label">Alamat Lengkap</div>
                                <div class="detail-value bg-light p-3 rounded-3 border text-secondary" style="min-height: 55px; line-height: 1.5;">
                                    {{ $dosen->Alamat ?? '-' }}
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi di Bawah Form khusus Admin -->
                        @if(Auth::user()->role == 'admin')
                        <div class="d-flex justify-content-end gap-2 border-top pt-3 mt-2">
                            <a href="{{ action([App\Http\Controllers\DosenController::class, 'edit'], [$dosen->id]) }}" class="btn btn-warning text-white rounded-3 px-4 fw-semibold d-inline-flex align-items-center gap-1.5">
                                <i class="bi bi-pencil-square"></i> Edit Profil
                            </a>
                        </div>
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</main>

@include('footer')
</body>
</html>