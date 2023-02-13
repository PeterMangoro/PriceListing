<?php

namespace App\Views\Welcome\Accommodation\Lodge\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Shared\Popular;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeAccommodationTopTalksCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::ofCategory($this->category->slug)->orderByPageVisits(),
                'Accommodation',
                9
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
