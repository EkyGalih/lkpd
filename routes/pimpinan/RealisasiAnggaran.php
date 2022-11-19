<?php

use App\Http\Controllers\Admin\RealisasiAnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'Pegawai-Realisasi-Anggaran'], function () {
        Route::get('/', [RealisasiAnggaranController::class, 'index'])->name('realisasi-anggaran-pegawai');
        Route::post('store', [RealisasiAnggaranController::class, 'store'])->name('realisasi-anggaran-pegawai.store');
        Route::put('update/{id}', [RealisasiAnggaranController::class, 'update'])->name('realisasi-anggaran-pegawai.update');
        Route::delete('destroy/{id}', [RealisasiAnggaranController::class, 'destroy'])->name('realisasi-anggaran-pegawai-destroy');
        Route::post('import', [RealisasiAnggaranController::class, 'import'])->name('realisasi-anggaran-pegawai.import');
    });
});
