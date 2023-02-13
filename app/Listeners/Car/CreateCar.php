<?php

namespace App\Listeners\Car;

use App\Events\Car\CreatingCar;
use App\Models\Car\Car;
use App\Services\Car\CarService;
use App\Services\Shared\AddressService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\CategoryService;
use Illuminate\Support\Facades\DB;

class CreateCar
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
    public function handle(CreatingCar $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $car_id = CarService::create($request);
            $car = Car::find($car_id);
            AttachmentService::addImages($request->images, $car, 'car', 300);
            AddressService::addForModel($car, $request->location);
            $request->categories ?
            CategoryService::forModel($car, $request->categories) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $car, 'car') : null;
        });
    }
}
