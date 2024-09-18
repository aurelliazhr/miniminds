<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BermainController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegguruController;
use App\Http\Controllers\BintangController;
use App\Http\Controllers\StikerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');

    Route::get('/kode', [RegguruController::class, 'kode'])->name('kode');
    Route::get('/regguru', [RegguruController::class, 'regguru'])->name('regguru');
    Route::post('/regguru-proses', [RegguruController::class, 'regguru_proses'])->name('regguru-proses');
});

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/store-stiker', [StikerController::class, 'storeStiker']);
    Route::get('/home', [ProfileController::class, 'show'])->name('home');

    Route::get('/test', [HomeController::class, 'tes']);

    Route::get('/belajar', [HomeController::class, 'belajar'])->name('belajar');
    Route::get('/huruf', [BelajarController::class, 'huruf'])->name('huruf');
    Route::get('/angka', [BelajarController::class, 'angka'])->name('angka');
    Route::get('/hijaiyah', [BelajarController::class, 'hijaiyah'])->name('hijaiyah');

    Route::get('/bermain', [HomeController::class, 'bermain'])->name('bermain');
    Route::get('/menebakH', [BermainController::class, 'menebakH'])->name('menebakH');
    Route::get('/menebakA', [BermainController::class, 'menebakA'])->name('menebakA');
    Route::get('/menebakHi', [BermainController::class, 'menebakHi'])->name('menebakHi');
    Route::get('/menebak', [BermainController::class, 'menebak'])->name('menebak');
    Route::get('/aktivitas', [BermainController::class, 'aktivitas'])->name('aktivitas');
    Route::get('/eksplor', [BermainController::class, 'eksplor'])->name('eksplor');

    Route::middleware('guru')->group(function () {
        Route::get('/guru', [GuruController::class, 'guru'])->name('guru');

        Route::get('/menambah', [GuruController::class, 'menambah'])->name('menambah');
        Route::post('/menambah-proses', [GuruController::class, 'menambah_proses'])->name('menambah-proses');

        Route::get('/melihat', [GuruController::class, 'melihat'])->name('melihat');
        Route::post('/melihat-proses', [GuruController::class, 'melihat_proses'])->name('melihat-proses');

        Route::get('/data', [GuruController::class, 'data'])->name('data');

        Route::get('/catatan/{id}', [GuruController::class, 'catatan'])->name('catatan');
        Route::put('/update/{id}', [GuruController::class, 'update'])->name('update');
    });

    // Route::middleware('auth')->group(function () {
    //     Route::post('/store-stiker', [StikerController::class, 'storeStiker']);
    //     Route::get('/home', [ProfileController::class, 'show'])->name('home'); 
    // });
});
