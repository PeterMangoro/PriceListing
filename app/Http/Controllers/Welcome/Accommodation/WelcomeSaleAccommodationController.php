<?php

namespace App\Http\Controllers\Welcome\Accommodation;

use App\Models\User;

use Inertia\Inertia;
use App\Models\Shared\Address;
use App\Http\Controllers\Controller;
use App\Models\Categories\AccommodationCategory;
use App\Views\Welcome\Accommodation\WelcomeCategoryIndexProps;
use App\Views\Welcome\Accommodation\Sale\WelcomeAccommodationShowProps;
use App\Views\Welcome\Accommodation\Lodge\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Accommodation\Sale\WelcomeAccommodationRecentProps;
use App\Views\Welcome\Accommodation\Sale\WelcomeOwnerAccommodationsProps;
use App\Views\Welcome\Accommodation\Sale\WelcomeSaleAccommodationIndexProps;
use App\Views\Welcome\Accommodation\Sale\WelcomeSameLocationAccommodationIndexProps;
use App\Views\Welcome\Accommodation\Lodge\Featured\WelcomeAccommodationFeaturedProps;
use App\Views\Welcome\Accommodation\Lodge\TopTalks\WelcomeAccommodationTopTalksProps;
use App\Views\Welcome\Accommodation\Sale\Discounted\WelcomeAccommodationDiscountedProps;
use App\Views\Welcome\Accommodation\Lodge\Featured\WelcomeAccommodationFeaturedCategoryProps;
use App\Views\Welcome\Accommodation\Lodge\TopTalks\WelcomeAccommodationTopTalksCategoryProps;
use App\Views\Welcome\Accommodation\Sale\Discounted\WelcomeAccommodationDiscountedCategoryProps;
use App\Views\Welcome\Accommodation\Lodge\Featured\WelcomeAccommodationFeaturedCategoryTypeProps;
use App\Views\Welcome\Accommodation\Lodge\TopTalks\WelcomeAccommodationTopTalksCategoryTypeProps;
use App\Views\Welcome\Accommodation\Sale\Discounted\WelcomeAccommodationDiscountedCategoryTypeProps;

class WelcomeSaleAccommodationController extends Controller
{
    public function index()
    {
        return Inertia::render('Accommodation/Welcome/Sale/Index', [
            'data' => new WelcomeSaleAccommodationIndexProps(),
        ]);
    }

    // public function category(AccommodationCategory $category)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/showCategoryAccommodations', [
    //         'data' => new WelcomeCategoryIndexProps($category),
    //     ]);
    // }

    // public function category_type(string $category_type)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/showCategoryTypeAccommodations', [
    //         'data' => new WelcomeCategoryTypeIndexProps($category_type)
    //     ]);
    // }

    public function owner(User $owner)
    {
        // return $owner->accommodations()->whereActive()->limit(4)->get();
        return Inertia::render('Accommodation/Welcome/Sale/OwnerAccommodations', [
            'data' => new WelcomeOwnerAccommodationsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Accommodation/Welcome/Sale/Show', [
            'data' => new WelcomeAccommodationShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Accommodation/Welcome/Sale/Recent/recentAccommodations', [
            'data' => new WelcomeAccommodationRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Accommodation/Welcome/Sale/TopTalks/topTalksAccommodations', [
            'data' => new WelcomeAccommodationTopTalksProps(),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Accommodation/Welcome/Sale/Discounted/discountedAccommodations', [
            'data' => new WelcomeAccommodationDiscountedProps(),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Accommodation/Welcome/Sale/Featured/featuredAccommodations', [
            'data' => new WelcomeAccommodationFeaturedProps(),
        ]);
    }

    public function location(Address $city)
    {
        return Inertia::render('Accommodation/Welcome/Sale/SameLocation', [
            'data' => new WelcomeSameLocationAccommodationIndexProps($city),
        ]);
    }

    // public function top_talks_category_type(string $category_type)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/TopTalks/topTalksCategoryTypeAccommodations', [
    //         'data' => new WelcomeAccommodationTopTalksCategoryTypeProps($category_type)
    //     ]);
    // }

    // public function top_talks_category(AccommodationCategory $category)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/TopTalks/topTalksCategoryAccommodations', [
    //         'data' => new WelcomeAccommodationTopTalksCategoryProps($category)
    //     ]);
    // }

    // public function featured_category_type(string $category_type)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/Featured/featuredCategoryTypeAccommodations', [
    //         'data' => new WelcomeAccommodationFeaturedCategoryTypeProps($category_type)
    //     ]);
    // }

    // public function featured_category(AccommodationCategory $category)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/Featured/featuredCategoryAccommodations', [
    //         'data' => new WelcomeAccommodationFeaturedCategoryProps($category)
    //     ]);
    // }

    // public function discounted_category_type(string $category_type)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/Discounted/discountedCategoryTypeAccommodations', [
    //         'data' => new WelcomeAccommodationDiscountedCategoryTypeProps($category_type)
    //     ]);
    // }

    // public function discounted_category(AccommodationCategory $category)
    // {
    //     return Inertia::render('Accommodation/Welcome/Sale/Discounted/discountedCategoryAccommodations', [
    //         'data' => new WelcomeAccommodationDiscountedCategoryProps($category)
    //     ]);
    // }
}
