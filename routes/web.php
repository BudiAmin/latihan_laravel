<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminController;

// Halaman utama - Statistik pengaduan
Route::get('/', [PengaduanController::class, 'statistik'])->name('home');

// Login & Logout
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Registrasi user
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'store']);

// Halaman pengaduan untuk user
Route::middleware('auth')->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
});

// Halaman dashboard admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pengaduan/{id}', [AdminController::class, 'show'])->name('admin.pengaduan.show');
    Route::post('/admin/pengaduan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.pengaduan.updateStatus');
    Route::delete('/admin/pengaduan/{id}', [AdminController::class, 'destroy'])->name('admin.pengaduan.destroy');
});
