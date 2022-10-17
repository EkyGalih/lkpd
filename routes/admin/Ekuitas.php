<?php

use App\Http\Controllers\Admin\EkuitasController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Ekuitas'], function () {
        Route::get('/', [EkuitasController::class, 'index'])->name('ekuitas-admin');
        Route::post('store', [EkuitasController::class, 'store'])->name('ekuitas-admin.store');
        Route::put('update/{id}', [EkuitasController::class, 'update'])->name('ekuitas-admin.update');
        Route::delete('destroy/{id}', [EkuitasController::class, 'destroy'])->name('ekuitas-admin-destroy');
        Route::post('import', [EkuitasController::class, 'import'])->name('ekuitas-admin.import');
    });
});
