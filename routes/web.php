<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/kelas', function () {
    return view('kelas');
})->name('kelas');

Route::get('/kembali', function () {
    return view('welcome');
})->name('kembali');