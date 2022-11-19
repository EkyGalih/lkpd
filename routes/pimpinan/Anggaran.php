<?php

use App\Http\Controllers\Pimpinan\AnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth','pimpinan']], function() {
    Route::group(['prefix' => 'apbdp'], function() {
        Route::get('/{tahun?}', [AnggaranController::class, 'index'])->name('apbdp');
        Route::post('store', [AnggaranController::class, 'store'])->name('apbdp.store');
        Route::get('edit/{id}', [AnggaranController::class, 'edit'])->name('apbdp.edit');
        Route::put('update/{id}', [AnggaranController::class, 'update'])->name('apbdp.update');
        Route::get('destroy/{id}', [AnggaranController::class, 'destroy'])->name('apbdp.destroy');
        Route::post('import', [AnggaranController::class, 'import'])->name('apbdp.import');
    });
});
