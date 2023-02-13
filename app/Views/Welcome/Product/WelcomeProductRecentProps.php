<?php

namespace App\Views\Welcome\Product;

use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeProductHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeProductRecentProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            WelcomeProductHandler::get_all_products(
                Product::latest('id')
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ProductCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
