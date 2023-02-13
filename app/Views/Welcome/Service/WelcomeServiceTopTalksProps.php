<?php

namespace App\Views\Welcome\Service;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeServiceTopTalksProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::orderByPageVisits(),
                'Service'
            )
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
