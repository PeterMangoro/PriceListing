<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Accommodation;
use App\Models\Categories\AccommodationCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeAccommodationRecentProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
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
