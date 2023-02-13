<?php

namespace App\View\Welcome\Product;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Product\ProductHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\ValueObjects\CategoryType;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeCategoryTypeIndexProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function products()
    {
        return ProductDisplayData::to_web_page(
            ProductHandler::get_paginated_products(
                Product::ofCategoryType($this->category_type),
                18
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_categories_of_type(
                new ProductCategory(),
                $this->category_type
            )
        );
    }

    public function category_type()
    {
        return CategoryType::from($this->category_type);
    }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                ProductCategory::whereNot('type', $this->category_type)
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
