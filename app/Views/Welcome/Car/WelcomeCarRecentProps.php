<?php

namespace App\Views\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Models\Categories\CarCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeCarRecentProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Car::latest('id')
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
