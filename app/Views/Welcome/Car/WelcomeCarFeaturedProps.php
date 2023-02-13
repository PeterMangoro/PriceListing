<?php

namespace App\View\Welcome\Car;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\CarCategory;
use App\Models\Feature;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeCarFeaturedProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetFeaturedModels::for_paginated_display_of_type(
                Feature::orderByRating(),
                'Car'
            ),
            'featurable'
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
