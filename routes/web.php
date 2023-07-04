<?php

use Illuminate\Support\Facades\Route;
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

Route::resource('/auth', AutentikasiController::class);
Route::get('/kegiatan', 'UserController@index')->name('user');
Route::get('/logout', [AutentikasiController::class, 'logout'])->name('logout');
Route::post('/register', [AutentikasiController::class, 'register'])->name('register');