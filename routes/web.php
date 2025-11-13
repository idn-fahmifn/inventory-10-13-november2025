<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route Admin.
Route::prefix('admin')->middleware(['auth', 'verified', 'admin'])->group(function () {
    // admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'admin'])->name('dashboard');
    Route::get('petugas', [ProfileController::class, 'index'])->name('petugas.index');
    Route::post('petugas', [ProfileController::class, 'store'])->name('petugas.store');

    // room
    Route::resource('ruangan', RoomController::class);
    Route::resource('barang', ItemController::class);
});

// Route Petugas.
Route::prefix('petugas')->middleware(['auth', 'verified'])->group(function () {
    // admin Dashboard
    Route::get('dashboard', [DashboardController::class, 'petugas'])->name('dashboard.petugas');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
