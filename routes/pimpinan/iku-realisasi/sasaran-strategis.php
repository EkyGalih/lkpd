<?php

use App\Http\Controllers\Pegawai\IkuRealisasi\SasaranStrategisController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function() {
    Route::group(['prefix' => 'pegawai-sasaran-strategis'], function() {
        Route::get('/{tahun?}', [SasaranStrategisController::class, 'index'])->name('iku-sasaran-pegawai');
        Route::post('store', [SasaranStrategisController::class, 'store'])->name('iku-sasaran-pegawai.store');
        Route::put('update/{id}', [SasaranStrategisController::class, 'update'])->name('iku-sasaran-pegawai.update');
        Route::get('destroy/{id}', [SasaranStrategisController::class, 'destroy'])->name('iku-sasaran-pegawai.destroy');
    });
});
