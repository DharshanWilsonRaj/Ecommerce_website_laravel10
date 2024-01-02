<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');


// Authenticate Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');

    // Admin Routes
    Route::middleware('role:1')->group(function () {
        Route::prefix('admin')->namespace('Admin')->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('products', [AdminController::class, 'products'])->name('admin.products');
            Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');

            Route::prefix('products')->group(function () {
                Route::get('add', [AdminController::class, 'productAdd'])->name('admin.product.add');
                Route::post('add', [AdminController::class, 'productStore'])->name('admin.product.store');
                Route::get('edit', [AdminController::class, 'productStore'])->name('admin.product.edit');
            });
            Route::prefix('orders')->group(function () {
                
            });
        });
    });
});
