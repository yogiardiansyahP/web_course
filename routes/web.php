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

Route::get('/kelas', function () {
    return view('kelas');
})->name('kelas');

Route::get('/kembali', function () {
    return view('welcome');
})->name('kembali');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProgressController::class, 'index'])->name('dashboard');
    Route::get('/checkout', function () {
        return view('checkout');
    })->name('checkout');
    Route::get('/get-snap-token', [CheckoutController::class, 'getSnapToken']);
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.detail');
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('sertifikat');
    Route::get('/sertifikat/{id}', [CertificateController::class, 'show'])->name('sertifikat.detail');
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan/profile', [SettingController::class, 'updateProfile'])->name('pengaturan.update');
    Route::put('/pengaturan/password', [SettingController::class, 'updatePassword'])->name('pengaturan.password');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/datauser', [AdminController::class, 'showUser'])->name('datauser');
    Route::get('/datatransaksi', [AdminController::class, 'showTransaksi'])->name('datatransaksi');
    Route::get('/datacourse', [AdminController::class, 'showCourse'])->name('datacourse');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
});

Route::get('/tentang', function () {
    return view('kontak');
})->name('tentang');

Route::get('/kontak', function () {
    return view('tentang_kami');
})->name('kontak');

Route::get('/datauser', [AdminController::class, 'dataUser'])->name('datauser');

Route::get('/courses', [CourseController::class, 'showCourses'])->name('kelas');
