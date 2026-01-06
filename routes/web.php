<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canRegister' => Features::enabled(Features::registration()),
    ]);
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard', [
        'budgets' => auth()->user()->budgets
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('budgets', function () {
    return Inertia::render('Budget', [
        'budget' => auth()->user()->currentBudget()->with('categories.subcategories')->first()
    ]);
})->middleware(['auth', 'verified'])->name('budget');

require __DIR__.'/settings.php';
