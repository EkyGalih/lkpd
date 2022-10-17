<?php

use App\Http\Controllers\Admin\KodeRekeningController;
use App\Models\KodeRekening;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'kode-rekening'], function () {
        Route::get('/{id?}', [KodeRekeningController::class, 'index'])->name('kode-rekening-admin');
        Route::post('store', [KodeRekeningController::class, 'store'])->name('kode-rekening-admin.store');
        Route::put('update/{id}', [KodeRekeningController::class, 'update'])->name('kode-rekening-admin.update');
        Route::get('destroy/{id}', [KodeRekeningController::class, 'destroy'])->name('kode-rekening-admin.destroy');
        Route::post('import', [KodeRekeningController::class, 'import'])->name('kode-rekening-admin.import');
    });
});
