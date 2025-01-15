<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PurchaseController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/turn-tester', function () {
    return view('turn-tester');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [PurchaseController::class, 'index'])->name('dashboard');
    Route::resource('purchases', PurchaseController::class)->except(['show']);
});

require __DIR__.'/auth.php';
