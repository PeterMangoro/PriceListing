<?php

namespace App\Views\Welcome\Car\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeCarTopTalksProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::orderByPageVisits(),
                'Car'
            )
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
