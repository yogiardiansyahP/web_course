<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProgressController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\SettingController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.post');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
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
    Route::post('/pengaturan/update-password', [SettingController::class, 'updatePassword'])->name('pengaturan.update-password');
});

Route::get('/tentang', function () {
    return view('kontak');
})->name('tentang');

Route::get('/kontak', function () {
    return view('tentang_kami');
})->name('kontak');