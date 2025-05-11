<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProgressController;

// ===========================
// Public Routes
// ===========================

Route::get('/', fn () => view('welcome'))->name('home');

// Auth Pages
Route::get('/login', fn () => view('login'))->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/register', fn () => view('register'))->name('register.form');

Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Static pages
Route::get('/tentang', fn () => view('tentang_kami'))->name('tentang');
Route::get('/kontak', fn () => view('kontak'))->name('kontak');

// Public course list
Route::get('/kelas', [CourseController::class, 'showCourses'])->name('kelas');

// ===========================
// Authenticated Routes
// ===========================

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [ProgressController::class, 'index'])->name('dashboard');

    // Courses
    Route::get('/daftarcourse', [CourseController::class, 'showData'])->name('daftarcourse');
    Route::get('/materi-user', [CourseController::class, 'showUserCourse'])->name('materi.user');

    // Checkout
    Route::get('/checkout/{courseId}', [CheckoutController::class, 'showCheckout'])->name('checkout');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::post('/get-snap-token', [CheckoutController::class, 'getSnapToken']);
    Route::post('/save-transaction', [CheckoutController::class, 'saveTransaction']);
    Route::post('/midtrans-callback', [CheckoutController::class, 'midtransCallback']);

    // Transactions
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.detail');
    Route::get('/transaksi/status/{status}', [TransactionController::class, 'showStatus'])->name('transaksi.status');

    // Certificates
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('sertifikat');
    Route::get('/sertifikat/{id}', [CertificateController::class, 'show'])->name('sertifikat.detail');

    // Settings
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan/profile', [SettingController::class, 'updateProfile'])->name('pengaturan.update');
    Route::put('/pengaturan/password', [SettingController::class, 'updatePassword'])->name('pengaturan.password');

    // Admin Routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/datauser', [AdminController::class, 'showUser'])->name('datauser');
    Route::get('/datatransaksi', [AdminController::class, 'showTransaksi'])->name('datatransaksi');

    // Course Management (Admin)
    Route::get('/datacourse', [CourseController::class, 'index'])->name('admin.courses.index');
    Route::get('/courses/create', [CourseController::class, 'create'])->name('admin.courses.create');
    Route::post('/courses', [CourseController::class, 'store'])->name('admin.courses.store');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('admin.courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('admin.courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('admin.courses.destroy');
});

