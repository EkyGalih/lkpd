<?php

use App\Http\Controllers\Admin\NeracaController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Neraca'], function () {
        Route::get('/', [NeracaController::class, 'index'])->name('neraca-admin');
        Route::post('store', [NeracaController::class, 'store'])->name('neraca-admin.store');
        Route::put('update/{id}', [NeracaController::class, 'update'])->name('neraca-admin.update');
        Route::delete('destroy/{id}', [NeracaController::class, 'destroy'])->name('neraca-admin-destroy');
        Route::post('import', [NeracaController::class, 'import'])->name('neraca-admin.import');
    });
});
