<?php

namespace App\Views\Welcome\Product\Discount;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Shared\Discount;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeProductDiscountedProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::orderByExpDate(),
                'Product'
            ),
            'discountable'
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
