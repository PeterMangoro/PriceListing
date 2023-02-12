<?php

namespace App\View\Welcome\Service;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Popular;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeServiceTopTalksCategoryProps extends BaseView
{
    public function __construct(object $category)
    {
        $this->category = $category;
    }

    public function services()
    {
        return ServiceDisplayData::to_web_page(
            GetPopularModels::for_paginated_display_of_type(
                Popular::ofCategory($this->category->slug)->orderByPageVisits(),
                'Service'
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_all_categories(
                new ServiceCategory()
            )
        );
    }

    public function category()
    {
        return Category::from($this->category);
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
