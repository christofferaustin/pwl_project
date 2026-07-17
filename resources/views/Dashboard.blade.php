<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIAKAD ITBSS</title>
    <!-- Google Fonts untuk Tipografi Premium -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        :root {
            --primary-color: #0F172A;
            --accent-color: #2563EB;
            --accent-light: #EFF6FF;
            --text-muted: #64748B;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--primary-color);
            overflow-x: hidden;
        }

        /* Navbar Glassmorphism */
        .navbar-custom {
            background: rgba(255, 255, 255, 0.85) !important;
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            transition: all 0.3s ease;
        }

        .nav-link {
            color: #475569 !important;
            font-weight: 500;
            transition: color 0.2s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--accent-color) !important;
        }

        /* Hero Section dengan Efek Vignette */
        .hero {
            position: relative;
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.95) 0%, rgba(30, 41, 59, 0.8) 100%), url('/img/banner2.jpeg') center center no-repeat;
            background-size: cover;
            background-attachment: fixed;
            padding: 140px 0 100px 0;
        }

        .badge-custom {
            background: rgba(37, 99, 235, 0.2);
            color: #60A5FA;
            border: 1px solid rgba(37, 99, 235, 0.3);
            backdrop-filter: blur(5px);
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        /* Card Agenda Premium */
        .agenda-card {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            color: white;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.3);
            border-color: rgba(37, 99, 235, 0.4);
        }

        .agenda-item {
            border-left: 3px solid var(--accent-color);
            padding-left: 15px;
            transition: all 0.2s ease;
        }

        .agenda-item:hover {
            border-left-color: #60A5FA;
            background: rgba(255,255,255,0.02);
        }

        /* Counter Stat */
        .stat-box {
            border-right: 1px solid rgba(255,255,255,0.1);
        }
        @media(max-width: 768px) {
            .stat-box {
                border-right: none;
                border-bottom: 1px solid rgba(255,255,255,0.1);
                padding-bottom: 15px;
                margin-bottom: 15px;
            }
        }

        /* Modern Accordion */
        .accordion-item-custom {
            background: white;
            border: 1px solid #E2E8F0 !important;
            border-radius: 12px !important;
            margin-bottom: 16px;
            overflow: hidden;
            transition: all 0.2s ease;
        }

        .accordion-item-custom:hover {
            box-shadow: 0 10px 20px rgba(0,0,0,0.03);
            border-color: #CBD5E1 !important;
        }

        .accordion-button-custom {
            padding: 20px 24px;
            font-weight: 600;
            color: var(--primary-color) !important;
            background-color: white !important;
            box-shadow: none !important;
        }

        .accordion-button-custom:not(.collapsed) {
            color: var(--accent-color) !important;
            background-color: var(--accent-light) !important;
        }

        /* Map Card */
        .map-wrapper {
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.08);
            border: 1px solid #E2E8F0;
        }

        /* Utility */
        .btn-primary-custom {
            background-color: var(--accent-color);
            border: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-primary-custom:hover {
            background-color: #1D4ED8;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-custom fixed-top py-3 border-bottom border-light">
    <div class="container px-md-4">
        
        <!-- BRAND LOGO -->
        <a class="navbar-brand d-flex align-items-center" href="/">
            <img src="{{ asset('img/download (4).png') }}" alt="Logo Itbss" width="45" height="auto" class="d-inline-block align-top">
            <span class="ms-3 fw-bold fs-5 d-none d-sm-inline-block" style="color: var(--primary-color); letter-spacing: -0.5px;">SIAKAD ITBSS</span>
        </a>
        
        <!-- Mobile Toggler -->
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- NAVBAR CONTENT -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-lg-flex justify-content-between align-items-center w-100 ms-lg-4">
                
                <!-- ACADEMIC MENU -->
                <ul class="navbar-nav mb-2 mb-lg-0 align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Academic Menu
                        </a>
                        <ul class="dropdown-menu dropdown-menu-start shadow-lg border-0 rounded-3 mt-2">
                            @auth
                                @if(Auth::user()->role == 'admin')
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.index') }}">👤 Data Dosen</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('mahasiswa.index') }}">🎓 Data Mahasiswa</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('kelas.index') }}">🏫 Manajemen Kelas</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('jurusan.index') }}">📚 Program Studi</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('matakuliah.index') }}">📖 Mata Kuliah</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('admin.krs.index') }}">📝 Manajemen KRS</a></li>
                                @elseif(Auth::user()->role == 'mahasiswa')
                                    <li><a class="dropdown-item py-2" href="{{ route('krs.index') }}">📝 Pengisian KRS</a></li>
                                @elseif(Auth::user()->role == 'dosen')
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.mahasiswa.index') }}">🎓 Mahasiswa Bimbingan</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.dosen.index') }}">👤 Profil Dosen</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.kelas.index') }}">🏫 Jadwal Kelas</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.jurusan.index') }}">📚 Informasi Prodi</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.matakuliah.index') }}">📖 Silabus Matkul</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('dosen.krs.index') }}">📝 Rekap KRS Mahasiswa</a></li>
                                    <li><a class="dropdown-item py-2" href="{{ route('krsdetail.index') }}">✅ Approval Mata Kuliah</a></li>
                                @endif
                            @endauth
                        </ul>
                    </li>
                </ul>

                <!-- AUTHENTICATION -->
                <div class="d-flex align-items-center mt-3 mt-lg-0">
                    @guest
                    <div class="d-flex gap-2 w-100 justify-content-center">
                        <a class="btn btn-light rounded-3 px-4 border" href="{{ action([App\Http\Controllers\AuthController::class, 'loginView']) }}">
                            Login
                        </a>
                        <a class="btn btn-primary-custom rounded-3 px-4 text-white" href="{{ action([App\Http\Controllers\AuthController::class, 'registerView']) }}">
                            Register
                        </a>
                    </div>
                    @endguest

                    @auth
                    <div class="dropdown w-100 text-center text-lg-start">
                        <a href="#" class="nav-link dropdown-toggle d-inline-flex align-items-center gap-2 fw-semibold border rounded-pill px-3 py-1.5 bg-light" data-bs-toggle="dropdown">
                            <img src="{{ asset('img/user.png') }}" width="26" height="26" class="rounded-circle border">
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-3 mt-2">
                            <li><a href="" class="dropdown-item py-2">👤 Profile Akun</a></li>
                            <li><hr class="dropdown-divider m-0"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item py-2 text-danger">🚪 Logout</button>
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

    <!-- HERO SECTION -->
    <section class="hero min-vh-100 d-flex align-items-center">
        <div class="container">
            <div class="row align-items-center g-5">
                
                <!-- Left Text Column -->
                <div class="col-lg-7 text-white">
                    <span class="badge badge-custom rounded-pill px-3 py-2 mb-4 fs-7 animate__animated animate__fadeInUp">
                        📢 PMB TA 2026/2027 Telah Resmi Dibuka
                    </span>

                    <h1 class="display-4 fw-extrabold mb-4 lh-tight">
                        Wujudkan Masa Depan <br>
                        <span style="color: #60A5FA;">Digital & Bisnis</span> Bersama ITBSS
                    </h1>

                    <p class="lead text-white-50 mb-5 fs-5 lh-relaxed">
                        Kami menyediakan ekosistem pendidikan transformatif yang mengintegrasikan teknologi dan kesiapan karir. Menuntun Anda menemukan kompetensi terbaik dan tumbuh menjadi pemimpin masa depan yang berani berinovasi.
                    </p>

                    <div class="d-flex flex-wrap gap-3 mb-5">
                        <a href="" class="btn btn-primary-custom btn-lg px-4 py-3 text-white rounded-3">
                            Daftar Sekarang
                        </a>
                        <a href="" class="btn btn-outline-light btn-lg px-4 py-3 rounded-3">
                            Lihat Profil Kampus
                        </a>
                    </div>

                    <!-- Clean Counters -->
                    <div class="row pt-4 border-top border-secondary text-start g-3">
                        <div class="col-6 col-md-3 stat-box">
                            <h3 class="fw-bold mb-0">3</h3>
                            <small class="text-white-50">Program Studi</small>
                        </div>
                        <div class="col-6 col-md-3 stat-box">
                            <h3 class="fw-bold mb-0">500+</h3>
                            <small class="text-white-50">Mahasiswa Aktif</small>
                        </div>
                        <div class="col-6 col-md-3 stat-box">
                            <h3 class="fw-bold mb-0">20+</h3>
                            <small class="text-white-50">Dosen Ahli</small>
                        </div>
                        <div class="col-6 col-md-3">
                            <h3 class="fw-bold mb-0 text-success">Baik</h3>
                            <small class="text-white-50">Akreditasi BAN-PT</small>
                        </div>
                    </div>
                </div>

                <!-- Right Card Column -->
                <div class="col-lg-5">
                    <div class="card agenda-card border-0 rounded-4 shadow-2xl">
                        <div class="card-body p-4 p-md-5">
                            <h4 class="mb-4 fw-bold d-flex align-items-center gap-2">
                                <span>📅</span> Agenda Akademik Terdekat
                            </h4>
                            <div class="vstack gap-4">
                                <div class="agenda-item">
                                    <span class="text-primary fw-bold small d-block mb-1 text-uppercase" style="color: #60A5FA !important;">1–5 Agustus 2025</span>
                                    <h6 class="mb-0 fw-semibold text-white">Pendaftaran Gelombang I</h6>
                                </div>
                                <div class="agenda-item">
                                    <span class="text-primary fw-bold small d-block mb-1 text-uppercase" style="color: #60A5FA !important;">20 Juli 2025</span>
                                    <h6 class="mb-0 fw-semibold text-white">Webinar & Info Session PMB</h6>
                                </div>
                                <div class="agenda-item">
                                    <span class="text-primary fw-bold small d-block mb-1 text-uppercase" style="color: #60A5FA !important;">15 September 2025</span>
                                    <h6 class="mb-0 fw-semibold text-white">Pengumuman Hasil Seleksi Final</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- CAROUSEL GALLERY SECTION -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div id="heroCarousel" class="carousel slide carousel-fade shadow-lg rounded-4 overflow-hidden" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/banner1.jpeg') }}" class="d-block w-100" style="height:550px; object-fit:cover;" alt="Kampus ITBSS 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/banner2.jpeg') }}" class="d-block w-100" style="height:550px; object-fit:cover;" alt="Kampus ITBSS 2">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ SECTION -->
    <section class="py-5 bg-light border-top border-bottom border-light">
        <div class="container py-4">
            <div class="text-center mb-5">
                <h2 class="fw-bold style mb-3" style="color: var(--primary-color); letter-spacing:-1px;">Frequently Asked Questions</h2>
                <p class="text-muted mx-auto fs-6" style="max-width: 600px;">
                    Butuh bantuan cepat? Temukan rangkuman jawaban dari pertanyaan-pertanyaan yang paling sering diajukan seputar PMB ITBSS.
                </p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion border-0" id="faqAccordion">
                        
                        <!-- Item 1 -->
                        <div class="accordion-item accordion-item-custom">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-custom" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Bagaimana cara melakukan pendaftaran?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary fs-6 py-4 px-4 bg-white">
                                    Cukup klik tombol <strong class="text-dark">Daftar Sekarang</strong> di atas, Anda akan diarahkan menuju halaman formulir registrasi digital. Isilah berkas identitas secara lengkap lalu unggah dokumen wajib yang diminta oleh sistem.
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="accordion-item accordion-item-custom">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Apa saja syarat pendaftaran?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary fs-6 py-4 px-4 bg-white">
                                    Berkas administratif mendasar mencakup scan ijazah terakhir/Surat Keterangan Lulus (SKL), KTP elektronik, Kartu Keluarga, pas foto formal terbaru, serta berkas sertifikat prestasi opsional jika ada.
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="accordion-item accordion-item-custom">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apakah tersedia program beasiswa?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary fs-6 py-4 px-4 bg-white">
                                    Tentu saja. ITBSS membuka jalur program beasiswa komprehensif baik berbasis pencapaian prestasi akademik, minat bakat non-akademik, maupun skema bantuan kesejahteraan sesuai syarat regulasi institusi.
                                </div>
                            </div>
                        </div>

                        <!-- Item 4 -->
                        <div class="accordion-item accordion-item-custom">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    Bagaimana cara mengetahui hasil seleksi?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary fs-6 py-4 px-4 bg-white">
                                    Setiap pengumuman kelulusan dapat langsung Anda periksa secara mandiri melalui dasbor akun pendaftaran personal Anda, atau lewat notifikasi resmi via email valid yang sudah Anda daftarkan.
                                </div>
                            </div>
                        </div>

                        <!-- Item 5 -->
                        <div class="accordion-item accordion-item-custom">
                            <h2 class="accordion-header">
                                <button class="accordion-button accordion-button-custom collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Bagaimana jika saya lupa password akun?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary fs-6 py-4 px-4 bg-white">
                                    Jangan khawatir, klik tautan <strong class="text-dark">Lupa Password</strong> di antarmuka halaman login. Sistem otomatis mengirimkan tautan verifikasi pemulihan kata sandi baru menuju kotak masuk email Anda.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- GEOLOCATION MAP SECTION -->
    <section class="py-5 bg-white">
        <div class="container py-4">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center mb-4">
                    <h4 class="fw-bold mb-2">📍 Lokasi Kampus Utama</h4>
                    <p class="text-muted small">Kunjungi kami untuk konsultasi langsung program studi dan keliling fasilitas belajar.</p>
                </div>
                <div class="col-lg-9">
                    <div class="map-wrapper animate__animated animate__zoomIn">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.4251756625717!2d109.31774780403317!3d-0.06582130056212282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5990c1ed4e5f%3A0x895c21a5be3c6939!2sInstitut%20Teknologi%20%26%20Bisnis%20Sabda%20Setia!5e0!3m2!1sid!2sid!4v1783236131196!5m2!1sid!2sid"
                            width="100%"
                            height="380"
                            style="border:0; display:block;"
                            allowfullscreen
                            loading="lazy"
                            referrerpolicy="strict-origin-when-cross-origin">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

@include('footer')

</body>
</html>