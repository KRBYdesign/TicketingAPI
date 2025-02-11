<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/tickets/create', [App\Http\Controllers\TicketController::class, 'create'])
    ->middleware(['auth', 'verified']);

Route::post('/tickets/create', [App\Http\Controllers\TicketController::class, 'store'])
    ->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
