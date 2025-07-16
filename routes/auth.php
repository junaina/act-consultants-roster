<?php
use App\Http\Controllers\Auth\UserAuthController as AuthController;
use Illuminate\Support\Facades\Route;

// Show login form
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Handle login
Route::post('/login', [AuthController::class, 'login']);

// Show registration form
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Handle registration
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
