<?php

use App\Http\Controllers\Admin\SaldoAnggaranController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::group(['prefix' => 'Saldo-Anggaran-Lebih'], function () {
        Route::get('/', [SaldoAnggaranController::class, 'index'])->name('saldo-anggaran-admin');
        Route::post('store', [SaldoAnggaranController::class, 'store'])->name('saldo-anggaran-admin.store');
        Route::put('update/{id}', [SaldoAnggaranController::class, 'update'])->name('saldo-anggaran-admin.update');
        Route::delete('destroy/{id}', [SaldoAnggaranController::class, 'destroy'])->name('saldo-anggaran-admin-destroy');
        Route::post('import', [SaldoAnggaranController::class, 'import'])->name('saldo-anggaran-admin.import');
    });
});
