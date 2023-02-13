<?php

namespace App\Views\Welcome\Accommodation\Rental;

use App\Models\Accommodation;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Accommodation\AccommodationDisplayData;


class WelcomeSameLocationAccommodationIndexProps extends BaseView
{
    public function __construct(
        public object $location,
        public ?string $city = null
    ) {
        $this->city = $location->city;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                Accommodation::fromSameCity($this->city)
                    ->forRental()
            )
        );
    }

    public function location()
    {
        return [

            'city' => $this->city,
            'slug' => $this->location->city_slug,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
