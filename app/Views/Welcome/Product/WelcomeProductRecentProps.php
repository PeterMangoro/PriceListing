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

class WelcomeProductRecentProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::to_web_page(
            WelcomeProductHandler::get_all_products(
                Product::latest('id')
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
