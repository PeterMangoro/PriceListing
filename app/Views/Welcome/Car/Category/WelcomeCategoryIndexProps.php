<?php

namespace App\Views\Welcome\Car\Category;

use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\Handlers\Shared\ModelHandler;
use App\ValueObjects\Category;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $car_model)
    {
        $this->car_model = $car_model;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                $this->car_model->cars()->IncludeCarDetail(),
            )
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            $this->car_model->carMake->carModels()->get('title')
        );
    }

    public function category()
    {
        return Category::from($this->car_model);
    }

    public function filters()
    {
        return Filters::filters();
    }
}
