<?php

namespace App\Views\Welcome\Product;

use App\Views\Shared\Filters;
use App\Models\Shared\Feature;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\Models\Categories\ProductCategory;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Actions\Shared\Feature\GetFeaturedModels;



class WelcomeProductFeaturedCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::ofCategoryType($this->category_type)->orderByRating(),
                'Product'
            ),
            'featurable'
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
