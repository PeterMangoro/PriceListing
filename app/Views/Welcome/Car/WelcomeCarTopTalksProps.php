<?php

namespace App\View\Welcome\Car;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\CarCategory;
use App\Models\Popular;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeCarTopTalksProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetPopularModels::for_paginated_display_of_type(
                Popular::orderByPageVisits(),
                'Car'
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
