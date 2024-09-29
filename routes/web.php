<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BermainController;
use App\Http\Controllers\BHurufController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegguruController;
use App\Http\Controllers\BintangController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MainAngkaController;
use App\Http\Controllers\MainHijaiyahController;
use App\Http\Controllers\MainHurufController;
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
    Route::get('/Huruf1_', [BHurufController::class, 'Huruf1_'])->name('Huruf1_');
    Route::get('/Huruf2_', [BHurufController::class, 'Huruf2_'])->name('Huruf2_');
    Route::get('/Huruf3_', [BHurufController::class, 'Huruf3_'])->name('Huruf3_');
    Route::get('/Huruf4_', [BHurufController::class, 'Huruf4_'])->name('Huruf4_');
    Route::get('/Huruf5_', [BHurufController::class, 'Huruf5_'])->name('Huruf5_');
    Route::get('/Huruf6_', [BHurufController::class, 'Huruf6_'])->name('Huruf6_');
    Route::get('/Huruf7_', [BHurufController::class, 'Huruf7_'])->name('Huruf7_');
    Route::get('/Huruf8_', [BHurufController::class, 'Huruf8_'])->name('Huruf8_');
    Route::get('/Huruf9_', [BHurufController::class, 'Huruf9_'])->name('Huruf9_');
    Route::get('/Huruf10_', [BHurufController::class, 'Huruf10_'])->name('Huruf10_');
    Route::get('/Huruf11_', [BHurufController::class, 'Huruf11_'])->name('Huruf11_');
    Route::get('/Huruf12_', [BHurufController::class, 'Huruf12_'])->name('Huruf12_');
    Route::get('/Huruf13_', [BHurufController::class, 'Huruf13_'])->name('Huruf13_');
    Route::get('/Huruf14_', [BHurufController::class, 'Huruf14_'])->name('Huruf14_');
    Route::get('/Huruf15_', [BHurufController::class, 'Huruf15_'])->name('Huruf15_');
    Route::get('/Huruf16_', [BHurufController::class, 'Huruf16_'])->name('Huruf16_');
    Route::get('/Huruf17_', [BHurufController::class, 'Huruf17_'])->name('Huruf17_');
    Route::get('/Huruf18_', [BHurufController::class, 'Huruf18_'])->name('Huruf18_');
    Route::get('/Huruf19_', [BHurufController::class, 'Huruf19_'])->name('Huruf19_');
    Route::get('/Huruf20_', [BHurufController::class, 'Huruf20_'])->name('Huruf20_');
    Route::get('/Huruf21_', [BHurufController::class, 'Huruf21_'])->name('Huruf21_');
    Route::get('/Huruf22_', [BHurufController::class, 'Huruf22_'])->name('Huruf22');
    Route::get('/Huruf23_', [BHurufController::class, 'Huruf23_'])->name('Huruf23_');
    Route::get('/Huruf24_', [BHurufController::class, 'Huruf24_'])->name('Huruf24_');
    Route::get('/Huruf25_', [BHurufController::class, 'Huruf25_'])->name('Huruf25_');
    Route::get('/Huruf26_', [BHurufController::class, 'Huruf26_'])->name('Huruf26_');

    Route::get('/angka', [BelajarController::class, 'angka'])->name('angka');
    Route::get('/hijaiyah', [BelajarController::class, 'hijaiyah'])->name('hijaiyah');

    Route::get('/bermain', [HomeController::class, 'bermain'])->name('bermain');

    Route::get('/menebakH', [BermainController::class, 'menebakH'])->name('menebakH');
    Route::get('/huruf1', [MainHurufController::class, 'huruf1'])->name('huruf1');
    Route::get('/huruf2', [MainHurufController::class, 'huruf2'])->name('huruf2');
    Route::get('/huruf3', [MainHurufController::class, 'huruf3'])->name('huruf3');
    Route::get('/huruf4', [MainHurufController::class, 'huruf4'])->name('huruf4');
    Route::get('/huruf5', [MainHurufController::class, 'huruf5'])->name('huruf5');
    Route::get('/huruf6', [MainHurufController::class, 'huruf6'])->name('huruf6');
    Route::get('/huruf7', [MainHurufController::class, 'huruf7'])->name('huruf7');
    Route::get('/huruf8', [MainHurufController::class, 'huruf8'])->name('huruf8');
    Route::get('/huruf9', [MainHurufController::class, 'huruf9'])->name('huruf9');
    Route::get('/huruf10', [MainHurufController::class, 'huruf10'])->name('huruf10');


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
    Route::get('/hijaiyah1', [MainHijaiyahController::class, 'hijaiyah1'])->name('hijaiyah1');
    Route::get('/hijaiyah2', [MainHijaiyahController::class, 'hijaiyah2'])->name('hijaiyah2');
    Route::get('/hijaiyah3', [MainHijaiyahController::class, 'hijaiyah3'])->name('hijaiyah3');
    Route::get('/hijaiyah4', [MainHijaiyahController::class, 'hijaiyah4'])->name('hijaiyah4');
    Route::get('/hijaiyah5', [MainHijaiyahController::class, 'hijaiyah5'])->name('hijaiyah5');
    Route::get('/hijaiyah6', [MainHijaiyahController::class, 'hijaiyah6'])->name('hijaiyah6');
    Route::get('/hijaiyah7', [MainHijaiyahController::class, 'hijaiyah7'])->name('hijaiyah7');
    Route::get('/hijaiyah8', [MainHijaiyahController::class, 'hijaiyah8'])->name('hijaiyah8');
    Route::get('/hijaiyah9', [MainHijaiyahController::class, 'hijaiyah9'])->name('hijaiyah9');
    Route::get('/hijaiyah10', [MainHijaiyahController::class, 'hijaiyah10'])->name('hijaiyah10');

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
        Route::delete('/delete/{id}', [GuruController::class, 'delete'])->name('delete');

        Route::get('/edit/{id}', [EditController::class, 'edit'])->name('edit');
        Route::put('/edit-proses/{id}', [EditController::class, 'edit_proses'])->name('edit-proses');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/store-stiker', [StikerController::class, 'storeStiker']);
        Route::get('/home', [ProfileController::class, 'show'])->name('home');
    });
});
