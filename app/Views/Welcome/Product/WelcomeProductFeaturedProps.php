<?php

namespace App\Views\Welcome\Product;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Feature;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeProductFeaturedProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::orderByRating(),
                'Product'
            ),
            'featurable'
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
