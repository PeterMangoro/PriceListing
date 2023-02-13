<?php

namespace App\Views\Welcome\Car;

use App\Actions\Shared\Feature\GetFeaturedModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Category\CategoryHandler;
use App\Models\Categories\CarCategory;
use App\Models\Feature;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCarFeaturedCategoryProps extends BaseView
{
    public function __construct(public object $category)
    {
        $this->category = $category;
    }

    public function cars()
    {
        // dd('hie');
        return CarDisplayData::toWebPage(
            GetFeaturedModels::forPaginatedDisplayOfType(
                Feature::ofCategory($this->category->slug)->orderByRating(),
                'Car'
            ),
            'featurable'
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
