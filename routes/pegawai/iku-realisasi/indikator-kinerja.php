<?php

use App\Http\Controllers\Pegawai\IkuRealisasi\IndikatorKinerjaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function(){
    Route::group(['prefix' => 'pegawai-indikator-kinerja'], function() {
        Route::get('/{tahun?}', [IndikatorKinerjaController::class, 'index'])->name('iku-indikator-pegawai');
        Route::post('store', [IndikatorKinerjaController::class, 'store'])->name('iku-indikator-pegawai.store');
        Route::put('update/{id}', [IndikatorKinerjaController::class, 'update'])->name('iku-indikator-pegawai.update');
        Route::get('destroy/{id}', [IndikatorKinerjaController::class, 'destroy'])->name('iku-indikator-pegawai.destroy');
    });
});
