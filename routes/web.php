<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController; // Pastikan ini ada
use App\Http\Controllers\Auth\ResetPasswordController; // Pastikan ini ada

// Halaman utama - Statistik pengaduan
Route::get('/', [PengaduanController::class, 'statistik'])->name('home');

// Login & Logout
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

// Rute untuk Lupa Kata Sandi (Email-Based Reset) - TIDAK DILINDUNGI AUTH
// Error "Route [password.reset] not defined" terjadi karena rute ini hilang
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');


// Registrasi user
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [UserController::class, 'store']);

// Halaman pengaduan untuk user (Membutuhkan Login)
Route::middleware(['auth', 'masyarakat'])->group(function () {
    Route::get('/pengaduan', [PengaduanController::class, 'index'])->name('pengaduan');
    Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');
});

// Halaman dashboard admin (Membutuhkan Login)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/pengaduan/{id}', [AdminController::class, 'show'])->name('admin.pengaduan.show');
    Route::post('/admin/pengaduan/{id}/update-status', [AdminController::class, 'updateStatus'])->name('admin.pengaduan.updateStatus');
    Route::delete('/admin/pengaduan/{id}', [AdminController::class, 'destroy'])->name('admin.pengaduan.destroy');
});

// Halaman untuk Ubah Kata Sandi (Pengguna Sudah Login)
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/change-password', [UserController::class, 'showChangePasswordForm'])->name('user.change-password.form');
    Route::post('/profile/change-password', [UserController::class, 'updatePassword'])->name('user.change-password.update');
});
