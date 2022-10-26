<?php

use App\Http\Controllers\Admin\SubKodeRekeningController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'pegawai-sub-kode-rekening'], function () {
        Route::get('/{id}', [SubKodeRekeningController::class, 'index'])->name('sub-kode-pegawai');
        Route::post('store', [SubKodeRekeningController::class, 'store'])->name('sub-kode-pegawai.store');
        Route::get('edit/{id}', [SubKodeRekeningController::class, 'edit'])->name('sub-kode-pegawai.edit');
        Route::put('update/{id}', [SubKodeRekeningController::class, 'update'])->name('sub-kode-pegawai.update');
        Route::get('destroy/{id}', [SubKodeRekeningController::class, 'destroy'])->name('sub-kode-pegawai.destroy');
    });
});
