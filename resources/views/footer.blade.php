<footer class="bg-dark text-white-50 pt-5 pb-4 mt-auto border-top border-secondary border-opacity-25">
    <div class="container text-center text-md-start">
        <div class="row g-4">
            <div class="col-md-5 col-lg-4">
                <h5 class="text-uppercase mb-4 fw-bold text-white">ITB Sabda Setia</h5>
                <p class="small">Sistem Informasi Akademik terpadu untuk efisiensi pengelolaan data operasional kampus (Mahasiswa, Dosen, Jurusan, dan KRS).</p>
            </div>

            <div class="col-md-3 col-lg-3 mx-auto">
                <h5 class="text-uppercase mb-4 fw-bold text-white">Tautan Pintas</h5>
                <div class="row g-2 small">
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\DosenController::class, 'index']) }}" class="text-white-50 text-decoration-none">Dosen</a></div>
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\MahasiswaController::class, 'index']) }}" class="text-white-50 text-decoration-none hover-white">Mahasiswa</a></div>
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\KelasController::class, 'index']) }}" class="text-white-50 text-decoration-none">Kelas</a></div>
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\JurusanController::class, 'index']) }}" class="text-white-50 text-decoration-none">Jurusan</a></div>
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\MataKuliahController::class, 'index']) }}" class="text-white-50 text-decoration-none">Mata Kuliah</a></div>
                    <div class="col-6"><a href="{{ action([App\Http\Controllers\KRSController::class, 'index']) }}" class="text-white-50 text-decoration-none">KRS</a></div>
                </div>
            </div>

            <div class="col-md-4 col-lg-3">
                <h5 class="text-uppercase mb-4 fw-bold text-white">Kontak Resmi</h5>
                <p class="small mb-1">📍 Parit Tokaya, Kec. Pontianak Sel., Kota Pontianak, Kalimantan Barat 78115</p>
                <p class="small">✉️ admin@itbss.ac.id</p>
            </div>
        </div>

        <hr class="my-4 border-secondary opacity-25">

        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-center small text-center text-sm-start">
            <p class="mb-0">© 2026 Copyright: <strong class="text-white">Sistem Informasi Akademik ITBSS</strong></p>
        </div>
    </div>
</footer>