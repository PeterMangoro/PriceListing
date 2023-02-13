<?php

namespace App\Http\Controllers\Welcome;

use App\Models\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Categories\ServiceCategory;
use App\Views\Welcome\Service\WelcomeServiceShowProps;
use App\Views\Welcome\Service\WelcomeServiceIndexProps;
use App\Views\Welcome\Service\WelcomeCategoryIndexProps;
use App\Views\Welcome\Service\WelcomeOwnerServicesProps;
use App\Views\Welcome\Service\WelcomeServiceRecentProps;
use App\Views\Welcome\Service\WelcomeServiceFeaturedProps;
use App\Views\Welcome\Service\WelcomeServiceTopTalksProps;
use App\Views\Welcome\Service\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Service\WelcomeServiceDiscountedProps;
use App\Views\Welcome\Service\WelcomeServiceFeaturedCategoryProps;
use App\Views\Welcome\Service\WelcomeServiceTopTalksCategoryProps;
use App\Views\Welcome\Service\WelcomeServiceDiscountedCategoryProps;
use App\Views\Welcome\Service\WelcomeServiceFeaturedCategoryTypeProps;
use App\Views\Welcome\Service\WelcomeServiceTopTalksCategoryTypeProps;
use App\Views\Welcome\Service\WelcomeServiceDiscountedCategoryTypeProps;

class WelcomeServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Mall/Service/Welcome/showAllServices', [
            'data' => new WelcomeServiceIndexProps(),
        ]);
    }

    public function category(ServiceCategory $category)
    {
        return Inertia::render('Mall/Service/Welcome/showCategoryServices', [
            'data' => new WelcomeCategoryIndexProps($category),
        ]);
    }

    public function category_type(string $category_type)
    {
        return Inertia::render('Mall/Service/Welcome/showCategoryTypeServices', [
            'data' => new WelcomeCategoryTypeIndexProps($category_type),
        ]);
    }

    public function owner(User $owner)
    {
        // return $owner->services()->whereActive()->limit(4)->get();
        return Inertia::render('Mall/Service/Welcome/showOwnerServices', [
            'data' => new WelcomeOwnerServicesProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Mall/Service/Welcome/serviceDetail', [
            'data' => new WelcomeServiceShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Mall/Service/Welcome/recentServices', [
            'data' => new WelcomeServiceRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Mall/Service/Welcome/topTalksServices', [
            'data' => new WelcomeServiceTopTalksProps(),
        ]);
    }

    public function top_talks_category_type(string $category_type)
    {
        return Inertia::render('Mall/Service/Welcome/topTalksCategoryTypeServices', [
            'data' => new WelcomeServiceTopTalksCategoryTypeProps($category_type),
        ]);
    }

    public function top_talks_category(ServiceCategory $category)
    {
        return Inertia::render('Mall/Service/Welcome/topTalksCategoryServices', [
            'data' => new WelcomeServiceTopTalksCategoryProps($category),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Mall/Service/Welcome/Featured/featuredServices', [
            'data' => new WelcomeServiceFeaturedProps(),
        ]);
    }
    public function featured_category_type(string $category_type)
    {
        return Inertia::render('Mall/Service/Welcome/Featured/featuredCategoryTypeServices', [
            'data' => new WelcomeServiceFeaturedCategoryTypeProps($category_type),
        ]);
    }

    public function featured_category(ServiceCategory $category)
    {
        return Inertia::render('Mall/Service/Welcome/Featured/featuredCategoryServices', [
            'data' => new WelcomeServiceFeaturedCategoryProps($category),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Mall/Service/Welcome/Discounted/discountedServices', [
            'data' => new WelcomeServiceDiscountedProps(),
        ]);
    }
    public function discounted_category_type(string $category_type)
    {
        return Inertia::render('Mall/Service/Welcome/Discounted/discountedCategoryTypeServices', [
            'data' => new WelcomeServiceDiscountedCategoryTypeProps($category_type),
        ]);
    }

    public function discounted_category(ServiceCategory $category)
    {
        return Inertia::render('Mall/Service/Welcome/Discounted/discountedCategoryServices', [
            'data' => new WelcomeServiceDiscountedCategoryProps($category),
        ]);
    }
}
