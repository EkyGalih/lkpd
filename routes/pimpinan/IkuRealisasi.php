<?php

use App\Http\Controllers\Pimpinan\IkuRealisasiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function () {
    Route::group(['prefix' => 'IkuRealisasi'], function () {
        Route::get('/', [IkuRealisasiController::class, 'index'])->name('iku-realisasi-pimpinan.index');
        Route::post('store', [IkuRealisasiController::class, 'store'])->name('iku-realisasi-pimpinan.store');
        Route::put('update/{id}', [IkuRealisasiController::class, 'update'])->name('iku-realisasi-pimpinan.update');
        Route::get('destroy/{id}', [IkuRealisasiController::class, 'destroy'])->name('iku-realisasi-pimpinan.destroy');
    });
});
