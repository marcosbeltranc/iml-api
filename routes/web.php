<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Grupo de rutas del panel con middleware 'web' (para manejar sesiones y vistas)
Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return Auth::check() ? view('welcome') : redirect()->route('login');
    });

    Route::resource('client', ClientController::class);
    Route::resource('user', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('auth', AuthController::class);

    // Rutas de autenticación del panel
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Dashboard del panel
    Route::get('/dashboard', function () {
        return view('welcome'); 
    })->middleware('auth')->name('dashboard');
});

// Rutas API sin middleware 'web' (para evitar sesiones y manejar peticiones JSON)
Route::middleware(['api'])->prefix('api')->group(function () {
    Route::apiResource('clients', ClientController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);

    // Rutas de autenticación para API con tokens (si usas Laravel Sanctum)
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::post('auth/logout', [AuthController::class, 'logout']);
});