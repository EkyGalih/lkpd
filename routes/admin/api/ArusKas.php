<?php

use App\Http\Controllers\Admin\Api\ArusKasController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'arus-kas'], function () {
    Route::get('subTotal1/{ref1}/{ref2}/{tahun}', [ArusKasController::class, 'subTotal1']);
    Route::get('subTotal2/{ref1}/{ref2}/{tahun}', [ArusKasController::class, 'subTotal2']);
    Route::get('Total1/{tahun}', [ArusKasController::class, 'Total1']);
    Route::get('Total2/{tahun}', [ArusKasController::class, 'Total2']);
});
