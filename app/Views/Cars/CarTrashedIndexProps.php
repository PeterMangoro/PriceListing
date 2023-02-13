<?php

namespace App\Views\Cars;

use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class CarTrashedIndexProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Car::onlyTrashed()
                    ->belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
