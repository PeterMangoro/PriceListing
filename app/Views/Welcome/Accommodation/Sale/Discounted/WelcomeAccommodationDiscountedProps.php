<?php

namespace App\View\Welcome\Accommodation\Sale\Discounted;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Shared\Discount;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeAccommodationDiscountedProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetFeaturedModels::for_paginated_display_of_type(
                Discount::orderByExpDate(),
                'Accommodation'
            ),
            'discountable'
        );
    }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new AccommodationCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
