<?php

namespace App\Views\Welcome\Accommodation\Sale\Discounted;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\AccommodationCategory;
use App\Models\Shared\Discount;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeAccommodationDiscountedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::ofCategory($this->category->slug)->orderByExpDate(),
                'Accommodation'
            ),
            'discountable'
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
