<?php

use App\Http\Controllers\Admin\BerandaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Mail\MailController;
use App\Http\Controllers\Pegawai\PegawaiController;
use App\Http\Controllers\Pimpinan\PimpinanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LoginController::class, 'index'])->name('index');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('not_found', [LoginController::class, 'not_found'])->name('not_found');
Route::group(['middleware' => 'auth'], function () {
    Route::get('not_found', [LoginController::class, 'not_found'])->name('not_found');
});

Route::post('kirim-email', [MailController::class, 'store'])->name('kirim-email');
Route::get('notif-email', [ResetPasswordController::class, 'notif'])->name('notif-email');
Route::get('password-reset/{token}', [ResetPasswordController::class, 'index'])->name('reset-password');
Route::put('ganti-password/{token}', [ResetPasswordController::class, 'update'])->name('ganti-password');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [BerandaController::class, 'index'])->name('admin');
});

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::get('/', [PegawaiController::class, 'index'])->name('pegawai');
});

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function () {
    Route::get('/', [PimpinanController::class, 'index'])->name('pimpinan');
});
