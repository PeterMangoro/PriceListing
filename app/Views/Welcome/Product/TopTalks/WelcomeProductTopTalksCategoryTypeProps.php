<?php

namespace App\Views\Welcome\Product\TopTalks;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Shared\Popular;
use App\ValueObjects\CategoryType;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeProductTopTalksCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::ofCategoryType($this->category_type)->orderByPageVisits(),
                'Product'
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new ProductCategory()
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
                new ProductCategory(),
                $this->category_type
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
