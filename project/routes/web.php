<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login; // <-- 1. Added the missing import

// Chirp Routes
Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function(){
        Route::post('/chirps', [ChirpController::class, 'store']);
        Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
        Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
        Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy']);

});

Route::match(['get', 'post'], '/register', Register::class)
    ->middleware('guest')
    ->name('register');

Route::match(['get', 'post'], '/login', Login::class)
    ->middleware('guest')
    ->name('login');

// Logout Route (must be POST for security)
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/')->with('success', 'You have been logged out.');
})->middleware('auth')->name('logout');