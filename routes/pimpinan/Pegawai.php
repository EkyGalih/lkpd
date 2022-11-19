<?php

use App\Http\Controllers\Pimpinan\PegawaiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function() {
    Route::group(['prefix' => 'Pegawai'], function() {
        Route::get('/', [PegawaiController::class, 'index'])->name('pimpinan-pegawai');
        Route::post('store', [PegawaiController::class, 'store'])->name('pimpinan-pegawai.store');
        Route::get('profile/{id}', [PegawaiController::class, 'profile'])->name('pimpinan-pegawai.profile');
        Route::put('udpate/{id}', [PegawaiController::class, 'update'])->name('pimpinan-pegawai.update');
        Route::get('destroy/{id}', [PegawaiController::class, 'destroy'])->name('pimpinan-pegawai.destroy');
        Route::put('password/{id}', [PegawaiController::class, 'password'])->name('pimpinan-pegawai.password');
        Route::put('foto/{id}', [PegawaiController::class, 'foto'])->name('pimpinan-pegawai.foto');
    });
});
