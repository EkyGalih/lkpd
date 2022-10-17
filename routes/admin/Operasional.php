<?php

use App\Http\Controllers\Admin\OperasionalController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Operasional'], function () {
        Route::get('/', [OperasionalController::class, 'index'])->name('operasional-admin');
        Route::post('store', [OperasionalController::class, 'store'])->name('operasional-admin.store');
        Route::put('update/{id}', [OperasionalController::class, 'update'])->name('operasional-admin.update');
        Route::delete('destroy/{id}', [OperasionalController::class, 'destroy'])->name('operasional-admin-destroy');
        Route::post('import', [OperasionalController::class, 'import'])->name('operasional-admin.import');
    });
});
