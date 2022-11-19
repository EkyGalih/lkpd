<?php

use App\Http\Controllers\Pimpinan\RealisasiAnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function () {
    Route::group(['prefix' => 'RealisasiAnggaran'], function () {
        Route::get('/', [RealisasiAnggaranController::class, 'index'])->name('realisasi-anggaran-pimpinan');
        Route::post('store', [RealisasiAnggaranController::class, 'store'])->name('realisasi-anggaran-pimpinan.store');
        Route::put('update/{id}', [RealisasiAnggaranController::class, 'update'])->name('realisasi-anggaran-pimpinan.update');
        Route::delete('destroy/{id}', [RealisasiAnggaranController::class, 'destroy'])->name('realisasi-anggaran-pimpinan-destroy');
        Route::post('import', [RealisasiAnggaranController::class, 'import'])->name('realisasi-anggaran-pimpinan.import');
    });
});
