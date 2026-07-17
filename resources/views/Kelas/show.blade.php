<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Kelas - SIAKAD ITBSS</title>

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
            border:none;
            border-radius:18px;
            overflow:hidden;
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
            font-weight:600;
            color:#6b7280;
            margin-bottom:6px;
        }

        .info-value{
            font-size:16px;
            font-weight:600;
            color:#1f2937;
        }

        .badge-code{
            background:#2563eb;
            color:white;
            padding:8px 14px;
            border-radius:999px;
            font-size:14px;
            font-weight:600;
        }

    </style>

</head>

<body class="d-flex flex-column h-100">

<nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm fixed-top py-2">

    <div class="container-fluid px-md-5">

        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
            <img src="{{ asset('img/download (4).png') }}" width="50">
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
                        <a class="nav-link active fw-semibold" href="/">
                            Home
                        </a>
                    </li>

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle"
                           href="#"
                           data-bs-toggle="dropdown">

                            Menu Academic

                        </a>

                        <ul class="dropdown-menu shadow-sm border-0">
                        <main>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card info-card">

                <!-- Header -->
                <div class="card-header bg-white py-4 border-bottom d-flex justify-content-between align-items-center">

                    <div>

                        <h3 class="fw-bold mb-1">

                            Detail Jadwal Kuliah

                        </h3>

                        <small class="text-muted">

                            Informasi lengkap mengenai jadwal perkuliahan.

                        </small>

                    </div>

                    <a href="{{ route('kelas.index') }}"
                       class="btn btn-outline-secondary rounded-3">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>

                <!-- Body -->

                <div class="card-body p-4">

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-bookmark-fill text-primary me-2"></i>

                            Kode Kelas

                        </div>

                        <div class="info-value">

                            <span class="badge-code">

                                {{ $kelas->kode_kelas }}

                            </span>

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-journal-bookmark-fill text-primary me-2"></i>

                            Mata Kuliah

                        </div>

                        <div class="info-value">

                            {{ $kelas->mataKuliah->Nama_Mata_Kuliah ?? '-' }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-person-badge-fill text-primary me-2"></i>

                            Dosen Pengampu

                        </div>

                        <div class="info-value">

                            {{ $kelas->dosen->Fullname ?? '-' }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-calendar-week-fill text-primary me-2"></i>

                            Hari Perkuliahan

                        </div>

                        <div class="info-value">

                            {{ ucfirst($kelas->hari) }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-clock-fill text-primary me-2"></i>

                            Jam Perkuliahan

                        </div>

                        <div class="info-value">

                            {{ $kelas->jam }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-building-fill text-primary me-2"></i>

                            Ruang Kelas

                        </div>

                        <div class="info-value">

                            {{ $kelas->ruang_kelas }}

                        </div>

                    </div>
                                        <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-mortarboard-fill text-primary me-2"></i>

                            Tahun Ajaran

                        </div>

                        <div class="info-value">

                            {{ $kelas->tahun_ajaran }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-book-half text-primary me-2"></i>

                            Semester

                        </div>

                        <div class="info-value">

                            {{ ucfirst($kelas->semester) }}

                        </div>

                    </div>

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-people-fill text-primary me-2"></i>

                            Kapasitas Mahasiswa

                        </div>

                        <div class="info-value">

                            {{ $kelas->jumlah_mahasiswa }} / {{ $kelas->jumlah_max }} Mahasiswa

                        </div>

                    </div>

                    @if(isset($kelas->created_at))

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-calendar-check-fill text-primary me-2"></i>

                            Tanggal Dibuat

                        </div>

                        <div class="info-value">

                            {{ $kelas->created_at->format('d F Y') }}

                        </div>

                    </div>

                    @endif

                    @if(isset($kelas->updated_at))

                    <div class="info-item">

                        <div class="info-label">

                            <i class="bi bi-clock-history text-primary me-2"></i>

                            Terakhir Diperbarui

                        </div>

                        <div class="info-value">

                            {{ $kelas->updated_at->format('d F Y') }}

                        </div>

                    </div>

                    @endif

                </div>

                <!-- Footer -->

                <div class="card-footer bg-white border-top py-3">

                    <div class="d-flex justify-content-end">

                        <a href="{{ route('kelas.index') }}"
                           class="btn btn-primary rounded-3 px-4">

                            <i class="bi bi-arrow-left-circle me-2"></i>

                            Kembali ke Data Kelas

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