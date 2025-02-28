<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});



// authntification
Route::view('/register','auth.register')->name('registerPage');
Route::view('/login','auth.login')->name('loginPage');
Route::post('/register', [AuthController::class, 'register'])->name("register");
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::put('/profile', [UserController::class, 'profile'])->name('profile.update')->middleware('auth');

// routes

Route::get('/dashboard', [DashboardController::class, 'index'])->name("dashboard")->middleware('auth');

// tickets
// Route::get('/ticket', [TicketController::class, 'index'])->middleware('auth');
Route::get('/ticket/create', [TicketController::class, 'create'])->middleware('auth');
Route::post('/ticket/create', [TicketController::class, 'store'])->middleware('auth');
Route::put('/ticket/{ticket}', [TicketController::class, 'update'])->name('tickets.update')->middleware('auth');

Route::get('/tickets/{id}', [TicketController::class, 'show'])->name('tickets.show')->middleware('auth');
Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy')->middleware('auth');
Route::patch('/tickets/{id}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus')->middleware('auth');
