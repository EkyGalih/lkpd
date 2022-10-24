<?php

use App\Http\Controllers\Admin\ArusKasController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'arus-kas'], function () {
        Route::get('index/{tahun?}/{bulan?}/{minggu?}', [ArusKasController::class, 'index'])->name('arus-kas-admin.index');
        Route::get('create', [ArusKasController::class, 'create'])->name('arus-kas-admin.create');
        Route::post('store', [ArusKasController::class, 'store'])->name('arus-kas-admin.store');
        Route::get('edit/{id}', [ArusKasController::class, 'edit'])->name('arus-kas-admin.edit');
        Route::put('update/{id}', [ArusKasController::class, 'update'])->name('arus-kas-admin.update');
        Route::get('destory/{id}', [ArusKasController::class, 'destroy'])->name('arus-kas-admin.destroy');
        Route::get('destoryTotalSaldo/{id}', [ArusKasController::class, 'destroyTotalSaldo'])->name('arus-kas-admin.destroyTotalSaldo');
        Route::post('import', [ArusKasController::class, 'import'])->name('arus-kas-admin.import');
        Route::get('export/{tahun?}/{bulan?}', [ArusKasController::class, 'export'])->name('arus-kas-admin.export');
    });
});
