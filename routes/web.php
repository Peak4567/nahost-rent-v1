<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/game-topup', function () {
    return view('game-topup');
})->name('game-topup');

Route::get('/topup', function () {
    return view('topup');
})->name('topup');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/api/topup/truemoney', [PaymentController::class, 'redeemVoucher']);

Route::middleware(['auth', 'admin'])->prefix('backend')->group(function () {
    Route::get('/', fn() => view('backend.home'))->name('backend.home');

    Route::get('/stock', [StockController::class, 'index'])->name('backend.stock');
    Route::get('/stock/create', [StockController::class, 'create'])->name('backend.stock.create');
    Route::post('/stock', [StockController::class, 'store'])->name('backend.stock.store');
    Route::get('/stock/{stock}/edit', [StockController::class, 'edit'])->name('backend.stock.edit');
    Route::put('/stock/{stock}', [StockController::class, 'update'])->name('backend.stock.update');
    Route::delete('/stock/{stock}', [StockController::class, 'destroy'])->name('backend.stock.destroy');

    Route::get('/category', [CategoryController::class, 'index'])->name('backend.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('backend.category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('backend.category.store');

    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('backend.category.edit');
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('backend.category.update');
    Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('backend.category.destroy');

    Route::get('/product', [ProductController::class, 'index'])->name('backend.product');
    Route::get('/product/create', [ProductController::class, 'create'])->name('backend.product.create');
    Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('backend.product.destroy');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit'])->name('backend.product.edit');
});
