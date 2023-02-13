<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Shared\RatingController;

// Comments and Rating
Route::controller(RatingController::class)
    ->name('ratings.add.')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
    ])
    ->group(function () {
    //    Transport Comments
        Route::post('ratings', [RatingController::class,'product'])->name('product');
        Route::post('ratings', [RatingController::class,'product'])->name('product');
    });
