<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;
use App\Http\Middleware\RedirectIfAuthenticated;

// Public routes
Route::get('/', function () {
    if (auth()->check()) {
        return redirect('/dashboard');
    }
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLogin'])
    ->middleware(RedirectIfAuthenticated::class)
    ->name('login');
Route::post('/login', [AuthController::class, 'login'])
    ->middleware(RedirectIfAuthenticated::class)
    ->name('login.post');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [InventarisController::class, 'dashboard'])->name('dashboard');

    // Inventaris routes
    Route::resource('inventaris', InventarisController::class);
});
