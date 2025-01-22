<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout');

// Route::get('/', function () {
//     return view('dashboard');
// });

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
