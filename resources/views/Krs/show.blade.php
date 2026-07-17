<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail KRS - SIAKAD ITBSS</title>
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

            <div class="col-lg-9">

                @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Info KRS -->
                <div class="card border-0 shadow rounded-4 mb-4">

                    <div class="card-header bg-white py-4 border-bottom d-flex justify-content-between align-items-center">

                        <div>
                            <h3 class="fw-bold mb-1">Detail KRS</h3>
                            <small class="text-muted">{{ $krs->mahasiswa->NIM }} - {{ $krs->mahasiswa->Fullname }}</small>
                        </div>

                        @if(Auth::user()->role == 'mahasiswa')
                            <a href="{{ route('krs.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        @elseif(Auth::user()->role == 'dosen')
                            <a href="{{ route('dosen.krs.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        @else
                            <a href="{{ route('admin.krs.index') }}" class="btn btn-outline-secondary btn-sm">Kembali</a>
                        @endif

                    </div>

                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-3"><strong>Tahun Ajaran</strong><br>{{ $krs->tahun_ajaran }}</div>
                            <div class="col-md-3"><strong>Semester</strong><br>{{ ucfirst($krs->semester) }}</div>
                            <div class="col-md-3"><strong>Total SKS</strong><br>{{ $krs->total_sks }} SKS</div>
                            <div class="col-md-3">
                                <strong>Status</strong><br>
                                @if($krs->status == 'approved')
                                    <span class="badge bg-success">Approved</span>
                                @elseif($krs->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($krs->status == 'partial')
                                    <span class="badge bg-info">Partial</span>
                                @else
                                    <span class="badge bg-danger">Declined</span>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Daftar Mata Kuliah -->
                <div class="card border-0 shadow rounded-4 mb-4">

                    <div class="card-header bg-white py-4 border-bottom">
                        <h5 class="fw-bold mb-0">Mata Kuliah Diambil</h5>
                    </div>

                    <div class="card-body p-4">

                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>No</th>
                                        <th>Mata Kuliah</th>
                                        <th>SKS</th>
                                        <th>Dosen</th>
                                        <th>Jadwal</th>
                                        <th>Status</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($krs->detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->kelas->mataKuliah->Nama_Mata_Kuliah }}</td>
                                        <td>{{ $item->kelas->mataKuliah->SKS }}</td>
                                        <td>{{ $item->kelas->dosen->Fullname }}</td>
                                        <td>{{ ucfirst($item->kelas->hari) }}, {{ $item->kelas->jam }}</td>
                                        <td>
                                            @if($item->status=='approved')
                                                <span class="badge bg-success">Approved</span>
                                            @elseif($item->status=='declined')
                                                <span class="badge bg-danger">Declined</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td class="text-center">

                                            @if(Auth::user()->role == 'dosen' && $item->status == 'pending')
                                                <form action="{{ route('krsdetail.approve',$item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-success btn-sm">Approve</button>
                                                </form>
                                                <form action="{{ route('krsdetail.reject',$item->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-danger btn-sm">Reject</button>
                                                </form>
                                            @elseif(Auth::user()->role == 'mahasiswa' && $item->status == 'pending')
                                                <form action="{{ route('krsdetail.destroy',$item->id) }}" method="POST" class="d-inline"
                                                      onsubmit="return confirm('Batalkan mata kuliah ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-outline-danger btn-sm">Batalkan</button>
                                                </form>
                                            @else
                                                <span class="text-muted">Sudah diproses</span>
                                            @endif

                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">Belum ada mata kuliah yang diambil.</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <!-- Form Tambah Mata Kuliah (khusus mahasiswa, pemilik KRS) -->
                @if(Auth::user()->role == 'mahasiswa')
                <div class="card border-0 shadow rounded-4">

                    <div class="card-header bg-white py-4 border-bottom">
                        <h5 class="fw-bold mb-0">Tambah Mata Kuliah</h5>
                    </div>

                    <div class="card-body p-4">

                        @if($kelasTersedia->isEmpty())
                            <p class="text-muted mb-0">Tidak ada kelas tersedia untuk tahun ajaran/semester ini.</p>
                        @else
                            <form action="{{ route('krsdetail.store') }}" method="POST" class="d-flex gap-2">
                                @csrf
                                <input type="hidden" name="krs_id" value="{{ $krs->id }}">

                                <select name="kelas_id" class="form-select" required>
                                    <option value="">-- Pilih Kelas --</option>
                                    @foreach($kelasTersedia as $k)
                                        <option value="{{ $k->id }}">
                                            {{ $k->mataKuliah->Nama_Mata_Kuliah }} ({{ $k->mataKuliah->SKS }} SKS)
                                            - {{ $k->dosen->Fullname }}
                                            - {{ ucfirst($k->hari) }} {{ $k->jam }}
                                            [{{ $k->jumlah_mahasiswa }}/{{ $k->jumlah_max }}]
                                        </option>
                                    @endforeach
                                </select>

                                <button type="submit" class="btn btn-primary text-nowrap">Tambah</button>
                            </form>
                        @endif

                    </div>

                </div>
                @endif

            </div>

        </div>

    </div>

</main>

@include('footer')

</body>
</html>