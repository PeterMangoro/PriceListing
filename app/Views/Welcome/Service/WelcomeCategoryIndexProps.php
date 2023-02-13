<?php

namespace App\Views\Welcome\Service;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(object $category)
    {
        $this->category = $category;
    }

    public function services()
    {
        return ServiceDisplayData::toWebPage(
            WelcomeServiceHandler::get_category_services(
                $this->category->slug
            )
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
