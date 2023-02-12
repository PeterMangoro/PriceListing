<?php

namespace App\View\Welcome\Service;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Popular;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeServiceTopTalksProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::to_web_page(
            GetPopularModels::for_paginated_display_of_type(
                Popular::orderByPageVisits(),
                'Service'
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
