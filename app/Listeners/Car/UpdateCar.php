<?php

namespace App\Listeners\Car;

use App\Events\Car\UpdatingCar;
use App\Services\Car\CarService;
use App\Services\Shared\AddressService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\DiscountService;
use Illuminate\Support\Facades\DB;

class UpdateCar
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
     * @param  \App\Events\Car\UpdatingCar  $event
     *
     * @return void
     */
    public function handle(UpdatingCar $event)
    {
        $request = $event->validated_request;
        $car = $event->car;

        DB::transaction(function () use ($request, $car) {
            CarService::update($request, $car);
            AddressService::updateForModel($car, $request->location);
            // $request->categories ? CategoryService::for_model($car,$request->categories):null;
            $request->discount['price'] ?
            DiscountService::forModel($car, $request->discount, 'Car') : null;
            $request->images ?
            AttachmentService::addImages($request->images, $car, 'car', 300) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $car, 'car') : null;
        });
    }
}
