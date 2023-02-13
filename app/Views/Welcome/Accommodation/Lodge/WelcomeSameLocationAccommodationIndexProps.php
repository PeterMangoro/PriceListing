<?php

namespace App\Views\Welcome\Accommodation\Lodge;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                Accommodation::fromSameCity($this->city)
                    ->whereActive()
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
