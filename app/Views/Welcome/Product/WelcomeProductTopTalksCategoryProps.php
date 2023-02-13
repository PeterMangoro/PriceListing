<?php

namespace App\Views\Welcome\Product;

use App\Views\Shared\Filters;
use App\Models\Shared\Popular;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Category\CategoryData;
use App\Models\Categories\ProductCategory;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Actions\Shared\Popular\GetPopularModels;



class WelcomeProductTopTalksCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function products()
    {
        return ProductDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::ofCategory($this->category->slug)->orderByPageVisits(),
                'Product'
            )
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            Categories::getAllCategories(
                new ProductCategory()
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
                new ProductCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
