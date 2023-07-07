<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AutentikasiController;
use App\Http\Controllers\KaryawanController;

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
Route::redirect('/', '/auth');

// Autentikasi
Route::resource('/auth', AutentikasiController::class);
Route::post('/register', [AutentikasiController::class, 'register'])->name('register');

// Kegiatan
Route::group(['middleware' => 'login'], function () {
    Route::resource('/kegiatan', KegiatanController::class);
    Route::get('/logout', [AutentikasiController::class, 'logout'])->name('logout');
    Route::get('/logout-page', [AutentikasiController::class, 'logoutPage'])->name('logout-page');
    // Route::post('/profile', [AutentikasiController::class, 'update'])->name('edit-profile');
    Route::get('/profile', [AutentikasiController::class, 'uindex']);
    Route::post('/karyawan', [KaryawanController::class, 'update']);
});