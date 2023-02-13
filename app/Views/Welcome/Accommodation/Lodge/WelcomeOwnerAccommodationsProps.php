<?php

namespace App\Views\Welcome\Accommodation\Lodge;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Welcome\WelcomeAccommodationHandler;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeOwnerAccommodationsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function accommodations()
    {
        return AccommodationDisplayData::toWebPage(
            WelcomeAccommodationHandler::get_paginated_display_accommodations(
                $this->owner->accommodations()
                    ->whereActive()
            )
        );
    }

    public function owner()
    {
        return [
            'username' => $this->owner->username,
            'name' => $this->owner->name,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
