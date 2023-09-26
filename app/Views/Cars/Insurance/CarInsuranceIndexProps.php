<?php

namespace App\Views\Cars\Insurance;

use App\Models\Car\Car;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Car\CarDisplayData;
use App\DataObjects\Car\Insurance\CarInsuranceDisplayData;
use App\Models\CarInsurance;

class CarInsuranceIndexProps extends BaseView
{
    public function insurances()
    {
        return CarInsuranceDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                 CarInsurance::belongsToAuthUser()
                    
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
