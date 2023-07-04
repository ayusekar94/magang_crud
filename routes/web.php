<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\AutentikasiController;

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


Route::get('/', function () {
    return view('page-starter');
});
Route::get('/kegiatan', [KegiatanController::class, 'index']);
Route::post('/kegiatan', [KegiatanController::class, 'store']);
Route::put('/kegiatan/{id}', [KegiatanController::class, 'update']);
Route::delete('/kegiatan/{id}', [KegiatanController::class, 'destroy']);

Route::resource('/auth', AutentikasiController::class);
Route::get('/logout', [AutentikasiController::class, 'logout'])->name('logout');
Route::post('/register', [AutentikasiController::class, 'register'])->name('register');
