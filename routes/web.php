<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\KRSDetailController;

Route::get('/', function () {
    return view('dashboard', [
        'user' => Auth::user(),
    ]);
})->name('dashboard');

/*
|--------------------------------------------------------------------------
| Guest
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'loginView'])->name('login.view');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

});

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    /*
    |--------------------------------------------------------------------------
    | DOSEN
    |--------------------------------------------------------------------------
    | PENTING: grup ini harus didaftarkan SEBELUM grup ADMIN. Route::resource('dosen', ...)
    | di bawah otomatis membuat route GET /dosen/{dosen} (untuk halaman show).
    | Karena {dosen} itu wildcard, pattern itu juga cocok dengan URL seperti
    | /dosen/mahasiswa, /dosen/kelas, dst. Kalau grup ADMIN didaftarkan lebih dulu,
    | Laravel akan mencocokkan /dosen/mahasiswa ke route resource itu (middleware
    | role:admin) alih-alih ke route literal di bawah ini (middleware role:dosen),
    | karena Laravel mencocokkan route sesuai urutan didaftarkan, bukan spesifisitas.
    */

    Route::middleware('role:dosen')->group(function () {

        Route::get('/dosen/krs', [KRSController::class, 'index'])
            ->name('dosen.krs.index');

        Route::get('/dosen/krs/{id}', [KRSController::class, 'show'])
            ->name('dosen.krs.show');

        Route::get('/krsdetail', [KRSDetailController::class, 'index'])
            ->name('krsdetail.index');

        Route::put('/krsdetail/{id}/approve', [KRSDetailController::class, 'approve'])
            ->name('krsdetail.approve');

        Route::put('/krsdetail/{id}/reject', [KRSDetailController::class, 'reject'])
            ->name('krsdetail.reject');

        // Akses baca-saja ke data yang dikelola Admin
        Route::get('/dosen/mahasiswa', [MahasiswaController::class, 'index'])->name('dosen.mahasiswa.index');
        Route::get('/dosen/mahasiswa/{id}', [MahasiswaController::class, 'show'])->name('dosen.mahasiswa.show');

        Route::get('/dosen/dosen', [DosenController::class, 'index'])->name('dosen.dosen.index');
        Route::get('/dosen/dosen/{id}', [DosenController::class, 'show'])->name('dosen.dosen.show');

        Route::get('/dosen/jurusan', [JurusanController::class, 'index'])->name('dosen.jurusan.index');
        Route::get('/dosen/jurusan/{id}', [JurusanController::class, 'show'])->name('dosen.jurusan.show');

        Route::get('/dosen/matakuliah', [MataKuliahController::class, 'index'])->name('dosen.matakuliah.index');
        Route::get('/dosen/matakuliah/{id}', [MataKuliahController::class, 'show'])->name('dosen.matakuliah.show');

        Route::get('/dosen/kelas', [KelasController::class, 'index'])->name('dosen.kelas.index');
        Route::get('/dosen/kelas/{id}', [KelasController::class, 'show'])->name('dosen.kelas.show');
    });

    /*
    |--------------------------------------------------------------------------
    | ADMIN
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:admin')->group(function () {

        Route::resource('mahasiswa', MahasiswaController::class);
        Route::resource('dosen', DosenController::class);
        Route::resource('jurusan', JurusanController::class);
        Route::resource('matakuliah', MataKuliahController::class);
        // Kelas: sesuai arahan dosen, tidak ada fitur edit/update
        Route::resource('kelas', KelasController::class)->except(['edit', 'update']);

        Route::get('/admin/krs', [KRSController::class, 'index'])
            ->name('admin.krs.index');

        Route::get('/admin/krs/{id}', [KRSController::class, 'show'])
            ->name('admin.krs.show');

        Route::delete('/admin/krs/{id}', [KRSController::class, 'destroy'])
            ->name('admin.krs.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | MAHASISWA
    |--------------------------------------------------------------------------
    */

    Route::middleware('role:mahasiswa')->group(function () {

        Route::get('/krs', [KRSController::class, 'index'])
            ->name('krs.index');

        Route::get('/krs/create', [KRSController::class, 'create'])
            ->name('krs.create');

        Route::post('/krs', [KRSController::class, 'store'])
            ->name('krs.store');

        Route::get('/krs/{id}', [KRSController::class, 'show'])
            ->name('krs.show');

        // Pilih / batalkan mata kuliah pada KRS milik sendiri
        Route::post('/krsdetail', [KRSDetailController::class, 'store'])
            ->name('krsdetail.store');

        Route::delete('/krsdetail/{id}', [KRSDetailController::class, 'destroy'])
            ->name('krsdetail.destroy');
    });
});