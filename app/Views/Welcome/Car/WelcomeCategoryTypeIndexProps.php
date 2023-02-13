<?php

namespace App\Views\Welcome\Car;

use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Category\CategoryData;
use App\DataObjects\Category\CategoryTypeData;



class WelcomeCategoryTypeIndexProps extends BaseView
{
    public function __construct(
        public object $car_make,
    ) {
        $this->car_make = $car_make;
    }

    public function cars()
    {
        return CarDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                $this->car_make->cars(),
                18
            )
        );
    }

    public function categories()
    {
        return CategoryData::forDisplay(
            $this->car_make->carModels()->get('title')
        );
    }

    public function category_type()
    {
        return CategoryType::from($this->car_make->title);
    }

    // public function car_makes()
    // {
    //     return
    //         CategoryTypeData::forDisplay(
    //             CategoryHandler::get_car_makes(
    //                 CarCategory::whereNot('type', $this->car_make)
    //             )
    //         );
    // }

    public function filters()
    {
        return Filters::filters();
    }
}
