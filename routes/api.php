<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Api\CourseApiController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgressController;

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('api.logout');

Route::post('/api-datacourse', [AdminController::class, 'apiDataCourse']);

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
    Route::get('/courses', [CourseApiController::class, 'index']);
    Route::get('/courses/{id}', [CourseApiController::class, 'show']);
    Route::post('/courses', [CourseApiController::class, 'store']);
    Route::put('/courses/{id}', [CourseApiController::class, 'update']);
    Route::delete('/courses/{id}', [CourseApiController::class, 'destroy']);
    Route::middleware('auth:sanctum')->post('/progress-chart', [ProgressController::class, 'getChartProgress']);
});

Route::prefix('courses')->group(function () {
    Route::post('/list', [CourseApiController::class, 'list']);
    Route::post('/detail', [CourseApiController::class, 'detail']);
    Route::post('/', [CourseApiController::class, 'store']);
    Route::post('/update', [CourseApiController::class, 'update']);
    Route::post('/delete', [CourseApiController::class, 'destroy']);
});