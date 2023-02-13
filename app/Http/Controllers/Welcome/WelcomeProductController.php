<?php

namespace App\Http\Controllers\Welcome;

use App\Models\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Categories\ProductCategory;
use App\Views\Welcome\Product\WelcomeProductShowProps;
use App\Views\Welcome\Product\WelcomeProductIndexProps;
use App\Views\Welcome\Product\WelcomeCategoryIndexProps;
use App\Views\Welcome\Product\WelcomeOwnerProductsProps;
use App\Views\Welcome\Product\WelcomeProductRecentProps;
use App\Views\Welcome\Product\WelcomeProductFeaturedProps;
use App\Views\Welcome\Product\WelcomeProductTopTalksProps;
use App\Views\Welcome\Product\WelcomeCategoryTypeIndexProps;
use App\Views\Welcome\Product\WelcomeProductDiscountedProps;
use App\Views\Welcome\Product\WelcomeProductFeaturedCategoryProps;
use App\Views\Welcome\Product\WelcomeProductTopTalksCategoryProps;
use App\Views\Welcome\Product\WelcomeProductDiscountedCategoryProps;
use App\Views\Welcome\Product\WelcomeProductFeaturedCategoryTypeProps;
use App\Views\Welcome\Product\WelcomeProductTopTalksCategoryTypeProps;
use App\Views\Welcome\Product\WelcomeProductDiscountedCategoryTypeProps;

class WelcomeProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Mall/Product/Welcome/showAllProducts', [
            'data' => new WelcomeProductIndexProps(),
        ]);
    }

    public function category(ProductCategory $category)
    {
        return Inertia::render('Mall/Product/Welcome/showCategoryProducts', [
            'data' => new WelcomeCategoryIndexProps($category),
        ]);
    }

    public function category_type(string $category_type)
    {
        return Inertia::render('Mall/Product/Welcome/showCategoryTypeProducts', [
            'data' => new WelcomeCategoryTypeIndexProps($category_type),
        ]);
    }

    public function owner(User $owner)
    {
        // return $owner->products()->whereActive()->limit(4)->get();
        return Inertia::render('Mall/Product/Welcome/showOwnerProducts', [
            'data' => new WelcomeOwnerProductsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Mall/Product/Welcome/productDetail', [
            'data' => new WelcomeProductShowProps($uuid),
        ]);
    }

    public function recent()
    {
        return Inertia::render('Mall/Product/Welcome/recentProducts', [
            'data' => new WelcomeProductRecentProps(),
        ]);
    }

    public function top_talks()
    {
        return Inertia::render('Mall/Product/Welcome/topTalksProducts', [
            'data' => new WelcomeProductTopTalksProps(),
        ]);
    }

    public function top_talks_category_type(string $category_type)
    {
        return Inertia::render('Mall/Product/Welcome/topTalksCategoryTypeProducts', [
            'data' => new WelcomeProductTopTalksCategoryTypeProps($category_type),
        ]);
    }

    public function top_talks_category(ProductCategory $category)
    {
        return Inertia::render('Mall/Product/Welcome/topTalksCategoryProducts', [
            'data' => new WelcomeProductTopTalksCategoryProps($category),
        ]);
    }

    public function featured()
    {
        return Inertia::render('Mall/Product/Welcome/Featured/featuredProducts', [
            'data' => new WelcomeProductFeaturedProps(),
        ]);
    }
    public function featured_category_type(string $category_type)
    {
        return Inertia::render('Mall/Product/Welcome/Featured/featuredCategoryTypeProducts', [
            'data' => new WelcomeProductFeaturedCategoryTypeProps($category_type),
        ]);
    }

    public function featured_category(ProductCategory $category)
    {
        return Inertia::render('Mall/Product/Welcome/Featured/featuredCategoryProducts', [
            'data' => new WelcomeProductFeaturedCategoryProps($category),
        ]);
    }

    public function discounted()
    {
        return Inertia::render('Mall/Product/Welcome/Discounted/discountedProducts', [
            'data' => new WelcomeProductDiscountedProps(),
        ]);
    }
    public function discounted_category_type(string $category_type)
    {
        return Inertia::render('Mall/Product/Welcome/Discounted/discountedCategoryTypeProducts', [
            'data' => new WelcomeProductDiscountedCategoryTypeProps($category_type),
        ]);
    }

    public function discounted_category(ProductCategory $category)
    {
        return Inertia::render('Mall/Product/Welcome/Discounted/discountedCategoryProducts', [
            'data' => new WelcomeProductDiscountedCategoryProps($category),
        ]);
    }
}
