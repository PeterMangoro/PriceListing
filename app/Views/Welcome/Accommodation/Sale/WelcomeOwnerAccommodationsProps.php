<?php

namespace App\Views\Welcome\Accommodation\Sale;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Shared\ModelHandler;
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
            ModelHandler::getPaginatedData(
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
