<?php

namespace App\View\Welcome\Service;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Feature;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeServiceFeaturedProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::to_web_page(
            GetFeaturedModels::for_paginated_display_of_type(
                Feature::orderByRating(),
                'Service'
            ),
            'featurable'
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
