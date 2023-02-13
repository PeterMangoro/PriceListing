<?php

namespace App\View\Welcome\Service;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Feature;
use App\ValueObjects\CategoryType;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeServiceFeaturedCategoryTypeProps extends BaseView
{
    public function __construct(string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function services()
    {
        return ServiceDisplayData::toWebPage(
            GetFeaturedModels::for_paginated_display_of_type(
                Feature::ofCategoryType($this->category_type)->orderByRating(),
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

    public function category_type()
    {
        return CategoryType::from($this->category_type);
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_categories_of_type(
                new ServiceCategory(),
                $this->category_type
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
