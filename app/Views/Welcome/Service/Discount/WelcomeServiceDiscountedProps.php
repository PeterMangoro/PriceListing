<?php

namespace App\Views\Welcome\Service\Discount;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Shared\Discount;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeServiceDiscountedProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::orderByExpDate(),
                'Service'
            ),
            'discountable'
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
