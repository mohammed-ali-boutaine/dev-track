<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});



// authntification
Route::view('/register','auth.register')->name('registerPage');
Route::view('/login','auth.login')->name('loginPage');
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// routes

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard")->middleware('auth');