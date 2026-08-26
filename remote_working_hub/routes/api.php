<?php

use App\Http\Controllers\MpesaController;
use Illuminate\Support\Facades\Route;

Route::prefix('mpesa')->group(function () {
    Route::post('/confirmation', [MpesaController::class, 'confirmation'])->name('pay.confirmation');
    Route::post('/validation', [MpesaController::class, 'validation'])->name('pay.validation');
    Route::get('/register', [MpesaController::class, 'registerUrls'])->name('pay.registerUrls');
});
