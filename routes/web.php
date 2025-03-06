<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Redirigir a login si no hay sesión, o a welcome si está autenticado
Route::get('/', function () {
    return Auth::check() ? view('welcome') : redirect()->route('login');
});

Route::resource('client' , ClientController::class);
Route::resource('user' , UserController::class);
Route::resource('category' , CategoryController::class);
Route::resource('product' , ProductController::class);
Route::resource('auth' , AuthController::class);

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard (welcome) solo accesible si está autenticado
Route::get('/dashboard', function () {
    return view('welcome'); // Se usa 'welcome' como dashboard
})->middleware('auth')->name('dashboard');