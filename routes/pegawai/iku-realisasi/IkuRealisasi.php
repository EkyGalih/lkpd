<?php

use App\Http\Controllers\Pegawai\IkuRealisasi\IkuRealisasiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'iku-dan-realisasi'], function () {
        Route::get('/', [IkuRealisasiController::class, 'index'])->name('iku-realisasi-pegawai.index');
        Route::post('store', [IkuRealisasiController::class, 'store'])->name('iku-realisasi-pegawai.store');
        Route::put('update/{id}', [IkuRealisasiController::class, 'update'])->name('iku-realisasi-pegawai.update');
        Route::get('destroy/{id}', [IkuRealisasiController::class, 'destroy'])->name('iku-realisasi-pegawai.destroy');
    });
});
