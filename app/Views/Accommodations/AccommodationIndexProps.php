<?php

namespace App\Views\Accommodations;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Accommodation;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class AccommodationIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Accommodation::belongsToAuthUser()
                    ->withAddress()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
