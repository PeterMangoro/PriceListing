<?php

namespace App\View\Welcome\Car;

use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\Handlers\Welcome\WelcomeCarHandler;
use App\ValueObjects\Category;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeCategoryIndexProps extends BaseView
{
    public function __construct(public object $car_model)
    {
        $this->car_model = $car_model;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
            WelcomeCarHandler::get_all_cars(
                $this->car_model->cars()
            )
        );
    }

    public function categories()
    {
        return CategoryData::for_display(
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
