<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/record-cash', [PaymentController::class, 'recordCash'])->name('payments.record-cash');
    Route::get('/payments/mpesa-prompt', [PaymentController::class, 'mpesaPrompt'])->name('payments.mpesa-prompt');
    Route::get('/payments/mpesa-code', [PaymentController::class, 'mpesaCode'])->name('payments.mpesa-code');

    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

    Route::get('/options', [OptionController::class, 'index'])->name('options.index');

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createIndex'])->name('users.create');

});

require __DIR__.'/auth.php';
