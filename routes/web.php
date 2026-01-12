<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController; // Tambahkan ini

// ================= HOME =================
// Hanya untuk guest (belum login)
Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('home');

// ================= AUTH =================

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware('guest')
    ->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->middleware('guest')
    ->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout (POST)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= USER =================
Route::middleware('auth')->group(function () {

    Route::get('/consume', function () {
        return view('User.Consume');
    })->name('consume');

    Route::get('/Cart', function () {
        return view('User.Cart');
    })->name('cart');

    Route::get('/checkout', function () {
        return view('User.Checkout');
    })->name('checkout');

    Route::get('/setting', function () {
        return view('User.Setting');
    })->name('setting');
});

// ================= ADMIN =================
Route::middleware(['auth'])->prefix('admin')->group(function () {

    // Dashboard utama
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.dashboard');
        
    // Tampilkan form tambah produk
    Route::get('/produk/tambah', function () {
        return view('admin.Produk'); // Blade untuk form tambah produk
    })->name('admin.produk.form');

    // Simpan produk baru
    Route::post('/produk', [AdminController::class, 'storeProduk'])
        ->name('admin.produk.store');    
        
    // Data Produk (bisa untuk view atau AJAX)
    Route::get('/produk', [AdminController::class, 'getProduk'])
        ->name('admin.produk');
        
    // ========== PERBAIKAN UNTUK EDIT ==========
    
    // Route untuk AJAX get data edit (JSON response)
    Route::get('/produk/{id}/edit-data', [AdminController::class, 'getEditData'])
        ->name('admin.produk.edit.data');
        
    // Route untuk AJAX update produk (JSON response)
    Route::post('/produk/{id}/update-ajax', [AdminController::class, 'updateProdukAjax'])
        ->name('admin.produk.update.ajax');
    
    // Route untuk halaman edit produk (jika ingin halaman terpisah)
    Route::get('/produk/{id}/edit', [AdminController::class, 'editProdukPage'])
        ->name('admin.produk.edit.page');
        
    // Route untuk update produk via form submit (redirect)
    Route::put('/produk/{id}', [AdminController::class, 'updateProduk'])
        ->name('admin.produk.update');
    // ========== AKHIR PERBAIKAN EDIT ==========

    // Hapus produk
    Route::delete('/produk/{id}', [AdminController::class, 'deleteProduk'])
        ->name('admin.produk.delete');

    // Data User
    Route::get('/users', [AdminController::class, 'getUsers'])
        ->name('admin.users');

    // Data Transaksi
    Route::get('/transaksi', [AdminController::class, 'getTransaksi'])
        ->name('admin.transaksi');
});