<?php

namespace App\Views\Welcome\Service;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Shared\Discount;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeServiceDiscountedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function services()
    {
        return ServiceDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::ofCategory($this->category->slug)->orderByExpDate(),
                'Service'
            ),
            'discountable'
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            Categories::getAllCategories(
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
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
