<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RumahSakitController;

Route::get('/', function () {
    if (session('user')) {
        return redirect('/dashboard');
    }
    return redirect('/login');
});

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Dashboard route (protected)
Route::get('/dashboard', function () {
    if (!session('user')) {
        return redirect('/login');
    }
    return view('dashboard');
})->name('dashboard');

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Pasien CRUD routes
Route::resource('pasien', PasienController::class);

// Rumah Sakit CRUD routes
Route::resource('rumah-sakit', RumahSakitController::class);
