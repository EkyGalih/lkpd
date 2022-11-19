<?php

use App\Http\Controllers\Pimpinan\ScheduleController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'pimpinan']], function() {
    Route::group(['prefix' => 'Jadwal'], function() {
        Route::get('/', [ScheduleController::class, 'index'])->name('pimpinan.jadwal');
        Route::post('store', [ScheduleController::class, 'store'])->name('pimpinan.jadwalStore');
        Route::put('update/{id}', [ScheduleController::class, 'update'])->name('pimpinan.jadwalUpdate');
        Route::post('status/{id}', [ScheduleController::class, 'status'])->name('pimpinan.jadwalStatus');
    });
});
