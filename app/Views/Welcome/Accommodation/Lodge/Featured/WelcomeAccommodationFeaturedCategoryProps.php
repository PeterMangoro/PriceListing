<?php

namespace App\View\Welcome\Accommodation\Lodge\Featured;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Feature;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeAccommodationFeaturedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::to_web_page(
            GetFeaturedModels::for_paginated_display_of_type(
                Feature::ofCategory($this->category->slug)
                    ->orderByRating(),
                'Accommodation',
                9
            ),
            'featurable'
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
