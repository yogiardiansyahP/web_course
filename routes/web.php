<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('welcome');
});

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

Route::get('/dashboard', function () {
    $progressData = [
        'completed' => 0,
        'in_progress' => 0,
        'not_started' => 0,
    ];
    
    if (Auth::check()) {
        $progressData = [
            'completed' => 2,
            'in_progress' => 1,
            'not_started' => 3,
        ];
    }
    return view('dashboard', compact('progressData'));
})->name('dashboard');

Route::get('/tentang', function () {
    return view('kontak');
})->name('tentang');

Route::get('/kontak', function () {
    return view('tentang_kami');
})->name('kontak');
Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/checkout', function () {
    return view('checkout');
})->name('checkout');

Route::middleware('auth')->group(function () {
    Route::view('/checkout', 'checkout')->name('checkout');
    Route::get('/get-snap-token', [CheckoutController::class, 'getSnapToken']);
});