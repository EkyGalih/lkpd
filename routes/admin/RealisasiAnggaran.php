<?php

use App\Http\Controllers\Admin\RealisasiAnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Realisasi-Anggaran'], function () {
        Route::get('/', [RealisasiAnggaranController::class, 'index'])->name('realisasi-anggaran-admin');
        Route::post('store', [RealisasiAnggaranController::class, 'store'])->name('realisasi-anggaran-admin.store');
        Route::put('update/{id}', [RealisasiAnggaranController::class, 'update'])->name('realisasi-anggaran-admin.update');
        Route::delete('destroy/{id}', [RealisasiAnggaranController::class, 'destroy'])->name('realisasi-anggaran-admin-destroy');
        Route::post('import', [RealisasiAnggaranController::class, 'import'])->name('realisasi-anggaran-admin.import');
    });
});
