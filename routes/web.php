<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BermainController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegguruController;
use App\Http\Controllers\BintangController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MainAngkaController;
use App\Http\Controllers\MainQuizController;
use App\Http\Controllers\StikerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
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

    Route::get('/upload/{id}', [UploadController::class, 'upload'])->name('upload');
    Route::put('/upload-proses/{id}', [UploadController::class, 'upload_proses'])->name('upload-proses');

    Route::get('/home', [ProfileController::class, 'show'])->name('home');

    Route::get('/test', [HomeController::class, 'tes']);

    Route::get('/belajar', [HomeController::class, 'belajar'])->name('belajar');
    Route::get('/huruf', [BelajarController::class, 'huruf'])->name('huruf');
    Route::get('/angka', [BelajarController::class, 'angka'])->name('angka');
    Route::get('/hijaiyah', [BelajarController::class, 'hijaiyah'])->name('hijaiyah');

    Route::get('/bermain', [HomeController::class, 'bermain'])->name('bermain');
    Route::get('/menebakH', [BermainController::class, 'menebakH'])->name('menebakH');

    Route::get('/menebakA', [BermainController::class, 'menebakA'])->name('menebakA');
    Route::get('/menebakAngka1', [MainAngkaController::class, 'angka1'])->name('menebakAngka1');
    Route::get('/menebakAngka2', [MainAngkaController::class, 'angka2'])->name('menebakAngka2');
    Route::get('/menebakAngka3', [MainAngkaController::class, 'angka3'])->name('menebakAngka3');
    Route::get('/menebakAngka4', [MainAngkaController::class, 'angka4'])->name('menebakAngka4');
    Route::get('/menebakAngka5', [MainAngkaController::class, 'angka5'])->name('menebakAngka5');
    Route::get('/menebakAngka6', [MainAngkaController::class, 'angka6'])->name('menebakAngka6');
    Route::get('/menebakAngka7', [MainAngkaController::class, 'angka7'])->name('menebakAngka7');
    Route::get('/menebakAngka8', [MainAngkaController::class, 'angka8'])->name('menebakAngka8');
    Route::get('/menebakAngka9', [MainAngkaController::class, 'angka9'])->name('menebakAngka9');
    Route::get('/menebakAngka10', [MainAngkaController::class, 'angka10'])->name('menebakAngka10');

    Route::get('/menebakHi', [BermainController::class, 'menebakHi'])->name('menebakHi');

    Route::get('/menebak', [BermainController::class, 'menebak'])->name('menebak');
    Route::get('quiz1', [MainQuizController::class, 'quiz1'])->name('quiz1');
    Route::get('quiz2', [MainQuizController::class, 'quiz2'])->name('quiz2');
    Route::get('quiz3', [MainQuizController::class, 'quiz3'])->name('quiz3');
    Route::get('quiz4', [MainQuizController::class, 'quiz4'])->name('quiz4');
    Route::get('quiz5', [MainQuizController::class, 'quiz5'])->name('quiz5');
    Route::get('quiz6', [MainQuizController::class, 'quiz6'])->name('quiz6');
    Route::get('quiz7', [MainQuizController::class, 'quiz7'])->name('quiz7');
    Route::get('quiz8', [MainQuizController::class, 'quiz8'])->name('quiz8');
    Route::get('quiz9', [MainQuizController::class, 'quiz9'])->name('quiz9');
    Route::get('quiz10', [MainQuizController::class, 'quiz10'])->name('quiz10');

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

        Route::get('/edit/{id}', [EditController::class, 'edit'])->name('edit');
        Route::put('/edit-proses/{id}', [EditController::class, 'edit_proses'])->name('edit-proses');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/store-stiker', [StikerController::class, 'storeStiker']);
        Route::get('/home', [ProfileController::class, 'show'])->name('home');
    });
});
