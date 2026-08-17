<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MpesaController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('pay')->group(function () {
    Route::post('/confirmation', [MpesaController::class, 'comfirmation'])->name('pay.confirmation');
    Route::post('/validation', [MpesaController::class, 'validation'])->name('pay.validation');
    Route::get('/register', [MpesaController::class, 'registerUrls'])->name('pay.registerUrls');
});

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('main');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CUSTOMERS
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

    // PAYMENTS
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/record-cash', [PaymentController::class, 'recordCash'])->name('payments.record-cash');
    Route::get('/payments/mpesa-prompt', [PaymentController::class, 'mpesaPrompt'])->name('payments.mpesa-prompt');
    Route::get('/payments/mpesa-code', [PaymentController::class, 'mpesaCode'])->name('payments.mpesa-code');

    // SUBSCRIPTIONS
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');

    // ROLES
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

    //INVOICES
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

    // OPTIONS
    Route::get('/options', [OptionController::class, 'index'])->name('options.index');
    Route::get('/options/create', [OptionController::class, 'create'])->name('options.create');
    Route::post('/options', [OptionController::class, 'store'])->name('options.store');
    Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');
    Route::get('options/{id}/edit', [OptionController::class, 'edit'])->name('options.edit');
    Route::delete('options/{id}/delete', [OptionController::class, 'destroy'])->name('options.destroy');
    Route::patch('options/{id}', [OptionController::class, 'update'])->name('options.update');

    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createIndex'])->name('users.create');
});

require __DIR__ . '/auth.php';
