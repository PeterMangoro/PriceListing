<?php

namespace App\Views\Welcome\Product\Category;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\ValueObjects\CategoryType;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCategoryTypeIndexProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function products()
    {
        return ProductDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Product::ofCategoryType($this->category_type),
                18
            )
        );
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

    public function category_type()
    {
        return CategoryType::from($this->category_type);
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            CategoryHandler::getCategoryTypes(
                ProductCategory::whereNot('type', $this->category_type)
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
