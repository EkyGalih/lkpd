<?php

use App\Http\Controllers\Pegawai\KodeRekeningController;
use App\Models\KodeRekening;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'pegawai-kode-rekening'], function () {
        Route::get('/{id?}', [KodeRekeningController::class, 'index'])->name('kode-rekening-pegawai');
        Route::post('store', [KodeRekeningController::class, 'store'])->name('kode-rekening-pegawai.store');
        Route::put('update/{id}', [KodeRekeningController::class, 'update'])->name('kode-rekening-pegawai.update');
        Route::get('destroy/{id}', [KodeRekeningController::class, 'destroy'])->name('kode-rekening-pegawai.destroy');
        Route::post('import', [KodeRekeningController::class, 'import'])->name('kode-rekening-pegawai.import');
    });
});
