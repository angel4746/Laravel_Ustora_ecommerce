<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    
    Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/products', [ProductController::class,'index'])->name('products');
    Route::get('/product/{x}/destroy', [ProductController::class,'destroy'])->name('product.destroy');
    Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class,'update'])->name('product.update');
});
