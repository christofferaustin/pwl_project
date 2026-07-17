<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - SIAKAD ITBSS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            padding-top: 80px; /* Menghindari konten tertutup oleh fixed navbar */
        }

        .hero {
            position: relative;
            background: url('/img/banner2.jpeg') center center no-repeat;
            background-size: cover;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(10, 35, 80, 0.65);
        }

         .badge{
            background:rgba(255,255,255,.15);
            backdrop-filter: blur(10px);
        }

        @media(max-width: 992px) {
            .hero {
                text-align: center;
            }
            .hero .card {
                margin-top: 40px;
            }
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

<section class="hero">

    <div class="overlay"></div>

    <div class="container position-relative">

        <div class="row align-items-center min-vh-100">

            <div class="col-lg-7 text-white">

                <span class="badge rounded-pill px-3 py-2 mb-4">
                    Penerimaan Mahasiswa Baru 2026/2027 Dibuka
                </span>

                <h1 class="display-3 fw-bold">
                    Wujudkan Masa Depan <br>
                    Bersama Institut Teknologi & Bisnis Sabda Setia
                </h1>

                <p class="lead my-4">
                    Kami memberikan sebuah pendidikan dan pengalaman yang mendorong kesuksesan mahasiswa dalam karir mereka. Kami membantu mereka untuk berhasil di karir mereka — menemukan bidang yang mereka senangi dan berani untuk memimpin di bidangnya.
                </p>

                <div class="d-flex gap-3">

                    <a href="" class="btn btn-primary btn-lg px-5">
                        Daftar Sekarang
                    </a>

                    <a href="" class="btn btn-outline-light btn-lg px-5">
                        Lihat Profil
                    </a>

                </div>

                <div class="row mt-5 text-center">

                    <div class="col-3">
                        <h2 class="fw-bold">3</h2>
                        <small>Program Studi</small>
                    </div>

                    <div class="col-3">
                        <h2 class="fw-bold">500+</h2>
                        <small>Mahasiswa</small>
                    </div>

                    <div class="col-3">
                        <h2 class="fw-bold">20+</h2>
                        <small>Dosen</small>
                    </div>

                    <div class="col-3">
                        <h2 class="fw-bold">Baik</h2>
                        <small>Akreditasi</small>
                    </div>

                </div>

            </div>

            <div class="col-lg-5">

                <div class="card border-0 shadow-lg rounded-4">

                    <div class="card-body p-4">

                        <h4 class="mb-4">
                            📅 Agenda Terdekat
                        </h4>

                        <div class="mb-4">
                            <strong>1–5 Agustus 2025</strong><br>
                            Pendaftaran Gelombang 1
                        </div>

                        <div class="mb-4">
                            <strong>20 Juli 2025</strong><br>
                            Webinar & Info Session
                        </div>

                        <div>
                            <strong>15 September 2025</strong><br>
                            Pengumuman Hasil Seleksi
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<div class="container py-5 mt-5">

    <div id="heroCarousel"
         class="carousel slide carousel-fade shadow rounded-4 overflow-hidden"
         data-bs-ride="carousel">

        <!-- Indicator -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
        </div>

        <div class="carousel-inner">

            <!-- Slide 1 -->
            <div class="carousel-item active">

                <img src="{{ asset('img/banner1.jpeg') }}"
                     class="d-block w-100"
                     style="height:800px; object-fit:cover;">

            </div>

            <!-- Slide 2 -->
            <div class="carousel-item">

                <img src="{{ asset('img/banner2.jpeg') }}"
                     class="d-block w-100"
                     style="height:800px; object-fit:cover;">

            </div>

        </div>

        <!-- Tombol Prev -->
        <button class="carousel-control-prev"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="prev">

            <span class="carousel-control-prev-icon"></span>

        </button>

        <!-- Tombol Next -->
        <button class="carousel-control-next"
                type="button"
                data-bs-target="#heroCarousel"
                data-bs-slide="next">

            <span class="carousel-control-next-icon"></span>

        </button>

    </div>

</div>


<!-- FAQ -->
<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="fw-bold display-6">
                Frequently Asked Questions
            </h2>

            <p class="text-muted fs-5">
                Temukan jawaban atas pertanyaan yang sering diajukan mengenai
                penerimaan mahasiswa baru ITBSS.
            </p>

        </div>

        <div class="col-lg-8 mx-auto">

            <div class="accordion shadow-lg rounded-4 overflow-hidden"
                 id="faqAccordion">

                <div class="accordion-item border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button fs-5 fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq1">

                            Bagaimana cara melakukan pendaftaran?

                        </button>

                    </h2>

                    <div id="faq1"
                         class="accordion-collapse collapse show"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body fs-5">

                            Klik tombol <strong>Daftar Sekarang</strong>, kemudian isi formulir pendaftaran secara lengkap dan unggah dokumen yang dipersyaratkan.

                        </div>

                    </div>

                </div>

                <div class="accordion-item border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fs-5 fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq2">

                            Apa saja syarat pendaftaran?

                        </button>

                    </h2>

                    <div id="faq2"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body fs-5">

                            Calon mahasiswa perlu menyiapkan ijazah/SKL, KTP, Kartu Keluarga, pas foto, dan dokumen pendukung lainnya.

                        </div>

                    </div>

                </div>

                <div class="accordion-item border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fs-5 fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq3">

                            Apakah tersedia program beasiswa?

                        </button>

                    </h2>

                    <div id="faq3"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body fs-5">

                            Ya. ITBSS menyediakan berbagai program beasiswa akademik maupun non-akademik sesuai dengan ketentuan yang berlaku.

                        </div>

                    </div>

                </div>

                <div class="accordion-item border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fs-5 fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq4">

                            Bagaimana cara mengetahui hasil seleksi?

                        </button>

                    </h2>

                    <div id="faq4"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body fs-5">

                            Hasil seleksi dapat dilihat melalui akun pendaftaran atau akan diinformasikan melalui email yang telah didaftarkan.

                        </div>

                    </div>

                </div>

                <div class="accordion-item border-0">

                    <h2 class="accordion-header">

                        <button class="accordion-button collapsed fs-5 fw-semibold"
                                type="button"
                                data-bs-toggle="collapse"
                                data-bs-target="#faq5">

                            Bagaimana jika saya lupa password akun?

                        </button>

                    </h2>

                    <div id="faq5"
                         class="accordion-collapse collapse"
                         data-bs-parent="#faqAccordion">

                        <div class="accordion-body fs-5">

                            Gunakan fitur <strong>Lupa Password</strong> pada halaman login untuk melakukan reset password melalui email.

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<div class="container my-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0 rounded-4">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">
                        📍 Lokasi Kampus
                    </h5>
                </div>

                <div class="card-body p-0">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2767.4251756625717!2d109.31774780403317!3d-0.06582130056212282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e1d5990c1ed4e5f%3A0x895c21a5be3c6939!2sInstitut%20Teknologi%20%26%20Bisnis%20Sabda%20Setia!5e0!3m2!1sid!2sid!4v1783236131196!5m2!1sid!2sid"
                        width="100%"
                        height="350"
                        style="border:0;"
                        allowfullscreen
                        loading="lazy"
                        referrerpolicy="strict-origin-when-cross-origin">
                    </iframe>

                </div>

            </div>

        </div>

    </div>

</div>
</main>

@include('footer')

</body>
</html>