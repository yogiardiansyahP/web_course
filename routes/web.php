<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CourseController;

// Public routes
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/tentang', function () {
    return view('tentang_kami');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

// Public course list
Route::get('/kelas', [CourseController::class, 'showCourses'])->name('kelas');

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Dashboard and user-related
    Route::get('/dashboard', [ProgressController::class, 'index'])->name('dashboard');
    Route::get('/daftarcourse', [CourseController::class, 'showData'])->name('daftarcourse');
    Route::get('/checkout/{courseId}', [CheckoutController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/get-snap-token', [CheckoutController::class, 'getSnapToken']);
    Route::post('/save-transaction', [CheckoutController::class, 'saveTransaction']);
    Route::post('/midtrans-callback', [CheckoutController::class, 'midtransCallback']);
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.detail');
    Route::get('/transaksi/status/{status}', [TransactionController::class, 'showStatus'])->name('transaksi.status');
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('sertifikat');
    Route::get('/sertifikat/{id}', [CertificateController::class, 'show'])->name('sertifikat.detail');
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan/profile', [SettingController::class, 'updateProfile'])->name('pengaturan.update');
    Route::put('/pengaturan/password', [SettingController::class, 'updatePassword'])->name('pengaturan.password');

    // Admin dashboard & user management
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/datauser', [AdminController::class, 'showUser'])->name('datauser');
    Route::get('/datatransaksi', [AdminController::class, 'showTransaksi'])->name('datatransaksi');

    // Course management (admin)
    Route::get('/datacourse', [CourseController::class, 'index'])->name('datacourse'); // Admin view
    Route::get('/courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    // Midtrans webhook
    Route::post('/midtrans/webhook', [CheckoutController::class, 'handlePaymentCallback']);
});

// API routes
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'apiLogin'])->name('api.login');
    Route::post('/register', [AuthController::class, 'apiRegister'])->name('api.register');
    Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum')->name('api.logout');

    Route::apiResource('/courses', CourseController::class);
    Route::apiResource('/transactions', TransactionController::class);
    Route::apiResource('/certificates', CertificateController::class);

    Route::put('/settings/profile', [SettingController::class, 'apiUpdateProfile'])->middleware('auth:sanctum')->name('api.settings.updateProfile');
    Route::put('/settings/password', [SettingController::class, 'apiUpdatePassword'])->middleware('auth:sanctum')->name('api.settings.updatePassword');
});
