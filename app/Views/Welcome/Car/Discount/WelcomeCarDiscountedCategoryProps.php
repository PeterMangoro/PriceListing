<?php

namespace App\Views\Welcome\Car\Discount;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\Models\Shared\Discount;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCarDiscountedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::ofCategory($this->category->slug)->orderByExpDate(),
                'Car'
            ),
            'discountable'
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            Categories::getAllCategories(
                new CarCategory()
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
                new CarCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
