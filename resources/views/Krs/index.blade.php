<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Data KRS - SIAKAD ITBSS</title>

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

        .table-responsive{
            border-radius:14px;
            overflow:hidden;
        }

        .search-box{
            border-radius:10px;
            border:1px solid #d1d5db;
            padding:10px 14px;
        }

        .search-box:focus{
            border-color:#2563eb;
            box-shadow:0 0 0 .2rem rgba(37,99,235,.15);
        }

        .btn-action{
            border-radius:10px;
            display:inline-flex;
            align-items:center;
            gap:6px;
            padding:6px 12px;
        }

        .badge-pill{
            border-radius:999px;
            padding:.55rem .9rem;
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
        <!-- Header -->

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

        <div>

            <h2 class="fw-bold text-dark mb-1">

                Data Kartu Rencana Studi

            </h2>

            <p class="text-muted mb-0">

                Kelola seluruh data Kartu Rencana Studi mahasiswa.

            </p>

        </div>

        @auth

            @if(Auth::user()->role == 'mahasiswa')

                <a href="{{ route('krs.create') }}"
                   class="btn btn-primary rounded-3 px-4 py-2 shadow-sm d-inline-flex align-items-center gap-2">

                    <i class="bi bi-plus-circle"></i>

                    Tambah KRS

                </a>

            @endif

        @endauth

    </div>

    <!-- Card -->

    <div class="card border-0 shadow-sm rounded-4">

        <div class="card-body p-4">

            <div class="row align-items-center mb-4">

                <div class="col-md-8">

                    @if(session('success'))

                        <div class="alert alert-success alert-dismissible fade show rounded-3 mb-3 mb-md-0 py-2">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            {{ session('success') }}

                            <button class="btn-close"
                                    data-bs-dismiss="alert"></button>

                        </div>

                    @endif

                </div>

                <div class="col-md-4">

                    <div class="input-group">

                        <span class="input-group-text bg-white border-end-0">

                            <i class="bi bi-search"></i>

                        </span>

                        <input type="text"
                               class="form-control search-box border-start-0"
                               placeholder="Cari mahasiswa...">

                    </div>

                </div>

            </div>

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th width="6%" class="text-center">

                                No

                            </th>

                            <th>

                                NIM

                            </th>

                            <th>

                                Nama Mahasiswa

                            </th>

                            <th>

                                Tahun Ajaran

                            </th>

                            <th>

                                Semester

                            </th>

                            <th>

                                Total SKS

                            </th>

                            <th>

                                Status

                            </th>

                            <th width="22%"
                                class="text-center">

                                Aksi

                            </th>

                        </tr>

                    </thead>

                    <tbody>                        @forelse($krs as $k)

                        <tr>

                            <td class="text-center">

                                {{ $loop->iteration }}

                            </td>

                            <td>

                                <span class="badge bg-primary-subtle text-primary border border-primary-subtle badge-pill">

                                    {{ $k->mahasiswa->NIM }}

                                </span>

                            </td>

                            <td>

                                <div class="fw-semibold">

                                    {{ $k->mahasiswa->Fullname }}

                                </div>

                            </td>

                            <td>

                                {{ $k->tahun_ajaran }}

                            </td>

                            <td>

                                <span class="badge bg-secondary badge-pill">

                                    {{ ucfirst($k->semester) }}

                                </span>

                            </td>

                            <td>

                                <span class="badge bg-success badge-pill">

                                    {{ $k->total_sks }} SKS

                                </span>

                            </td>

                            <td>

                                @if($k->status == 'approved')

                                    <span class="badge bg-success badge-pill">

                                        Approved

                                    </span>

                                @elseif($k->status == 'pending')

                                    <span class="badge bg-warning text-dark badge-pill">

                                        Pending

                                    </span>

                                @elseif($k->status == 'partial')

                                    <span class="badge bg-info badge-pill">

                                        Partial

                                    </span>

                                @else

                                    <span class="badge bg-danger badge-pill">

                                        Declined

                                    </span>

                                @endif

                            </td>

                            <td>

                                <div class="d-flex justify-content-center gap-2 flex-wrap">

                                    @if(Auth::user()->role == 'dosen')

                                        <a href="{{ route('dosen.krs.show',$k->id) }}"
                                           class="btn btn-outline-info btn-sm btn-action">

                                            <i class="bi bi-eye"></i>

                                            Detail

                                        </a>

                                    @elseif(Auth::user()->role == 'mahasiswa')

                                        <a href="{{ route('krs.show',$k->id) }}"
                                           class="btn btn-outline-info btn-sm btn-action">

                                            <i class="bi bi-eye"></i>

                                            Detail

                                        </a>

                                    @endif

                                    @if(Auth::user()->role == 'admin')

                                        <a href="{{ route('admin.krs.show',$k->id) }}"
                                           class="btn btn-outline-info btn-sm btn-action">

                                            <i class="bi bi-eye"></i>

                                            Detail

                                        </a>

                                        <form action="{{ route('admin.krs.destroy',$k->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('Yakin ingin menghapus data KRS ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-danger btn-sm btn-action">

                                                <i class="bi bi-trash"></i>

                                                Hapus

                                            </button>

                                        </form>

                                    @endif

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="8"
                                class="text-center py-5">

                                <i class="bi bi-journal-x display-5 text-secondary d-block mb-3"></i>

                                <h5 class="fw-semibold text-secondary">

                                    Belum Ada Data KRS

                                </h5>

                                <p class="text-muted mb-0">

                                    Data Kartu Rencana Studi belum tersedia.

                                </p>

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