<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UserController; // TAMBAHKAN BARIS INI
use App\Http\Controllers\IotDeviceController; 
use App\Http\Controllers\MyIotDeviceController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 Route::middleware(['auth'])->group(function () {
    // Route untuk pengguna melihat perangkatnya sendiri
    Route::resource('my-iot-devices', MyIotDeviceController::class)
        ->only(['index', 'show'])
        ->middleware('role:user');
});

// Semua route di dalam group ini akan dicek apakah user sudah login dan punya role admin
Route::middleware(['auth', 'role:admin'])->group(function () {


    
    // Resource route untuk CRUD User 
    Route::resource('users', UserController::class);
     Route::resource('iot-devices', IotDeviceController::class)->middleware('role:admin'); // Tambahkan Ini
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';