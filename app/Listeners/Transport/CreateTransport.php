<?php

namespace App\Listeners\Transport;

use App\Events\Transport\CreatingTransport;
use App\Models\Car\Car;
use App\Services\Car\CarService;
use App\Services\Shared\AttachmentService;
use App\Services\Transport\TransportService;
use Illuminate\Support\Facades\DB;

class CreateTransport
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
     * @param  \App\Events\Transport\CreatingTransport  $event
     *
     * @return void
     */
    public function handle(CreatingTransport $event)
    {
        $request = $event->validated_request;
        $carService = new CarService();
        $transportService = new TransportService();
        $attachmentService = new AttachmentService();

        if ($request->choice === 'add_car') {
            //create a new car
            DB::transaction(function () use (
                $carService,
                $transportService,
                $request,
                $attachmentService
            ) {
                $car_id = $carService->create($request);
                $car = Car::find($car_id);
                $attachmentService->addImages($request->images, $car, 'car', 600);
                $transportService->create($request, $car_id);
            });
        }
        //user choose an owned car
        else {
            $transportService->create($request);
        }
    }
}
