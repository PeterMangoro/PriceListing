<?php

namespace App\Views\Welcome\Accommodation;

use App\Models\Accommodation;
use App\Views\Shared\Filters;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\Handlers\Category\CategoryHandler;
use App\DataObjects\Category\CategoryTypeData;
use App\Models\Categories\AccommodationCategory;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\DataObjects\Accommodation\AccommodationDisplayData;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Accommodation::withAddress()
                ->classifiedUnder($this->category->slug)
            )
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            Categories::getAllCategories(
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
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new AccommodationCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
