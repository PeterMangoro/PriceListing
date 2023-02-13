<?php

namespace App\Views\Welcome\Product;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Shared\Feature;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeProductFeaturedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function products()
    {
        // dd('hie');
        return ProductDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::ofCategory($this->category->slug)->orderByRating(),
                'Product'
            ),
            'featurable'
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
