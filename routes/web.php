<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProgressController;

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

<<<<<<< HEAD
Route::get('/dashboard', function () {
    return view('dashboard');
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



=======
Route::get('/dashboard', [ProgressController::class, 'dashboard'])->middleware('auth')->name('dashboard');
>>>>>>> 7072e3ef1abce65959df349d1206467f0fcc9716
