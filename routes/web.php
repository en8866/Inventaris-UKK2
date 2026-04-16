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

    // User Management routes
    Route::resource('users', \App\Http\Controllers\UserController::class)->except(['create', 'show', 'edit']);

    // Inventaris routes
    Route::get('/inventaris-export', [InventarisController::class, 'exportExcel'])->name('inventaris.export');
    Route::resource('inventaris', InventarisController::class)
        ->except(['show'])
        ->parameters(['inventaris' => 'inventaris']);

    // Peminjaman routes
    Route::get('/peminjaman-export', [PeminjamanController::class, 'exportExcel'])->name('peminjaman.export');
    Route::resource('peminjaman', PeminjamanController::class)->except(['show', 'edit', 'update']);
    Route::put('/peminjaman/{peminjaman}/kembalikan', [PeminjamanController::class, 'update'])->name('peminjaman.kembalikan');
});
