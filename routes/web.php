<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\BermainController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegguruController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LoginController::class, 'login'])->name('login'); 
Route::get('/kode', [RegguruController::class, 'kode'])->name('kode'); 
Route::get('/regguru', [RegguruController::class, 'regguru'])->name('regguru'); 
Route::get('/home', [HomeController::class, 'home'])->name('home'); 
Route::get('/profil', [HomeController::class, 'profil'])->name('profil'); 
Route::get('/belajar', [HomeController::class, 'belajar'])->name('belajar'); 
Route::get('/bermain', [HomeController::class, 'bermain'])->name('bermain'); 
Route::get('/guru', [GuruController::class, 'guru'])->name('guru');
Route::get('/menambah', [GuruController::class, 'menambah'])->name('menambah');
Route::get('/melihat', [GuruController::class, 'melihat'])->name('melihat');
Route::get('/data', [GuruController::class, 'data'])->name('data');
Route::get('/catatan', [GuruController::class, 'catatan'])->name('catatan');
Route::get('/huruf', [BelajarController::class, 'huruf'])->name('huruf');
Route::get('/angka', [BelajarController::class, 'angka'])->name('angka');
Route::get('/hijaiyah', [BelajarController::class, 'hijaiyah'])->name('hijaiyah');
Route::get('/menebakH', [BermainController::class, 'menebakH'])->name('menebakH');
Route::get('/menebakA', [BermainController::class, 'menebakA'])->name('menebakA');
Route::get('/menebakHi', [BermainController::class, 'menebakHi'])->name('menebakHi');
Route::get('/menebak', [BermainController::class, 'menebak'])->name('menebak');
Route::get('/aktivitas', [BermainController::class, 'aktivitas'])->name('aktivitas');
Route::get('/eksplor', [BermainController::class, 'eksplor'])->name('eksplor');