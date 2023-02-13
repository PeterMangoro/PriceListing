<?php

namespace App\Views\Accommodations;

use App\DataObjects\Accommodation\AccommodationDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class AccommodationTrashedIndexProps extends BaseView
{
    public function accommodations()
    {
        return AccommodationDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Accommodation::belongsToAuthUser()
                    ->onlyTrashed()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
