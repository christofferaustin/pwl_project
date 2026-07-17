<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosen - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        html, body { height: 100%; margin: 0; }
        body { min-height: 100vh; display: flex; flex-direction: column; padding-top: 90px; background: #f5f7fb; }
        main { flex: 1 0 auto; }
        .table-responsive { border-radius: 12px; overflow: hidden; }
        .btn-action { padding: 6px 12px; border-radius: 8px; font-weight: 500; display: inline-flex; align-items: center; gap: 5px; }
        .search-box { border-radius: 10px; padding: 10px 16px; border: 1px solid #d1d5db; }
        .search-box:focus { box-shadow: 0 0 0 .2rem rgba(37,99,235,.15); border-color:#2563eb; }
    </style>
</head>

<body class="d-flex flex-column h-100">
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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Menu Academic</a>
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
                <div class="d-flex align-items-center mt-2 mt-lg-0">
                    @guest
                    <div class="d-flex gap-2 w-100 justify-content-center">
                        <a class="btn btn-primary rounded-3 px-4" href="{{ action([App\Http\Controllers\AuthController::class, 'loginView']) }}">Login</a>
                        <a class="btn btn-outline-primary rounded-3 px-4" href="{{ action([App\Http\Controllers\AuthController::class, 'registerView']) }}">Register</a>
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
            </div>
        </div>
    </div>
</nav>

<main>
    <div class="container py-4">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-1">Data Dosen</h2>
                <p class="text-muted mb-0">Kelola seluruh data dosen Institut Teknologi & Bisnis Sabda Setia</p>
            </div>
            <div>
                @if(Auth::user()->role == 'admin')
                <a href="{{ action([App\Http\Controllers\DosenController::class,'create']) }}" class="btn btn-primary rounded-3 px-4 py-2 fw-semibold shadow-sm d-inline-flex align-items-center gap-2">
                    <i class="bi bi-plus-circle"></i> Tambah Dosen
                </a>
                @endif
            </div>
        </div>

        <!-- Main Card Table -->
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body p-4">
                
                <!-- Search Filter & Alert -->
                <div class="row mb-4 align-items-center">
                    <div class="col-md-8">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3 mb-md-0 py-2" role="alert">
                                ✨ {{ session('success') }}
                                <button type="button" class="btn-close py-2.5" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 border-radius-start-10 text-muted"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control search-box border-start-0" placeholder="Cari nama atau NIP...">
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle border text-nowrap mb-0">
                        <thead class="table-light text-secondary fw-semibold border-bottom">
                            <tr>
                                <th class="text-center" width="5%">No</th>
                                <th width="25%">Nama Lengkap</th>
                                <th width="15%">NIP / NIDN</th>
                                <th width="12%">Pendidikan</th>
                                <th width="25%">Homebase Jurusan</th>
                                <th class="text-center" width="18%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dosen as $d)
                            <tr>
                                <td class="text-center text-muted fw-medium">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="fw-bold text-dark mb-0">{{ $d->Fullname }}</div>
                                    <small class="text-muted d-block" style="max-width: 280px; overflow: hidden; text-overflow: ellipsis;" title="{{ $d->Alamat }}">
                                        📍 {{ $d->Alamat ?? '-' }}
                                    </small>
                                </td>
                                <td>
                                    <span class="d-block fw-semibold text-dark">{{ $d->NIP }}</span>
                                    <small class="text-muted">NIDN: {{ $d->NIDN ?? '-' }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-secondary-subtle text-secondary rounded-2 px-2.5 py-1.5 fs-7">{{ $d->Pendidikan_Terakhir }}</span>
                                </td>
                                <td>
                                    <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1.5">
                                        {{ $d->jurusan->Nama_Jurusan ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1.5">
                                        <!-- Tombol Detail (Bisa Diakses Semua Role) -->
                                        <a href="{{ action([App\Http\Controllers\DosenController::class, 'show'], [$d->id]) }}" class="btn btn-sm btn-outline-info btn-action" title="Detail Profil">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>

                                        @if(Auth::user()->role == 'admin')
                                        <a href="{{ action([App\Http\Controllers\DosenController::class, 'edit'], [$d->id]) }}" class="btn btn-sm btn-primary btn-action" title="Ubah Data">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <form action="{{ action([App\Http\Controllers\DosenController::class, 'destroy'], [$d->id]) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus dosen ini?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-action" title="Hapus Data">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-5">
                                    <i class="bi bi-folder-x fs-1 d-block mb-2 text-secondary"></i>
                                    Belum ada data dosen terdaftar dalam sistem.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</main>

@include('footer')
</body>
</html>