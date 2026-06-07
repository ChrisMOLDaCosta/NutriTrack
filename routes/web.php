<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| 1. JALUR AKSES UMUM & PROSES OTENTIKASI (GUEST PUBLIC)
|--------------------------------------------------------------------------
*/

Route::get('/', function () { 
    return view('welcome'); 
});

// Sektor Halaman Login & Otentikasi Masuk
Route::get('/login', function () { 
    return view('login'); 
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.proses');

// Sektor Halaman Registrasi Akun Petugas Baru (FIXED: Ditambahkan Name Route)
Route::get('/register', function () { 
    return view('register'); 
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.proses');


/*
|--------------------------------------------------------------------------
| 2. AREA PRIVAT NUTRITRACK (SISTEM DIKUNCI MIDDLEWARE AUTH)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    
    // Halaman Dashboard Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Berkas Data Anak / Peserta (CRUD API Terstruktur)
    Route::prefix('peserta')->name('peserta.')->group(function () {
        Route::get('/', [PesertaController::class, 'index'])->name('index');
        Route::post('/store', [PesertaController::class, 'store'])->name('store');
        Route::put('/{id}', [PesertaController::class, 'update'])->name('update');
        Route::delete('/{id}', [PesertaController::class, 'destroy'])->name('destroy');
    });

    // Fitur Pendukung Kalkulator BMI (FIXED: Name Route Disinkronkan dengan Layout)
    Route::get('/hitung-bmi', function () { 
        return view('hitung'); 
    })->name('hitung-bmi');

    // Rekapitulasi Laporan Berkala & Filter Gizi Anak
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

    // Pengaturan Akun Profil & Ganti Password Petugas (Sinkron dengan View Profil Premium)
    Route::prefix('profil')->name('profil.')->group(function () {
        Route::get('/', [ProfilController::class, 'index'])->name('index');
        Route::put('/update', [ProfilController::class, 'update'])->name('update');
        Route::put('/password', [ProfilController::class, 'updatePassword'])->name('password');
    });
    
    // Alur Keluar Gerbang Sesi Aplikasi
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});