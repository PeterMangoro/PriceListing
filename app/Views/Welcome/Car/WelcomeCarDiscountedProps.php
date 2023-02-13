<?php

namespace App\Views\Welcome\Car;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Shared\Discount;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Actions\Shared\Feature\GetFeaturedModels;


class WelcomeCarDiscountedProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::orderByExpDate(),
                'Car'
            ),
            'discountable'
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new CarCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
