<?php

namespace App\View\Welcome\Car;

use App\DataObjects\Car\CarDetailData;
use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Car\CarHandler;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Model\ModelHandler;
use App\Models\Car;
use App\Models\Categories\CarCategory;
use App\View\Shared\BaseView;

class WelcomeCarShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $car = null,
        public ?object $category = null,
    ) {
        $this->uuid = $uuid;
        $this->car =
            ModelHandler::get_model_for_detailed_display(
                Car::includeCarDetail(),
                $uuid
            );
        $this->category =
            CategoryHandler::get_category(
                CarCategory::whichHasCar($this->car->id)
            );
    }

    public function car()
    {
        return CarDetailData::toWebPage($this->car);
    }

    public function category_type()
    {
        return $this->car()->car_make;
    }

    public function similar_cars()
    {
        // dd($this->car->carMake->cars()->limit(8)->get());

        return CarDisplayData::collection_to_web_page(
            CarHandler::get_unpaginated_cars(
                $this->car->carMake->cars()
                    ->dontInclude($this->car->id)
                    ->includeCarDetail(),
                9
            )
        );
    }

    public function owner_cars()
    {
        return CarDisplayData::collection_to_web_page(
            CarHandler::get_unpaginated_cars(
                Car::belongsToOwner($this->car->user->id)
                    ->dontInclude($this->car->id),
                9
            )
        );
    }
}
