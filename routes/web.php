<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Backend\{StockController, CategoryController, ProductController, UserController, SettingController, GameController as BackendGameController, HomeController as BackendHomeController, PaymentController as BackendPayment};
use App\Http\Controllers\Frontend\{HomeController, CartController, ProfileController, ProductController as FrontendProductController, GameController as FrontendGameController, TopupController};

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [FrontendProductController::class, 'index'])->name('frontend.products');
Route::get('/product/{id}', [FrontendProductController::class, 'show'])->name('product.detail');

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    
    Route::get('/cart', [CartController::class, 'index'])->name('frontend.cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('frontend.cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('frontend.cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('frontend.cart.remove');
    Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('frontend.cart.checkout');
    Route::get('/history', [CartController::class, 'history'])->name('frontend.history');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('frontend.profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('frontend.profile.update');
    
    Route::get('/game-topup', [FrontendGameController::class, 'index'])->name('frontend.game.index');
    Route::get('/topup', [TopupController::class, 'index'])->name('frontend.topup');
    Route::post('/topup/truemoney', [TopupController::class, 'truemoney'])->name('frontend.topup.truemoney');
    Route::post('/topup/promptpay', [TopupController::class, 'promptpay'])->name('frontend.topup.promptpay');
    Route::get('/topup-history', [TopupController::class, 'history'])->name('frontend.topup.history');
});

Route::middleware(['auth', 'admin'])->prefix('backend')->group(function () {
    Route::get('/', [BackendHomeController::class, 'index'])->name('backend.home');

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

    Route::get('/product', [ProductController::class, 'index'])->name('backend.product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('backend.product.create');
    Route::post('/product', [ProductController::class, 'store'])->name('backend.product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('backend.product.edit');
    Route::put('/product/{id}', [ProductController::class, 'update'])->name('backend.product.update');
    Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('backend.product.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('backend.users');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('backend.users.destroy');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('backend.users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('backend.users.update');

    Route::get('/payment-settings', [BackendPayment::class, 'edit'])->name('backend.payment.edit');
    Route::post('/payment-settings/update', [BackendPayment::class, 'update'])->name('backend.payment.update');
    Route::get('/settings', [SettingController::class, 'edit'])->name('backend.settings.edit');
    Route::post('/settings/update', [SettingController::class, 'update'])->name('backend.settings.update');

    Route::get('/games', [BackendGameController::class, 'index'])->name('backend.game.index');
    Route::post('/games', [BackendGameController::class, 'store'])->name('backend.game.store');
    Route::delete('/games/{id}', [BackendGameController::class, 'destroy'])->name('backend.game.destroy');
    Route::get('/games/{id}/edit', [BackendGameController::class, 'edit'])->name('backend.game.edit');
    Route::put('/games/{id}', [BackendGameController::class, 'update'])->name('backend.game.update');
});