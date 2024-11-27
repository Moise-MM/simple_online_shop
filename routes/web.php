<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;



Route::name('home.')->controller(HomeController::class)->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/about', 'about')->name('about');
});


Route::name('product.')->controller(ProductController::class)->group(function(){
    Route::get('/products', 'index')->name('index');
    Route::get('/products/{id}', 'show')->name('show');
});
