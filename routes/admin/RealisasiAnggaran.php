<?php

use App\Http\Controllers\Admin\RealisasiAnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Realisasi-Anggaran'], function () {
        Route::get('/', [RealisasiAnggaranController::class, 'index'])->name('realisasi-anggaran-admin');
        Route::put('update/{id}', [RealisasiAnggaranController::class, 'update'])->name('realisasi-anggaran-admin.update');
    });
});
