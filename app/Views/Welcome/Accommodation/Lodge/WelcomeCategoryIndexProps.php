<?php

namespace App\View\Welcome\Accommodation;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Categories\AccommodationCategory;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::to_web_page(
            WelcomeAccommodationHandler::get_category_accommodations(
                $this->category->slug
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
