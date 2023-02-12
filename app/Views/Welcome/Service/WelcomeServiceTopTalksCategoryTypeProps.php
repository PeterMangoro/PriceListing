<?php

namespace App\View\Welcome\Service;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Popular;
use App\ValueObjects\CategoryType;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeServiceTopTalksCategoryTypeProps extends BaseView
{
    public function __construct(string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function services()
    {
        return ServiceDisplayData::to_web_page(
            GetPopularModels::for_paginated_display_of_type(
                Popular::ofCategoryType($this->category_type)->orderByPageVisits(),
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
