<?php

namespace App\View\Welcome\Product;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Popular;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeProductTopTalksProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::to_web_page(
            GetPopularModels::for_paginated_display_of_type(
                Popular::orderByPageVisits(),
                'Product'
            )
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
