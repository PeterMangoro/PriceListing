<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Categories\ProductCategory;
use App\Models\User;
use App\Views\Welcome\Product\Category\WelcomeCategoryIndexProps;
use App\Views\Welcome\Product\Category\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Product\Discount\WelcomeProductDiscountedCategoryProps;
use App\Views\Welcome\Product\Discount\WelcomeProductDiscountedCategoryTypeProps;
use App\Views\Welcome\Product\Discount\WelcomeProductDiscountedProps;
use App\Views\Welcome\Product\Feature\WelcomeProductFeaturedCategoryProps;
use App\Views\Welcome\Product\Feature\WelcomeProductFeaturedCategoryTypeProps;
use App\Views\Welcome\Product\Feature\WelcomeProductFeaturedProps;
use App\Views\Welcome\Product\TopTalks\WelcomeProductTopTalksCategoryProps;
use App\Views\Welcome\Product\TopTalks\WelcomeProductTopTalksCategoryTypeProps;
use App\Views\Welcome\Product\TopTalks\WelcomeProductTopTalksProps;
use App\Views\Welcome\Product\WelcomeOwnerProductsProps;
use App\Views\Welcome\Product\WelcomeProductIndexProps;
use App\Views\Welcome\Product\WelcomeProductRecentProps;
use App\Views\Welcome\Product\WelcomeProductShowProps;
use Inertia\Inertia;

class WelcomeProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Product/Welcome/Index', [
            'data' => new WelcomeProductIndexProps(),
        ]);
    }

    public function category(ProductCategory $category)
    {
        return Inertia::render('Product/Welcome/Category/CategoryProducts', [
            'data' => new WelcomeCategoryIndexProps($category),
        ]);
    }

    public function category_type(string $category_type)
    {
        return Inertia::render('Product/Welcome/Category/CategoryTypeProducts', [
            'data' => new WelcomeCategoryTypeIndexProps($category_type),
        ]);
    }

    public function owner(User $owner)
    {
        return Inertia::render('Product/Welcome/OwnerProducts', [
            'data' => new WelcomeOwnerProductsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Product/Welcome/Show', [
            'data' => new WelcomeProductShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Product/Welcome/RecentProducts', [
            'data' => new WelcomeProductRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Product/Welcome/topTalksProducts', [
            'data' => new WelcomeProductTopTalksProps(),
        ]);
    }

    public function top_talks_category_type(string $category_type)
    {
        return Inertia::render('Product/Welcome/topTalksCategoryTypeProducts', [
            'data' => new WelcomeProductTopTalksCategoryTypeProps($category_type),
        ]);
    }

    public function top_talks_category(ProductCategory $category)
    {
        return Inertia::render('Product/Welcome/topTalksCategoryProducts', [
            'data' => new WelcomeProductTopTalksCategoryProps($category),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Product/Welcome/Featured/featuredProducts', [
            'data' => new WelcomeProductFeaturedProps(),
        ]);
    }
    public function featured_category_type(string $category_type)
    {
        return Inertia::render('Product/Welcome/Featured/featuredCategoryTypeProducts', [
            'data' => new WelcomeProductFeaturedCategoryTypeProps($category_type),
        ]);
    }

    public function featured_category(ProductCategory $category)
    {
        return Inertia::render('Product/Welcome/Featured/featuredCategoryProducts', [
            'data' => new WelcomeProductFeaturedCategoryProps($category),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Product/Welcome/Discounted/DiscountedProducts', [
            'data' => new WelcomeProductDiscountedProps(),
        ]);
    }
    public function discounted_category_type(string $category_type)
    {
        return Inertia::render('Product/Welcome/Discounted/DiscountedCategoryTypeProducts', [
            'data' => new WelcomeProductDiscountedCategoryTypeProps($category_type),
        ]);
    }

    public function discounted_category(ProductCategory $category)
    {
        return Inertia::render('Product/Welcome/Discounted/DiscountedCategoryProducts', [
            'data' => new WelcomeProductDiscountedCategoryProps($category),
        ]);
    }
}
