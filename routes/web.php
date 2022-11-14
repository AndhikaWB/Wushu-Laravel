<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\AnggotaController;

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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->middleware('auth');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/biodata', [BiodataController::class, 'index'])->middleware('auth')->name('biodata');
Route::get('/anggota', [AnggotaController::class, 'index'])->middleware('auth')->name('anggota');
Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth')->name('logout');
