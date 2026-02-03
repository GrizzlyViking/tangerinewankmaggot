<?php

use App\Http\Controllers\TrumpNameController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [TrumpNameController::class, 'index'])->name('home');
Route::post('/trump-names', [TrumpNameController::class, 'store'])->name('trump-names.store');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
