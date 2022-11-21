<?php

use App\Http\Controllers\Pimpinan\UsersController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function() {
    Route::group(['prefix' => 'Profile-Pimpinan'], function() {
        Route::get('profile/{id}', [UsersController::class, 'profile'])->name('pimpinan-pengguna.profile');
        Route::put('udpate/{id}', [UsersController::class, 'update'])->name('pimpinan-pengguna.update');
        Route::get('destroy/{id}', [UsersController::class, 'destroy'])->name('pimpinan-pengguna.destroy');
        Route::put('password/{id}', [UsersController::class, 'password'])->name('pimpinan-pengguna.password');
        Route::put('foto/{id}', [UsersController::class, 'foto'])->name('pimpinan-pengguna.foto');
    });
});
