<?php

namespace App\Views\Welcome\Car;

use App\Actions\Shared\Popular\GetPopularModels;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\CarCategory;
use App\Models\Shared\Popular;
use App\ValueObjects\CategoryType;
use App\Views\Shared\BaseView;
use App\Views\Shared\Categories;
use App\Views\Shared\Filters;

class WelcomeCarTopTalksCategoryTypeProps extends BaseView
{
    public function __construct(public string $category_type)
    {
        $this->category_type = $category_type;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
            GetPopularModels::forPaginatedDisplayOfType(
                Popular::ofCategoryType($this->category_type)->orderByPageVisits(),
                'Car'
            )
        );
    }

    public function category_types()
    {
        return CategoryTypeData::forDisplay(
            ModelHandler::getUnPaginatedData(
                new CarCategory()
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
                new CarCategory(),
                $this->category_type
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
