<?php

namespace App\View\Welcome\Accommodation\Rental;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

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
        return AccommodationDisplayData::to_web_page(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
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
