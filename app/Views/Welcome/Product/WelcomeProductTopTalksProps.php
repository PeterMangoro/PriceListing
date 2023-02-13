<?php

namespace App\Views\Welcome\Product;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeProductTopTalksProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::orderByPageVisits(),
                'Product'
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
