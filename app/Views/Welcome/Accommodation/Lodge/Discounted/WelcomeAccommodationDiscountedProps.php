<?php

namespace App\Views\Welcome\Accommodation\Lodge\Discounted;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Shared\Discount;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeAccommodationDiscountedProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::orderByExpDate()
                    ->forLodges(),
                'Accommodation',
                9
            ),
            'discountable'
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new AccommodationCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
