<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Welcome\Accommodation\WelcomeSaleAccommodationController;
use App\Http\Controllers\Welcome\Accommodation\WelcomeLodgeAccommodationController;
use App\Http\Controllers\Welcome\Accommodation\WelcomeRentalAccommodationController;

Route::prefix('welcome')
    ->name('welcome.')
    ->group(function () {
        Route::controller(WelcomeSaleAccommodationController::class)
            ->prefix('accommodations/sales')
            ->name('accommodations.')
            ->group(function () {
                Route::get('location/{city:city_slug}', 'location')->name('location');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                Route::get('recent', 'recent')->name('recent');
                Route::get('top_talks', 'top_talks')->name('top_talks');
                Route::get('top_talks/category_type/{category:type}', 'top_talks_category_type')->name('top_talks.category_type');
                Route::get('top_talks/category/{category:slug}', 'top_talks_category')->name('top_talks.category');
                Route::get('featured', 'featured')->name('featured');
                Route::get('discounted', 'discounted')->name('discounted');
                Route::get('', 'index')->name('index');
                Route::get('{accommodation:uuid}', 'show')->name('show');
            });

        Route::controller(WelcomeRentalAccommodationController::class)
            ->prefix('accommodations/rentals')
            ->name('accommodations.rentals.')
            ->group(function () {
                Route::get('location/{city:city_slug}', 'location')->name('location');
                Route::get('owner/{owner:username}', 'owner')->name('owner');
                Route::get('', 'index')->name('index');
                Route::get('{accommodation:uuid}', 'show')->name('show');
            });

        Route::controller(WelcomeLodgeAccommodationController::class)
            ->prefix('accommodations/lodges')
            ->name('accommodations.lodges.')
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
                Route::get('', 'index')->name('index');
                Route::get('{accommodation:uuid}', 'show')->name('show');
                // Route::get('{{accommodation:uuid}/accommodation:title_slug}/gallery', 'show')->name('pictures');
            });
    });
