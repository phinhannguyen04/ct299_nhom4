<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanbayController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ChuyenbayController;
use App\Http\Controllers\HanhkhachController;

use App\Http\Controllers\VNPayController;

Route::post('/vnpay', [VNPayController::class, 'createPayment'])->name('vnpay.create');
Route::get('/vnpay-return', [VNPayController::class, 'paymentReturn'])->name('vnpay.return');
Route::get('/vnpay/success', [VNPayController::class, 'success'])->name('vnpay.success');
Route::get('/vnpay/failure', [VNPayController::class, 'failure'])->name('vnpay.failure');


Route::prefix('view')->group(function () {
    Route::get('/diadiem-quangbinh', fn() => view ('galaxy.diadiem-quangbinh'));
    Route::get('/diadiem-gialai', fn() => view ('galaxy.diadiem-gialai'));
    Route::get('/diadiem-nghean', fn() => view ('galaxy.diadiem-nghean'));
    Route::get('/diadiem-phuquoc', fn() => view ('galaxy.diadiem-phuquoc'));
    Route::get('/diadiem-hanoi', fn() => view ('galaxy.diadiem-hanoi'));
});

Route::prefix('flights')->group(function () {
    Route::get('/', [ChuyenbayController::class, 'schedule'])->name('flights.schedule');
});

Route::prefix('passengers')->group(function () {
    Route::get('/', [HanhkhachController::class, 'index'])->name('passengers.index');
    Route::post('/', [HanhkhachController::class, 'store'])->name('passengers.store');
});

Route::prefix('tickets')->group(function () {
    Route::get('/', [ChuyenbayController::class, 'index'])->name('tickets.index');
    Route::post('/', [ChuyenbayController::class, 'store'])->name('tickets.store');
    Route::post('/information', [ChuyenbayController::class, 'getInformation'])->name('tickets.getInfomation');
});

Route::prefix('homepage')->group(function () {
    Route::get('/', [SanbayController::class, 'index'])->name('sanbay.index');
    Route::post('/', [HomepageController::class, 'store'])->name('homepage.store');
});

Route::group([], function () {
    Route::get('/', [SanbayController::class, 'index'])->name('sanbay.index');
    Route::post('/', [HomepageController::class, 'store'])->name('homepage.store');
});

// Route::get('/', function () {
//     return view('galaxy/index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
