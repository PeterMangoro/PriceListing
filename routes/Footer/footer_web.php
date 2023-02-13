<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Footer
Route::get('/pricing', function () {
    return Inertia::render('Components/pricing');
})->name('pricing');
Route::get('/guide', function () {
    return Inertia::render('Components/guide');
})->name('guide');
Route::get('/about', function () {
    return Inertia::render('Components/about');
})->name('about');
Route::get('/link', function () {
    return Inertia::render('link');
})->name('link');
