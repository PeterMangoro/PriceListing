<?php

namespace App\Views\Welcome\Product\Category;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function products()
    {
        return ProductDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Product::classifiedUnder($this->category->slug)
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
        return $this->category->slug;
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            CategoryHandler::getCategoryTypes(
                new ProductCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
