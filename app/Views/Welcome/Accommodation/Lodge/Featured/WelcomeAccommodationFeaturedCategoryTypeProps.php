<?php

namespace App\Views\Welcome\Accommodation\Lodge\Featured;

use App\Views\Shared\Filters;
use App\Models\Shared\Feature;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Models\Categories\AccommodationCategory;
use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;



class WelcomeAccommodationFeaturedCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::ofCategoryType($this->category_type)->orderByRating(),
                'Accommodation',
                9
            ),
            'featurable'
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
