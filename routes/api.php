<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CheckoutController;

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('api.logout');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/checkout/{courseId}', [CheckoutController::class, 'showCheckout'])->name('api.checkout.showCheckout');
    Route::post('/checkout/token', [CheckoutController::class, 'getSnapToken'])->name('api.checkout.getSnapToken');
    Route::post('/checkout/save', [CheckoutController::class, 'saveTransaction'])->name('api.checkout.saveTransaction');
    Route::post('/checkout/callback', [CheckoutController::class, 'midtransCallback'])->name('api.checkout.midtransCallback');
    Route::get('/transactions', [CheckoutController::class, 'showTransactions'])->name('api.transactions.show');
    Route::post('/checkout/payment-callback', [CheckoutController::class, 'handlePaymentCallback'])->name('api.checkout.handlePaymentCallback');
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/transactions', TransactionController::class);
    Route::apiResource('/certificates', CertificateController::class);
    Route::put('/settings/profile', [SettingController::class, 'apiUpdateProfile'])->name('api.settings.updateProfile');
    Route::put('/settings/password', [SettingController::class, 'apiUpdatePassword'])->name('api.settings.updatePassword');
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);
});