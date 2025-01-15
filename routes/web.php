<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('dashboard');
});

Route::resource('/products', \App\Http\Controllers\ProductController::class);

Route::get('dashboard', [UserController::class, 'dashboard']);
Route::get('users', [UserController::class, 'users']);
