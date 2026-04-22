<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/mahasiswa', [MahasiswaController :: class, 'index']);
Route::get('/mahasiswa/{id}', [MahasiswaController :: class, 'show']);
Route::get('/mahasiswa-create', [MahasiswaController :: class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController :: class, 'store'])->name('mahasiswa.save');
Route::get('/mahasiswa-edit/{id}', [MahasiswaController :: class, 'edit']);
Route::put('/mahasiswa/{id}', [MahasiswaController :: class, 'update'])->name('mahasiswa.edit');
Route::delete('/mahasiswa/{id}', [MahasiswaController :: class, 'destroy'])->name('mahasiswa.delete');
