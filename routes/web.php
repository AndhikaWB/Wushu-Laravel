<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LombaController;
use App\Http\Controllers\PesertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

// Halaman utama dashboard
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
// Biodata diri, wali, dan dokumen
Route::get('/biodata', [BiodataController::class, 'index'])->middleware('auth')->name('biodata');
// Daftar anggota dan pelatih
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
// Jadwal ujian
Route::get('/ujian', [UjianController::class, 'index'])->middleware('auth')->name('ujian');
Route::post('/ujian/edit', [UjianController::class, 'createOrUpdate'])->middleware('auth')->name('ujian_edit');
Route::post('/ujian/hapus', [UjianController::class, 'delete'])->middleware('auth')->name('ujian_hapus');
// Jadwal kegiatan umum dan lomba
Route::get('/kegiatan', [KegiatanController::class, 'index'])->middleware('auth')->name('kegiatan');
Route::post('/kegiatan/edit', [KegiatanController::class, 'createOrUpdate'])->middleware('auth')->name('kegiatan_edit');
Route::post('/kegiatan/hapus', [KegiatanController::class, 'delete'])->middleware('auth')->name('kegiatan_hapus');
// Daftar lomba
Route::get('/lomba', [LombaController::class, 'index'])->middleware('auth')->name('lomba');
Route::post('/lomba/edit', [LombaController::class, 'createOrUpdate'])->middleware('auth')->name('lomba_edit');
Route::post('/lomba/hapus', [LombaController::class, 'delete'])->middleware('auth')->name('lomba_hapus');

// Daftar peserta
Route::get('/peserta/{id}', [PesertaController::class, 'index'])->middleware('auth')->name('peserta');
Route::post('/peserta/edit/{id}', [PesertaController::class, 'createOrUpdate'])->middleware('auth')->name('peserta_edit');
Route::post('/peserta/hapus/{id}', [PesertaController::class, 'delete'])->middleware('auth')->name('peserta_hapus');


Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth')->name('anggota');