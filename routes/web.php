<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);
Route::resource('/category', \App\Http\Controllers\CategoryController::class);
Route::resource('/customer', \App\Http\Controllers\CustomerController::class);
Route::resource('/satuan', \App\Http\Controllers\SatuanController::class);

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
Route::get('registers', [UserController::class, 'index']);

//PRINT
Route::get('printuserpdf', [UserController::class, 'printUser'])->name('printuser');
Route::get('printcategorypdf', [CategoryController::class, 'printCategory'])->name('PrintCategory');
Route::get('printproductspdf', [ProductController::class, 'printProducts'])->name('PrintProducts');


Route::get('printexcel', [UserController::class, 'printExcel'])->name('exceluser');
