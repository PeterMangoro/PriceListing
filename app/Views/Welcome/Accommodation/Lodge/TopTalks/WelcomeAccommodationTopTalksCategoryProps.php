<?php

namespace App\View\Welcome\Accommodation\Lodge\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Popular;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeAccommodationTopTalksCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::to_web_page(
            GetPopularModels::for_paginated_display_of_type(
                Popular::ofCategory($this->category->slug)->orderByPageVisits(),
                'Accommodation',
                9
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_all_categories(
                new AccommodationCategory()
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
                new AccommodationCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
