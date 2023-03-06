<?php

namespace App\Views\Welcome\Car;

use App\DataObjects\Car\CarDetailData;
use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Views\Shared\BaseView;

class WelcomeCarShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $car = null,
        public ?object $category = null,
    ) {
        $this->uuid = $uuid;
        $this->car =
            ModelHandler::getModelForDisplay(
                Car::IncludeCarDetail(),
                $uuid
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
        return CarDisplayData::collectionToWebPage(
            ModelHandler::getUnpaginatedData(
                $this->car->carMake->cars()
                    ->dontInclude($this->car->id)
                    ->includeCarDetail(),
                9
            )
        );
    }

    public function owner_cars()
    {
        return CarDisplayData::collectionToWebPage(
            ModelHandler::getUnpaginatedData(
                Car::belongsToOwner($this->car->user->id)
                    ->dontInclude($this->car->id)
                    ->includeCarDetail(),
                9
            )
        );
    }
}
