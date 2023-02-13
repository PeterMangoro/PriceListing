<?php

namespace App\Views\Welcome\Service;

use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Service;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeServiceRecentProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Service::latest('id')
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
