<?php

namespace App\Views\Welcome\Accommodation\Lodge\Featured;

use App\Views\Shared\Filters;
use App\Models\Shared\Feature;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryTypeData;
use App\Models\Categories\AccommodationCategory;
use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;



class WelcomeAccommodationFeaturedProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::orderByRating(),
                'Accommodation',
                9
            ),
            'featurable'
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
