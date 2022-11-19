<?php

use App\Http\Controllers\Pegawai\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function() {
    Route::group(['prefix' => 'pegawai-jadwal'], function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('pegawai.jadwal');
        Route::post('store', [ScheduleController::class, 'store'])->name('pegawai.jadwalStore');
        Route::put('update/{id}', [ScheduleController::class, 'update'])->name('pegawai.jadwalUpdate');
        Route::post('status/{id}', [ScheduleController::class, 'status'])->name('pegawai.jadwalStatus');
    });
});
