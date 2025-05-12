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

// Web Routes
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

Route::get('/home', function () {
    return view('welcome');
})->name('kembali');

Route::middleware('auth')->group(function () {
    // User-related routes
    Route::get('/dashboard', [ProgressController::class, 'index'])->name('dashboard');
    Route::get('/kelas', [CourseController::class, 'showKelas'])->name('kelas');
    Route::get('/materi/{course}', [CourseController::class, 'showMaterials'])->name('materi');
    Route::get('/materi/slug/{slug}', [CourseController::class, 'showMateriBySlug'])->name('materi.show');
    Route::get('/materi/{slug}', [CourseController::class, 'showMateriBySlug'])->name('materi.slug');
    Route::get('/daftarcourse', [CourseController::class, 'showCourses'])->name('daftarcourse');
    Route::get('/daftar-course', [CourseController::class, 'showData'])->name('daftarcourse');
    Route::get('/checkout/{courseId}', [CheckoutController::class, 'showCheckout'])->name('checkout');
    Route::get('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/{courseId}', [CheckoutController::class, 'checkoutPage'])->name('checkout');
    Route::post('/get-snap-token', [CheckoutController::class, 'getSnapToken']);
    Route::post('/save-transaction', [CheckoutController::class, 'saveTransaction']);
    Route::post('/midtrans-callback', [CheckoutController::class, 'midtransCallback']);
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.detail');
    Route::get('/transaksi/{status}', [TransactionController::class, 'showStatus'])->name('transaksi.status');
    Route::get('/sertifikat', [CertificateController::class, 'index'])->name('sertifikat');
    Route::get('/sertifikat/{id}', [CertificateController::class, 'show'])->name('sertifikat.detail');
    Route::get('/pengaturan', [SettingController::class, 'index'])->name('pengaturan');
    Route::put('/pengaturan/profile', [SettingController::class, 'updateProfile'])->name('pengaturan.update');
    Route::put('/pengaturan/password', [SettingController::class, 'updatePassword'])->name('pengaturan.password');
    
    // Admin-related routes
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/datauser', [AdminController::class, 'showUser'])->name('datauser');
    Route::get('/datatransaksi', [AdminController::class, 'showTransaksi'])->name('datatransaksi');
    Route::get('/datacourse', [AdminController::class, 'showCourse'])->name('datacourse');
    Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('/courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('/courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('/courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');
    
    // Transaction and payment-related routes
    Route::get('/transaksi', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}', [TransactionController::class, 'show'])->name('transaksi.detail');
    Route::post('/midtrans/webhook', [CheckoutController::class, 'handlePaymentCallback']);
});

Route::get('/tentang', function () {
    return view('tentang_kami');
})->name('tentang');

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak');

Route::get('/datauser', [AdminController::class, 'dataUser'])->name('datauser');
Route::get('/daftarcourse', [CourseController::class, 'showCourses'])->name('kelas');

// API Routes
Route::prefix('api')->group(function () {
    Route::post('/login', [AuthController::class, 'apiLogin'])->name('api.login');
    Route::post('/register', [AuthController::class, 'apiRegister'])->name('api.register');
    Route::post('/logout', [AuthController::class, 'apiLogout'])->middleware('auth:sanctum')->name('api.logout');
    
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/checkout/{courseId}', [CheckoutController::class, 'showCheckout'])->name('api.checkout.showCheckout');
        Route::post('/checkout/token', [CheckoutController::class, 'getSnapToken'])->name('api.checkout.getSnapToken');
        Route::post('/checkout/save', [CheckoutController::class, 'saveTransaction'])->name('api.checkout.saveTransaction');
        Route::post('/checkout/callback', [CheckoutController::class, 'midtransCallback'])->name('api.checkout.midtransCallback');
        Route::post('/checkout/payment-callback', [CheckoutController::class, 'handlePaymentCallback'])->name('api.checkout.handlePaymentCallback');
        
        Route::apiResource('/courses', CourseController::class);
        Route::apiResource('/transactions', TransactionController::class);
        Route::apiResource('/certificates', CertificateController::class);
        
        Route::put('/settings/profile', [SettingController::class, 'apiUpdateProfile'])->name('api.settings.updateProfile');
        Route::put('/settings/password', [SettingController::class, 'apiUpdatePassword'])->name('api.settings.updatePassword');
        
        // Add the new POST endpoint for creating transactions
        Route::post('/transactions', [TransactionController::class, 'apiStore'])->name('api.transactions.store');
        Route::get('/transactions/{transaction}', [TransactionController::class, 'show']);
        Route::put('/transactions/{transaction}', [TransactionController::class, 'update']);
        Route::delete('/transactions/{transaction}', [TransactionController::class, 'destroy']);
        Route::post('/api-datacourse', [AdminController::class, 'apiDataCourse']);
        Route::middleware('auth:sanctum')->post('/progress-chart', [ProgressController::class, 'getChartProgress']);
    });
});