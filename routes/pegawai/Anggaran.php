<?php

use App\Http\Controllers\Pegawai\AnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth','pegawai']], function() {
    Route::group(['prefix' => 'apbd'], function() {
        Route::get('/{tahun?}', [AnggaranController::class, 'index'])->name('pegawai-apbd');
        Route::post('store', [AnggaranController::class, 'store'])->name('pegawai-apbd.store');
        Route::put('update/{id}', [AnggaranController::class, 'update'])->name('pegawai-apbd.update');
        Route::get('destroy/{id}', [AnggaranController::class, 'destroy'])->name('pegawai-apbd.destroy');
        Route::post('import', [AnggaranController::class, 'import'])->name('pegawai-apbd.import');
    });
});
