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
    Route::get('/customers/{id}/edit', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::patch('/customers/{id}', [CustomerController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{id}/delete', [CustomerController::class, 'destroy'])->name('customers.destroy');

    // PAYMENTS
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
    Route::get('/payments/record-cash', [PaymentController::class, 'recordCash'])->name('payments.record-cash');
    Route::get('/payments/mpesa-prompt', [PaymentController::class, 'mpesaPrompt'])->name('payments.mpesa-prompt');
    Route::get('/payments/mpesa-code', [PaymentController::class, 'mpesaCode'])->name('payments.mpesa-code');

    // SUBSCRIPTIONS
    Route::get('/subscriptions', [SubscriptionController::class, 'index'])->name('subscriptions.index');
    Route::get('/subscriptions/{id}/create-day-pass', [SubscriptionController::class, 'createDayPass'])->name('day-pass-subscriptions.create');
    Route::post('/subscriptions/create-day-pass/{customerId}', [SubscriptionController::class, 'storeDayPass'])->name('day-pass-subscriptions.store');
    Route::get('/subscriptions/{id}/create-weekly', [SubscriptionController::class, 'createWeekly'])->name('weekly-subscriptions.create');
    Route::post('/subscriptions/create-weekly//{customerId}', [SubscriptionController::class, 'storeWeekly'])->name('weekly-subscriptions.store');
    Route::get('/subscriptions/{id}/create-monthly', [SubscriptionController::class, 'createMonthly'])->name('monthly-subscriptions.create');
    Route::post('/subscriptions/create-monthly//{customerId}', [SubscriptionController::class, 'storeMonthly'])->name('monthly-subscriptions.store');

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

    // PACKAGES
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/packages/create', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/packages', [PackageController::class, 'store'])->name('packages.store');
    Route::get('/packages/{id}/edit', [PackageController::class, 'edit'])->name('packages.edit');
    Route::patch('/packages/{id}', [PackageController::class, 'update'])->name('packages.update');
    Route::delete('/packages/{id}/delete', [PackageController::class, 'destroy'])->name('packages.destroy');

    // USERS
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'createIndex'])->name('users.create');
});

require __DIR__ . '/auth.php';
