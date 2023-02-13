<?php

namespace App\View\Welcome\Accommodation\Rental;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

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
