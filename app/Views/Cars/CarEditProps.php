<?php

namespace App\Views\Cars;

use App\DataObjects\Car\Partials\CarForUpdate;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Models\Categories\CarCategory;
use App\Views\Shared\BaseView;
use App\Views\Shared\CarMakes;

class CarEditProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $car = null,
        public ?object $categories = null,
    ) {
        $this->uuid = $uuid;

        $this->car = CarForUpdate::from(
            ModelHandler::getModelForEdit(
                new Car(),
                $this->uuid
            )
        );
        $this->categories = $this->car->categories;
    }

    public function car()
    {
        return $this->car;
    }

    public function carMakes()
    {
        return (new CarMakes())->carMakes();
    }

    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new CarCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
