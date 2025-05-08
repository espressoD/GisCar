<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerRegistrationController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\SellerAdminController;
use Illuminate\Support\Facades\Route;

Route::resource('/products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});
Route::get('/map', [ProductController::class, 'showMap']);
use App\Http\Controllers\MapController;
// Route::get('/map', [MapController::class, 'index']);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::get('/register-seller', [SellerRegistrationController::class, 'create'])->name('seller.register');
    Route::post('/register-seller', [SellerRegistrationController::class, 'store']);
});

Route::middleware(['auth', 'role:admin'])->get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::middleware(['auth', 'role:penjual'])->get('/seller', function () {
    return view('seller.dashboard');
})->name('seller.dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn () => view('admin.dashboard'))->name('admin.dashboard');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/products', [ProductAdminController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductAdminController::class, 'create'])->name('admin.products.create');
    Route::post('/products', [ProductAdminController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [ProductAdminController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}', [ProductAdminController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/delete', [ProductAdminController::class, 'destroySelected'])->name('admin.products.destroySelected');

    Route::get('/sellers', [SellerAdminController::class, 'index'])->name('admin.sellers.index');
    Route::get('/users', [UserAdminController::class, 'index'])->name('admin.users.index');
});