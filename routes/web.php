<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Middleware\RedirectIfAuthenticated;

// Redirect root
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes (guest only)
Route::middleware(RedirectIfAuthenticated::class)->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Authenticated routes
Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [InventarisController::class, 'dashboard'])->name('dashboard');

    // Inventaris routes
    Route::resource('inventaris', InventarisController::class);

    // Peminjaman routes
    Route::resource('peminjaman', App\Http\Controllers\PeminjamanController::class)->except(['show', 'edit', 'update', 'destroy']);
});
