<?php

use App\Http\Controllers\Admin\IkuRealisasi\ProgramAnggaranIkuController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'pegawai', 'middleware' => ['auth', 'pegawai']], function() {
    Route::group(['prefix' => 'pegawai-program-anggaran-iku'], function(){
        Route::post('store', [ProgramAnggaranIkuController::class, 'store'])->name('program-anggaran-iku-pegawai.store');
        Route::put('update/{id}', [ProgramAnggaranIkuController::class, 'update'])->name('program-anggaran-iku-pegawai.update');
        Route::get('destroy/{id}', [ProgramAnggaranIkuController::class, 'destroy'])->name('program-anggaran-iku-pegawai.destroy');
    });
});
