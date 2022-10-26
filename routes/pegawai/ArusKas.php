<?php

use App\Http\Controllers\Admin\ArusKasController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'pegawai-arus-kas'], function () {
        Route::get('index/{tahun?}/{bulan?}/{minggu?}', [ArusKasController::class, 'index'])->name('arus-kas-pegawai.index');
        Route::get('create', [ArusKasController::class, 'create'])->name('arus-kas-pegawai.create');
        Route::post('store', [ArusKasController::class, 'store'])->name('arus-kas-pegawai.store');
        Route::get('edit/{id}', [ArusKasController::class, 'edit'])->name('arus-kas-pegawai.edit');
        Route::put('update/{id}', [ArusKasController::class, 'update'])->name('arus-kas-pegawai.update');
        Route::get('destory/{id}', [ArusKasController::class, 'destroy'])->name('arus-kas-pegawai.destroy');
        Route::get('destoryTotalSaldo/{id}', [ArusKasController::class, 'destroyTotalSaldo'])->name('arus-kas-pegawai.destroyTotalSaldo');
        Route::post('import', [ArusKasController::class, 'import'])->name('arus-kas-pegawai.import');
        Route::get('export/{tahun?}/{bulan?}', [ArusKasController::class, 'export'])->name('arus-kas-pegawai.export');
    });
});
