<?php

namespace App\View\Welcome\Service;

use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Welcome\WelcomeServiceHandler;
use App\Models\Categories\ServiceCategory;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Categories;
use App\View\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(object $category)
    {
        $this->category = $category;
    }

    public function services()
    {
        return ServiceDisplayData::to_web_page(
            WelcomeServiceHandler::get_category_services(
                $this->category->slug
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
            Categories::get_all_categories(
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
        return CategoryTypeData::for_display(
            CategoryHandler::get_category_types(
                new ServiceCategory()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
