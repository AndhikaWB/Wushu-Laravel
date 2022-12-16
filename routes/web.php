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
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\WaliController;

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
Route::put('/biodata/{Username}', [BiodataController::class, 'update'])->middleware('auth')->name('biodata.update');
Route::post('/biodata/{Username}', [BiodataController::class, 'upload'])->middleware('auth')->name('biodata.upload');

// Daftar anggota dan pelatih
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth')->name('anggota');
Route::post('/anggota', [AnggotaController::class, 'store'])->middleware('auth')->name('anggota.store');
Route::delete('/anggota/{Biodata}', [AnggotaController::class, 'destroy'])->middleware('auth')->name('anggota.destroy');
Route::put('/anggota/{Biodata}', [AnggotaController::class, 'update'])->middleware('auth')->name('anggota.update');

//Dokumen
Route::post('/dokumen/{Username}', [DokumenController::class, 'store'])->middleware('auth')->name('dokumen.store');
Route::delete('/dokumen/{Id}', [DokumenController::class, 'destroy'])->middleware('auth')->name('dokumen.destroy');

//Prestasi
Route::get('/prestasi/{Username}', [PrestasiController::class, 'index'])->middleware('auth')->name('prestasi');
Route::post('/prestasi/{Username}', [PrestasiController::class, 'store'])->middleware('auth')->name('prestasi.store');
Route::delete('/prestasi/{Id}/{Username}', [PrestasiController::class, 'destroy'])->middleware('auth')->name('prestasi.destroy');
Route::put('/prestasi/{Id}/{Username}', [PrestasiController::class, 'update'])->middleware('auth')->name('prestasi.update');

//Biodata Orang Tua
Route::get('/wali/{Username}', [WaliController::class, 'index'])->middleware('auth')->name('wali');
Route::post('/wali/{Username}', [WaliController::class, 'store'])->middleware('auth')->name('wali.store');
Route::delete('/wali/{Id}/{Username}', [WaliController::class, 'destroy'])->middleware('auth')->name('wali.destroy');
Route::put('/wali/{Id}/{Username}', [WaliController::class, 'update'])->middleware('auth')->name('wali.update');

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
Route::get('/peserta/{id_lomba}', [PesertaController::class, 'index'])->middleware('auth')->name('peserta');
Route::post('/peserta/edit/{id_lomba}', [PesertaController::class, 'createOrUpdate'])->middleware('auth')->name('peserta_edit');
Route::post('/peserta/hapus/{id_lomba}', [PesertaController::class, 'delete'])->middleware('auth')->name('peserta_hapus');


Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth')->name('anggota');