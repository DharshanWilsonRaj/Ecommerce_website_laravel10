<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'productsList'])->name('home');

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');

Route::get('/register', function () {
    return view('Auth.register');
})->name('register');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// everyone access
Route::get('/cart', [CustomerController::class, 'cartPage'])->name('cart');
Route::get('/addCart/{id}', [CustomerController::class, 'addCart'])->name('addCart');
Route::get('/update-cart/{id}/{action}', [CustomerController::class, 'updateCart'])->name('updateCart');


// Authenticate Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Admin Routes
    Route::middleware('role:1')->group(function () {
        Route::prefix('admin')->namespace('Admin')->group(function () {
            Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('products', [AdminController::class, 'products'])->name('admin.products');
            Route::get('orders', [AdminController::class, 'orders'])->name('admin.orders');
            Route::get('profile', [AuthController::class, 'adminprofile'])->name('admin.profile');
            Route::post('profile', [AuthController::class, 'adminProfileUpdate'])->name('admin.profile.update');

            Route::prefix('products')->group(function () {
                Route::get('add', [AdminController::class, 'productAdd'])->name('admin.product.add');
                Route::post('add', [AdminController::class, 'productStore'])->name('admin.product.store');
                Route::get('edit/id={id}', [AdminController::class, 'productEdit'])->name('product.edit');
                Route::post('edit/id={id}', [AdminController::class, 'productUpdate'])->name('product.update');
                Route::get('products/deleteid={id}', [AdminController::class, 'productDelete'])->name('product.delete');
            });
            Route::prefix('orders')->group(function () {
            });
        });
    });

    // customer Routes
    Route::middleware('role:2')->group(function () {
        Route::get('/profile', [CustomerController::class, 'customerProfile'])->name('profile');
        Route::post('/profile', [CustomerController::class, 'updateProfile'])->name('profile');
    });
    
});
