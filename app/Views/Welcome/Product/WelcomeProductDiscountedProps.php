<?php

namespace App\View\Welcome\Product;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Shared\Discount;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeProductDiscountedProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetFeaturedModels::for_paginated_display_of_type(
                Discount::orderByExpDate(),
                'Product'
            ),
            'discountable'
        );
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
