<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Car\CarController;
use App\Http\Controllers\Plot\PlotController;
use App\Http\Controllers\Car\CarTrashedController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Service\ServiceController;
use App\Http\Controllers\Shared\DashboardController;
use App\Http\Controllers\Transport\TransportController;
use App\Http\Controllers\Product\ProductTrashedController;
use App\Http\Controllers\Service\ServiceTrashedController;
use App\Http\Controllers\Accommodation\AccommodationController;
use App\Http\Controllers\Accommodation\AccommodationTrashedController;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Dashboard
    Route::controller(DashboardController::class)
        ->name('dashboard.')
        ->group(function () {
            Route::get('/dashboard', 'index')->name('dashboard');
        });

    Route::prefix('user')
        ->group(function () {
        
            Route::resources([
                'plots' => PlotController::class,               
                'transports' => TransportController::class,
            ]);

            Route::resource('products', ProductController::class)->except('show');
            Route::resource('services', ServiceController::class)->except('show');
            Route::resource('accommodations', AccommodationController::class)->except('show');
            Route::resource('cars', CarController::class)->except('show');

            Route::resource('products/trashed', ProductTrashedController::class)
                ->only(['index','show'])->names([
                    'index' => 'products.trashed.index',
                    'show' => 'products.trashed.show',
                ])->withTrashed();

            Route::resource('services/trashed', ServiceTrashedController::class)
                ->only(['index','show'])->names([
                    'index' => 'services.trashed.index',
                    'show' => 'services.trashed.show',
                ])->withTrashed();

            Route::resource('accommodations/trashed', AccommodationTrashedController::class)
                ->only(['index','show'])->names([
                    'index' => 'accommodations.trashed.index',
                    'show' => 'accommodations.trashed.show',
                ])->withTrashed();

            Route::resource('cars/trashed', CarTrashedController::class)
                ->only(['index','show'])->names([
                    'index' => 'cars.trashed.index',
                    'show' => 'cars.trashed.show',
                ])->withTrashed();
        });
});
