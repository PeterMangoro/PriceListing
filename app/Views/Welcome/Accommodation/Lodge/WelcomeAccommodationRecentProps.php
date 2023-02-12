<?php

namespace App\View\Welcome\Accommodation\Lodge;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Mall\Accommodation;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeAccommodationRecentProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::to_web_page(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                Accommodation::latest('id')->withAddress()->forLodges()
            )
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
