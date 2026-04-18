<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; // TAMBAHKAN BARIS INI
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua route di dalam group ini akan dicek apakah user sudah login dan punya role admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    
    // Resource route untuk CRUD User 
    Route::resource('users', UserController::class);
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';