<?php

namespace App\View\Welcome\Product;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeProductHandler;
use App\Models\Categories\ProductCategory;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function products()
    {
        return ProductDisplayData::to_web_page(
            WelcomeProductHandler::get_category_products(
                $this->category->slug
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_all_categories(
                new ProductCategory()
            )
        );
    }

    public function category()
    {
        return $this->category->slug;
    }

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
