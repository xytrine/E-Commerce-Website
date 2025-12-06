<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('products', ProductsController::class);

Route::get('/products-user', [ProductsController::class, 'userIndex'])->name('products.user.index');

Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');

Route::get('/cart', [CartController::class, 'view'])->name('cart.view');

Route::post('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

Route::delete('/cart/{productId}', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/my-orders', [OrderController::class, 'index'])->name('orders.index');

Route::get('/order-confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation');





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';