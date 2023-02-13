<?php

namespace App\Views\Welcome\Product;

use App\Models\Product;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;



class WelcomeProductRecentProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
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
