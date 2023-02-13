<?php

namespace App\Views\Welcome\Service;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Models\Shared\Discount;
use App\Views\Shared\Categories;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\Models\Categories\ServiceCategory;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Actions\Shared\Feature\GetFeaturedModels;



class WelcomeServiceDiscountedCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function services()
    {
        return ServiceDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Discount::ofCategoryType($this->category_type)->orderByExpDate(),
                'Service'
            ),
            'discountable'
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ServiceCategory()
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
                new ServiceCategory(),
                $this->category_type
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
