<?php

use App\Http\Controllers\Pegawai\IkuRealisasi\RincianIkuController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function () {
    Route::group(['prefix' => 'RincianIku'], function () {
        Route::get('/', [RincianIkuController::class, 'index'])->name('rincian-iku-pegawai');
        Route::get('create', [RincianIkuController::class, 'create'])->name('rincian-iku-pegawai.create');
        Route::post('store', [RincianIkuController::class, 'store'])->name('rincian-iku-pegawai.store');
        Route::get('edit/{id}', [RincianIkuController::class, 'edit'])->name('rincian-iku-pegawai.edit');
        Route::put('update/{id}', [RincianIkuController::class, 'update'])->name('rincian-iku-pegawai.update');
        Route::get('show/{id}', [RincianIkuController::class, 'show'])->name('rincian-iku-pegawai.show');
        Route::get('destroy/{id}', [RincianIkuController::class, 'destroy'])->name('rincian-iku-pegawai.destroy');
        Route::post('import', [RincianIkuController::class, 'import'])->name('rincian-iku-pegawai.import');
        Route::post('upload', [RincianIkuController::class, 'upload'])->name('rincian-iku-pegawai.upload');
    });
});
