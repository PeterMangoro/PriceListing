<?php

namespace App\Views\Welcome\Accommodation\Lodge\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeAccommodationTopTalksProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::orderByPageVisits(),
                'Accommodation',
                9
            )
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
