<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;

Route::post('/register', [AuthController::class, 'register'])->name('api.register');
Route::post('/login', [AuthController::class, 'login'])->name('api.login');
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout'])->name('api.logout');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/transactions', TransactionController::class);
    Route::apiResource('/certificates', CertificateController::class);
    Route::put('/settings/profile', [SettingController::class, 'apiUpdateProfile'])->name('api.settings.updateProfile');
    Route::put('/settings/password', [SettingController::class, 'apiUpdatePassword'])->name('api.settings.updatePassword');
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
    Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
    Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);
    Route::get('/transactions', [TransactionController::class, 'apiIndex']);
});
