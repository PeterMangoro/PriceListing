<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\Models\Categories\AccommodationCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeAccommodationRecentProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            WelcomeAccommodationHandler::get_all_accommodations(
                Accommodation::latest('id')->withAddress()
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
