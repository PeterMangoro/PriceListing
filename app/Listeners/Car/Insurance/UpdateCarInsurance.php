<?php

namespace App\Listeners\Car\Insurance;


use App\Events\Car\Insurance\UpdatingCarInsurance;
use App\Services\Car\Insurance\CarInsuranceService;


class UpdateCarInsurance
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
     * @param  \App\Events\Car\UpdatingCarInsurance  $event
     *
     * @return void
     */
    public function handle(UpdatingCarInsurance $event)
    {
        $request = $event->validated_request;
        $car_insurance = $event->car_insurance;

        // DB::transaction(function () use ($request, $car_insurance) {
            CarInsuranceService::update($request, $car_insurance);
        //    });
    }
}
