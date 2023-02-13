<?php

namespace App\Views\Welcome\Accommodation\Lodge\TopTalks;

use App\Views\Shared\Filters;
use App\Models\Shared\Popular;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Actions\Shared\Popular\GetPopularModels;
use App\Models\Categories\AccommodationCategory;
use App\DataObjects\Accommodation\AccommodationDisplayData;



class WelcomeAccommodationTopTalksCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::ofCategoryType($this->category_type)->orderByPageVisits(),
                'Accommodation',
                9
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new AccommodationCategory()
            )
        );
    }

    public function category_type()
    {
        return CategoryType::from($this->category_type);
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            Categories::getCategoriesOfType(
                new AccommodationCategory(),
                $this->category_type
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
