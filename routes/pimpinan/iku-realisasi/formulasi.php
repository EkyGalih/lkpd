<?php

use App\Http\Controllers\Pegawai\IkuRealisasi\FormulaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function() {
    Route::group(['prefix' => 'pegawai-formulasi-iku-realisasi'], function() {
        Route::get('/{tahun?}', [FormulaController::class, 'index'])->name('iku-formulasi-pegawai');
        Route::post('store', [FormulaController::class, 'store'])->name('iku-formulasi-pegawai.store');
        Route::put('update/{id}', [FormulaController::class, 'update'])->name('iku-formulasi-pegawai.update');
        Route::get('destroy/{id}', [FormulaController::class, 'destroy'])->name('iku-formulasi-pegawai.destroy');
    });
});
