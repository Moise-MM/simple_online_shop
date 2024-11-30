<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\auth\UserController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\CartController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::name('home.')->controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});


Route::name('product.')->controller(ProductController::class)->group(function(){
    Route::get('/products', 'index')->name('index');
    Route::get('/products/{product}', 'show')->name('show');
});


Route::name('cart.')->controller(CartController::class)->group(function(){
    Route::get('/cart', 'index')->name('index');
    Route::get('/cart/delete', 'delete')->name('delete');
    Route::post('/cart/add/{id}', 'add')->name('add');
});


Route::name('admin.')->prefix('admin')->middleware('admin')->controller(AdminHomeController::class)->group(function(){
    Route::get('/', 'index')->name('home.index');
});


Route::name('admin.')->prefix('admin')->middleware('admin')->controller(AdminProductController::class)->group(function(){
    Route::get('/products', 'index')->name('product.index');
    Route::get('/products/create', 'create')->name('product.create');
    Route::post('/products/store', 'store')->name('product.store');
    Route::get('/products/{product}/edit', 'edit')->name('product.edit');
    Route::put('/products/{product}/update', 'update')->name('product.update');
    Route::delete('/products/{product}/delete', 'delete')->name('product.delete');

});

