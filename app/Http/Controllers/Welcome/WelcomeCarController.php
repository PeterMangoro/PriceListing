<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Car\CarMake;
use App\Models\Car\CarModel;
use App\Models\Categories\CarCategory;
use App\Models\User;
use App\Views\Welcome\Car\Category\WelcomeCategoryIndexProps;
use App\Views\Welcome\Car\Category\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Car\Discount\WelcomeCarDiscountedCategoryProps;
use App\Views\Welcome\Car\Discount\WelcomeCarDiscountedCategoryTypeProps;
use App\Views\Welcome\Car\Discount\WelcomeCarDiscountedProps;
use App\Views\Welcome\Car\Feature\WelcomeCarFeaturedCategoryProps;
use App\Views\Welcome\Car\Feature\WelcomeCarFeaturedCategoryTypeProps;
use App\Views\Welcome\Car\Feature\WelcomeCarFeaturedProps;
use App\Views\Welcome\Car\TopTalks\WelcomeCarTopTalksCategoryProps;
use App\Views\Welcome\Car\TopTalks\WelcomeCarTopTalksCategoryTypeProps;
use App\Views\Welcome\Car\TopTalks\WelcomeCarTopTalksProps;
use App\Views\Welcome\Car\WelcomeCarHireProps;
use App\Views\Welcome\Car\WelcomeCarIndexProps;
use App\Views\Welcome\Car\WelcomeCarRecentProps;
use App\Views\Welcome\Car\WelcomeCarShowProps;
use App\Views\Welcome\Car\WelcomeOwnerCarsProps;
use Inertia\Inertia;

class WelcomeCarController extends Controller
{
    public function index()
    {
        return Inertia::render('Car/Welcome/Index', [
            'data' => new WelcomeCarIndexProps(),
        ]);
    }

    public function hiring()
    {
        return Inertia::render('Car/Welcome/Index', [
            'data' => new WelcomeCarHireProps(),
        ]);
    }

    public function car_model(CarModel $model)
    {
        return Inertia::render('Car/Welcome/Category/CategoryCars', [
            'data' => new WelcomeCategoryIndexProps($model),
        ]);
    }

    public function car_make(CarMake $make)
    {
        return Inertia::render('Car/Welcome/Category/CategoryTypeCars', [
            'data' => new WelcomeCategoryTypeIndexProps($make),
        ]);
    }

    public function owner(User $owner)
    {
        return Inertia::render('Car/Welcome/OwnerCars', [
            'data' => new WelcomeOwnerCarsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Car/Welcome/Show', [
            'data' => new WelcomeCarShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Car/Welcome/recentCars', [
            'data' => new WelcomeCarRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Car/Welcome/topTalksCars', [
            'data' => new WelcomeCarTopTalksProps(),
        ]);
    }

    public function top_talks_category_type(string $category_type)
    {
        return Inertia::render('Car/Welcome/topTalksCategoryTypeCars', [
            'data' => new WelcomeCarTopTalksCategoryTypeProps($category_type),
        ]);
    }

    public function top_talks_category(CarCategory $category)
    {
        return Inertia::render('Car/Welcome/topTalksCategoryCars', [
            'data' => new WelcomeCarTopTalksCategoryProps($category),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Car/Welcome/Featured/featuredCars', [
            'data' => new WelcomeCarFeaturedProps(),
        ]);
    }
    public function featured_category_type(string $category_type)
    {
        return Inertia::render('Car/Welcome/Featured/featuredCategoryTypeCars', [
            'data' => new WelcomeCarFeaturedCategoryTypeProps($category_type),
        ]);
    }

    public function featured_category(CarCategory $category)
    {
        return Inertia::render('Car/Welcome/Featured/featuredCategoryCars', [
            'data' => new WelcomeCarFeaturedCategoryProps($category),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Car/Welcome/Discounted/discountedCars', [
            'data' => new WelcomeCarDiscountedProps(),
        ]);
    }
    public function discounted_category_type(string $category_type)
    {
        return Inertia::render('Car/Welcome/Discounted/discountedCategoryTypeCars', [
            'data' => new WelcomeCarDiscountedCategoryTypeProps($category_type),
        ]);
    }

    public function discounted_category(CarCategory $category)
    {
        return Inertia::render('Car/Welcome/Discounted/discountedCategoryCars', [
            'data' => new WelcomeCarDiscountedCategoryProps($category),
        ]);
    }
}
