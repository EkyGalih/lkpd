<?php

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function() {
    Route::group(['prefix' => 'pegawai-pengguna'], function() {
        Route::get('/', [UsersController::class, 'index'])->name('pegawai-pengguna');
        Route::post('store', [UsersController::class, 'store'])->name('pegawai-pengguna.store');
        Route::get('profile/{id}', [UsersController::class, 'profile'])->name('pegawai-pengguna.profile');
        Route::put('udpate/{id}', [UsersController::class, 'update'])->name('pegawai-pengguna.update');
        Route::get('destroy/{id}', [UsersController::class, 'destroy'])->name('pegawai-pengguna.destroy');
        Route::put('password/{id}', [UsersController::class, 'password'])->name('pegawai-pengguna.password');
        Route::put('foto/{id}', [UsersController::class, 'foto'])->name('pegawai-pengguna.foto');
    });
});
