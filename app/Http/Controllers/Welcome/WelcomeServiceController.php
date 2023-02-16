<?php

namespace App\Http\Controllers\Welcome;

use App\Models\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Categories\ServiceCategory;
use App\Views\Welcome\Service\WelcomeServiceShowProps;
use App\Views\Welcome\Service\WelcomeServiceIndexProps;
use App\Views\Welcome\Service\WelcomeOwnerServicesProps;
use App\Views\Welcome\Service\WelcomeServiceRecentProps;
use App\Views\Welcome\Service\Category\WelcomeCategoryIndexProps;
use App\Views\Welcome\Service\Feature\WelcomeServiceFeaturedProps;
use App\Views\Welcome\Service\TopTalks\WelcomeServiceTopTalksProps;
use App\Views\Welcome\Service\Category\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Service\Discount\WelcomeServiceDiscountedProps;
use App\Views\Welcome\Service\Feature\WelcomeServiceFeaturedCategoryProps;
use App\Views\Welcome\Service\TopTalks\WelcomeServiceTopTalksCategoryProps;
use App\Views\Welcome\Service\Discount\WelcomeServiceDiscountedCategoryProps;
use App\Views\Welcome\Service\Feature\WelcomeServiceFeaturedCategoryTypeProps;
use App\Views\Welcome\Service\TopTalks\WelcomeServiceTopTalksCategoryTypeProps;
use App\Views\Welcome\Service\Discount\WelcomeServiceDiscountedCategoryTypeProps;


class WelcomeServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Service/Welcome/Index', [
            'data' => new WelcomeServiceIndexProps(),
        ]);
    }

    public function category(ServiceCategory $category)
    {
        return Inertia::render('Service/Welcome/Category/CategoryServices', [
            'data' => new WelcomeCategoryIndexProps($category),
        ]);
    }

    public function category_type(string $category_type)
    {
        return Inertia::render('Service/Welcome/Category/CategoryTypeServices', [
            'data' => new WelcomeCategoryTypeIndexProps($category_type),
        ]);
    }

    public function owner(User $owner)
    {
        // return $owner->services()->whereActive()->limit(4)->get();
        return Inertia::render('Service/Welcome/OwnerServices', [
            'data' => new WelcomeOwnerServicesProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Service/Welcome/Show', [
            'data' => new WelcomeServiceShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Service/Welcome/Recent/recentServices', [
            'data' => new WelcomeServiceRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Service/Welcome/topTalksServices', [
            'data' => new WelcomeServiceTopTalksProps(),
        ]);
    }

    public function top_talks_category_type(string $category_type)
    {
        return Inertia::render('Service/Welcome/topTalksCategoryTypeServices', [
            'data' => new WelcomeServiceTopTalksCategoryTypeProps($category_type),
        ]);
    }

    public function top_talks_category(ServiceCategory $category)
    {
        return Inertia::render('Service/Welcome/topTalksCategoryServices', [
            'data' => new WelcomeServiceTopTalksCategoryProps($category),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Service/Welcome/Featured/featuredServices', [
            'data' => new WelcomeServiceFeaturedProps(),
        ]);
    }
    public function featured_category_type(string $category_type)
    {
        return Inertia::render('Service/Welcome/Featured/featuredCategoryTypeServices', [
            'data' => new WelcomeServiceFeaturedCategoryTypeProps($category_type),
        ]);
    }

    public function featured_category(ServiceCategory $category)
    {
        return Inertia::render('Service/Welcome/Featured/featuredCategoryServices', [
            'data' => new WelcomeServiceFeaturedCategoryProps($category),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Service/Welcome/Discounted/discountedServices', [
            'data' => new WelcomeServiceDiscountedProps(),
        ]);
    }
    public function discounted_category_type(string $category_type)
    {
        return Inertia::render('Service/Welcome/Discounted/discountedCategoryTypeServices', [
            'data' => new WelcomeServiceDiscountedCategoryTypeProps($category_type),
        ]);
    }

    public function discounted_category(ServiceCategory $category)
    {
        return Inertia::render('Service/Welcome/Discounted/discountedCategoryServices', [
            'data' => new WelcomeServiceDiscountedCategoryProps($category),
        ]);
    }
}
