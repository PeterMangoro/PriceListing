<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\WelcomeController;
use App\Http\Controllers\Welcome\WelcomeCarController;
use App\Http\Controllers\Welcome\WelcomePlotController;
use App\Http\Controllers\Welcome\WelcomeProductController;
use App\Http\Controllers\Welcome\WelcomeServiceController;
use App\Http\Controllers\Welcome\WelcomeTransportController;

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::prefix('welcome')
    ->name('welcome.')
    ->group(function () {
        //Products
        Route::controller(WelcomeProductController::class)
            ->prefix('products')
            ->name('products.')
            ->group(function () {
                Route::get('category_type/{category:type}', 'category_type')->name('category_type');
                Route::get('category/{category:slug}', 'category')->name('category');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                Route::get('recent', 'recent')->name('recent');
                Route::get('top_talks', 'top_talks')->name('top_talks');
                Route::get('top_talks/category_type/{category:type}', 'top_talks_category_type')->name('top_talks.category_type');
                Route::get('top_talks/category/{category:slug}', 'top_talks_category')->name('top_talks.category');
                Route::get('featured', 'featured')->name('featured');
                Route::get('featured/category_type/{category:type}', 'featured_category_type')->name('featured.category_type');
                Route::get('featured/category/{category:slug}', 'featured_category')->name('featured.category');
                Route::get('discounted', 'discounted')->name('discounted');
                Route::get('discounted/category_type/{category:type}', 'discounted_category_type')->name('discounted.category_type');
                Route::get('discounted/category/{category:slug}', 'discounted_category')->name('discounted.category');
            });
        Route::resource('products', WelcomeProductController::class)->only('index', 'show');

        //Services
        Route::controller(WelcomeServiceController::class)
            ->prefix('services')
            ->name('services.')
            ->group(function () {
                Route::get('category_type/{category:type}', 'category_type')->name('category_type');
                Route::get('category/{category:slug}', 'category')->name('category');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                Route::get('recent', 'recent')->name('recent');
                Route::get('top_talks', 'top_talks')->name('top_talks');
                Route::get('top_talks/category_type/{category:type}', 'top_talks_category_type')->name('top_talks.category_type');
                Route::get('top_talks/category/{category:slug}', 'top_talks_category')->name('top_talks.category');
                Route::get('featured', 'featured')->name('featured');
                Route::get('featured/category_type/{category:type}', 'featured_category_type')->name('featured.category_type');
                Route::get('featured/category/{category:slug}', 'featured_category')->name('featured.category');
                Route::get('discounted', 'discounted')->name('discounted');
                Route::get('discounted/category_type/{category:type}', 'discounted_category_type')->name('discounted.category_type');
                Route::get('discounted/category/{category:slug}', 'discounted_category')->name('discounted.category');
            });
        Route::resource('services', WelcomeServiceController::class)->only('index', 'show');

        //Cars
        Route::controller(WelcomeCarController::class)
            ->prefix('cars')
            ->name('cars.')
            ->group(function () {
                Route::get('car_make/{make:title}', 'car_make')->name('category_type');
                Route::get('car_model/{model:title}', 'car_model')->name('category');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                Route::get('recent', 'recent')->name('recent');
                Route::get('hiring', 'hiring')->name('hiring');
                Route::get('top_talks', 'top_talks')->name('top_talks');
                Route::get('top_talks/category_type/{category:type}', 'top_talks_category_type')->name('top_talks.category_type');
                Route::get('top_talks/category/{category:slug}', 'top_talks_category')->name('top_talks.category');
                Route::get('featured', 'featured')->name('featured');
                Route::get('featured/category_type/{category:type}', 'featured_category_type')->name('featured.category_type');
                Route::get('featured/category/{category:slug}', 'featured_category')->name('featured.category');
                Route::get('discounted', 'discounted')->name('discounted');
                Route::get('discounted/category_type/{category:type}', 'discounted_category_type')->name('discounted.category_type');
                Route::get('discounted/category/{category:slug}', 'discounted_category')->name('discounted.category');
            });
        Route::resource('cars', WelcomeCarController::class)->only('index', 'show')->scoped(['cars'=>'uuid']);

        //Transports
        Route::controller(WelcomeTransportController::class)
            ->prefix('transports')
            ->name('transports.')
            ->group(function () {
                Route::get('{departure}/to/{destination}', 'trip')->name('trip');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
            });
        Route::resource('transports', WelcomeTransportController::class)->only('index', 'show');

        //Plots
        Route::controller(WelcomePlotController::class)
            ->prefix('plots')
            ->name('plots.')
            ->group(function () {
                Route::get('city/{city}', 'city')->name('city');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                // Route::get('','index')->name('index');
                // Route::get('{plot:uuid}','show')->name('show');
            });
        Route::resource('plots', WelcomePlotController::class)->only('index', 'show')->scoped(['plot' => 'uuid']);
    });
