<?php

namespace App\Views\Cars;

use App\DataObjects\Car\CarDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Car\Car;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class CarTrashedIndexProps extends BaseView
{
    public function cars()
    {
        return CarDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Car::onlyTrashed()
                    ->belongsToAuthUser()                  
                    ->IncludeCarDetail()
                    ->search(request('search'))
                    ->sort()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
