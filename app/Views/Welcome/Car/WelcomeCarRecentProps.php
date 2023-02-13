<?php

namespace App\View\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeCarHandler;
use App\Models\Car;
use App\Models\Categories\CarCategory;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeCarRecentProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            WelcomeCarHandler::get_all_cars(
                Car::latest('id')
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new CarCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
