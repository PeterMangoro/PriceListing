<?php

namespace App\Listeners\Car\Insurance;


use App\Events\Car\Insurance\CreatingCarInsurance;
use App\Services\Car\Insurance\CarInsuranceService;

class CreateCarInsurance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Car\CreatingCar  $event
     *
     * @return void
     */
    public function handle(CreatingCarInsurance $event)
    {
        $request = $event->validated_request;
        // DB::transaction(function () use ($request) {
            $car_id = CarInsuranceService::create($request);
            
            // });
    }
}
