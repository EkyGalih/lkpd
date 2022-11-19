<?php

use App\Http\Controllers\Admin\DivisiController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function(){
    Route::group(['prefix' => 'pegawai-bidang'], function(){
        Route::get('/', [DivisiController::class, 'index'])->name('pegawai-divisi');
        Route::post('store', [DivisiController::class, 'store'])->name('pegawai-divisi.store');
        Route::put('update/{id}', [DivisiController::class, 'update'])->name('pegawai-divisi.update');
        Route::get('destroy/{id}', [DivisiController::class, 'destroy'])->name('pegawai-divisi.destroy');
    });
});
