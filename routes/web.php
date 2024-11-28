<?php

use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::name('home.')->controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});


Route::name('product.')->controller(ProductController::class)->group(function(){
    Route::get('/products', 'index')->name('index');
    Route::get('/products/{product}', 'show')->name('show');
});



Route::name('admin.')->prefix('admin')->controller(AdminHomeController::class)->group(function(){
    Route::get('/', 'index')->name('home.index');
});


Route::name('admin.')->prefix('admin')->controller(AdminProductController::class)->group(function(){
    Route::get('/products', 'index')->name('product.index');
    Route::get('/products/create', 'create')->name('product.create');
});

