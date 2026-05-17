<?php

use App\Http\Controllers\TrumpNameController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [TrumpNameController::class, 'index'])->name('home');
Route::post('/trump-names', [TrumpNameController::class, 'store'])->name('trump-names.store');

Route::get('locale/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'da', 'es'])) {
        session()->put('locale', $locale);
    }
    return back();
})->name('locale.update');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
