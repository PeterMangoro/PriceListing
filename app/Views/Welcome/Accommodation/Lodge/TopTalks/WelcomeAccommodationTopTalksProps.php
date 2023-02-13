<?php

namespace App\View\Welcome\Accommodation\Lodge\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Popular;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeAccommodationTopTalksProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetPopularModels::for_paginated_display_of_type(
                Popular::orderByPageVisits(),
                'Accommodation',
                9
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
