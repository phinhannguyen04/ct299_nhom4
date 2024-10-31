<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanbayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ChuyenbayController;

Route::prefix('vemaybay')->group(function () {
    Route::get('/', [ChuyenbayController::class, 'index'])->name('vemaybay.index');
    Route::post('/', [ChuyenbayController::class, 'store'])->name('vemaybay.store');
});

Route::prefix('homepage')->group(function () {
    Route::get('/', [SanbayController::class, 'index'])->name('sanbay.index');
    Route::post('/', [HomepageController::class, 'store'])->name('homepage.store');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
