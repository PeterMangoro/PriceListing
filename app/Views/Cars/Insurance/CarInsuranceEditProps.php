<?php

namespace App\Views\Cars\Insurance;

use App\DataObjects\Car\Insurance\Partials\CarInsuranceForUpdate;
use App\Handlers\Shared\ModelHandler;
use App\Models\CarInsurance;
use App\Views\Shared\BaseView;

class CarInsuranceEditProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $car_insurance = null,        
    ) {
        $this->uuid = $uuid;

        $this->car_insurance = CarInsuranceForUpdate::from(
            ModelHandler::getModelForEdit(
                new CarInsurance(),
                $this->uuid
            )
        );
       
    }

    public function carInsurance()
    {
        return $this->car_insurance;
    }
   
}
