<?php

namespace App\View\Welcome\Product;

use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeProductHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeProductIndexProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::to_web_page(
            WelcomeProductHandler::get_all_products(
                new Product()
            )
        );
    }

    // public function pool()
    // {
    //     $pool = WelcomeProductHandler::get_featured_products();

    //     $featured_products =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Feature::orderByRating()->limit(4),
    //             'Product'
    //         )->map(fn ($product) => [
    //             'latest_image' => collect($product)['featurable']['latest_image']['path'],
    //             'uuid' => $product->featurable->uuid,
    //         ]);

    //     $top_talks =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Popular::orderByPageVisits()->limit(4),
    //             'Product'
    //         )->map(fn ($product) => [
    //             'latest_image' => collect($product)['popularable']['latest_image']['path'],
    //             'uuid' => $product->popularable->uuid,
    //         ]);

    //     $discounted_products =
    //         GetFeaturedModels::withDisplayImageOfType(
    //             Discount::orderByExpDate()->limit(4),
    //             'Product'
    //         )->map(fn ($product) => [
    //             'latest_image' => collect($product)['discountable']['latest_image']['path'],
    //             'uuid' => $product->discountable->uuid,
    //         ]);
    //     // dd($featured_products);

    //     $recent_products = $pool->map(fn ($product) => [
    //         'latest_image' => collect($product)['latest_image']['path'],
    //             'uuid' => $product->uuid,
    //             ])->sortByDesc('created_at')->take(4);

    //     // $top_talks = $pool->map(fn ($product) => $product)->sortByDesc('page_visits')->take(4);

    //     // $top_selling = $pool->map(fn ($product) => $product)->random(fn ($items) => min(4, count($items)));;

    //     // $for_you = $pool->map(fn ($product) => $product)->random(fn ($items) => min(4, count($items)));;

    //     return [

    //         'featured_products' => $featured_products,
    //         'recent_products' => $recent_products,
    //         'top_talks' => $top_talks,
    //         'discounted_products' => $discounted_products,
    //         // 'for_you' => $for_you,
    //     ];
    // }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new ProductCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
