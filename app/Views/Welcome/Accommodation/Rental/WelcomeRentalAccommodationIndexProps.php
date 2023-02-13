<?php

namespace App\Views\Welcome\Accommodation\Rental;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeRentalAccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                Accommodation::forRental()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
