<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
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

// tickets
Route::get('/ticket', [TicketController::class, 'index'])->name("dashboard")->middleware('auth');
Route::get('/ticket/create', [TicketController::class, 'create'])->middleware('auth');
Route::post('/ticket/create', [TicketController::class, 'store'])->middleware('auth');

