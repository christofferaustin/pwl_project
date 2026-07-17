<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Detail KRS - SIAKAD ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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
            border:none;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.08);
            overflow:hidden;
        }

        .info-item{
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:16px 0;
            border-bottom:1px solid #eef2f7;
        }

        .info-item:last-child{
            border-bottom:none;
        }

        .info-label{
            font-weight:600;
            color:#6b7280;
        }

        .info-value{
            font-weight:600;
            color:#111827;
            text-align:end;
        }

        .badge-status{
            padding:.55rem .9rem;
            border-radius:999px;
            font-size:.82rem;
            font-weight:600;
        }

        .table thead th{
            background:#f8fafc;
            font-weight:700;
        }

        .table td,
        .table th{
            vertical-align:middle;
        }

        .btn-action{
            border-radius:10px;
            padding:6px 12px;
            display:inline-flex;
            align-items:center;
            gap:6px;
        }

    </style>

</head>

<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top py-2">

    <div class="container-fluid px-md-5">

        <a class="navbar-brand d-flex align-items-center gap-2"
           href="/">

            <img src="{{ asset('img/download (4).png') }}"
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

                    {{-- MENU SAMA PERSIS DENGAN FILE LAMAMU --}}

                </ul>

                <div class="d-flex align-items-center mt-2 mt-lg-0">

                    {{-- LOGIN / PROFILE SAMA PERSIS DENGAN FILE LAMAMU --}}

                </div>

            </div>

        </div>

    </div>

</nav>

<main>

<div class="container py-4">

    @if(session('error'))

        <div class="alert alert-danger rounded-3">

            {{ session('error') }}

        </div>

    @endif

    @if(session('success'))

        <div class="alert alert-success rounded-3">

            {{ session('success') }}

        </div>

    @endif

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h2 class="fw-bold mb-1">

                Detail Kartu Rencana Studi

            </h2>

            <p class="text-muted mb-0">

                Informasi lengkap mengenai KRS mahasiswa.

            </p>

        </div>

        @if(Auth::user()->role == 'mahasiswa')

            <a href="{{ route('krs.index') }}"
               class="btn btn-primary rounded-3">

                <i class="bi bi-arrow-left-circle me-2"></i>

                Kembali

            </a>

        @elseif(Auth::user()->role == 'dosen')

            <a href="{{ route('dosen.krs.index') }}"
               class="btn btn-primary rounded-3">

                <i class="bi bi-arrow-left-circle me-2"></i>

                Kembali

            </a>

        @else

            <a href="{{ route('admin.krs.index') }}"
               class="btn btn-primary rounded-3">

                <i class="bi bi-arrow-left-circle me-2"></i>

                Kembali

            </a>

        @endif

    </div>
        <!-- Info KRS -->

    <div class="card info-card mb-4">

        <div class="card-header bg-white border-0 py-4">

            <h4 class="fw-bold mb-1">

                <i class="bi bi-person-vcard-fill text-primary me-2"></i>

                Informasi KRS

            </h4>

            <small class="text-muted">

                Data utama Kartu Rencana Studi mahasiswa.

            </small>

        </div>

        <div class="card-body px-4 py-2">

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-person-badge-fill text-primary me-2"></i>

                    NIM

                </div>

                <div class="info-value">

                    {{ $krs->mahasiswa->NIM }}

                </div>

            </div>

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-person-fill text-primary me-2"></i>

                    Nama Mahasiswa

                </div>

                <div class="info-value">

                    {{ $krs->mahasiswa->Fullname }}

                </div>

            </div>

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-mortarboard-fill text-primary me-2"></i>

                    Tahun Ajaran

                </div>

                <div class="info-value">

                    {{ $krs->tahun_ajaran }}

                </div>

            </div>

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-book-half text-primary me-2"></i>

                    Semester

                </div>

                <div class="info-value">

                    {{ ucfirst($krs->semester) }}

                </div>

            </div>

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-journal-bookmark-fill text-primary me-2"></i>

                    Total SKS

                </div>

                <div class="info-value">

                    {{ $krs->total_sks }} SKS

                </div>

            </div>

            <div class="info-item">

                <div class="info-label">

                    <i class="bi bi-patch-check-fill text-primary me-2"></i>

                    Status KRS

                </div>

                <div class="info-value">

                    @if($krs->status == 'approved')

                        <span class="badge bg-success badge-status">

                            Approved

                        </span>

                    @elseif($krs->status == 'pending')

                        <span class="badge bg-warning text-dark badge-status">

                            Pending

                        </span>

                    @elseif($krs->status == 'partial')

                        <span class="badge bg-info badge-status">

                            Partial

                        </span>

                    @else

                        <span class="badge bg-danger badge-status">

                            Declined

                        </span>

                    @endif

                </div>

            </div>

        </div>

    </div>

    <!-- Daftar Mata Kuliah -->

    <div class="card info-card mb-4">

        <div class="card-header bg-white border-0 py-4 d-flex justify-content-between align-items-center">

            <div>

                <h4 class="fw-bold mb-1">

                    <i class="bi bi-journal-text text-primary me-2"></i>

                    Mata Kuliah Diambil

                </h4>

                <small class="text-muted">

                    Seluruh mata kuliah yang terdapat pada KRS ini.

                </small>

            </div>

        </div>

        <div class="card-body p-4">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>

                            <th>No</th>

                            <th>Mata Kuliah</th>

                            <th>SKS</th>

                            <th>Dosen</th>

                            <th>Jadwal</th>

                            <th>Status</th>

                            <th class="text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>                        @forelse($krs->detail as $item)

                        <tr>

                            <td>

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $item->kelas->mataKuliah->Nama_Mata_Kuliah }}

                                </div>

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary border rounded-pill px-3 py-2">

                                    {{ $item->kelas->mataKuliah->SKS }} SKS

                                </span>

                            </td>

                            <td>

                                {{ $item->kelas->dosen->Fullname }}

                            </td>

                            <td>

                                <div>

                                    <strong>{{ ucfirst($item->kelas->hari) }}</strong>

                                    <br>

                                    <small class="text-muted">

                                        {{ $item->kelas->jam }}

                                    </small>

                                </div>

                            </td>

                            <td>

                                @if($item->status == 'approved')

                                    <span class="badge bg-success badge-status">

                                        Approved

                                    </span>

                                @elseif($item->status == 'declined')

                                    <span class="badge bg-danger badge-status">

                                        Declined

                                    </span>

                                @else

                                    <span class="badge bg-warning text-dark badge-status">

                                        Pending

                                    </span>

                                @endif

                            </td>

                            <td class="text-center">

                                @if(Auth::user()->role == 'dosen' && $item->status == 'pending')

                                    <div class="d-flex justify-content-center gap-2 flex-wrap">

                                        <form action="{{ route('krsdetail.approve',$item->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button class="btn btn-success btn-sm btn-action">

                                                <i class="bi bi-check-circle"></i>

                                                Approve

                                            </button>

                                        </form>

                                        <form action="{{ route('krsdetail.reject',$item->id) }}"
                                              method="POST">

                                            @csrf
                                            @method('PUT')

                                            <button class="btn btn-danger btn-sm btn-action">

                                                <i class="bi bi-x-circle"></i>

                                                Reject

                                            </button>

                                        </form>

                                    </div>

                                @elseif(Auth::user()->role == 'mahasiswa' && $item->status == 'pending')

                                    <form action="{{ route('krsdetail.destroy',$item->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Batalkan mata kuliah ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-outline-danger btn-sm btn-action">

                                            <i class="bi bi-trash"></i>

                                            Batalkan

                                        </button>

                                    </form>

                                @else

                                    <span class="text-muted">

                                        Sudah Diproses

                                    </span>

                                @endif

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="7"
                                class="text-center py-5">

                                <i class="bi bi-journal-x display-5 text-secondary d-block mb-3"></i>

                                <h5 class="fw-semibold text-secondary">

                                    Belum Ada Mata Kuliah

                                </h5>

                                <p class="text-muted mb-0">

                                    Belum ada mata kuliah yang diambil pada KRS ini.

                                </p>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>