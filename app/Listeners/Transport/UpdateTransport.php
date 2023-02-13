<?php

namespace App\Listeners\Transport;

use App\Events\Transport\UpdatingTransport;
use App\Models\Car\Car;
use App\Services\Shared\AttachmentService;
use App\Services\Transport\TransportService;
use Illuminate\Support\Facades\DB;

class UpdateTransport
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
     * @param  \App\Events\Transport\UpdatingTransport  $event
     *
     * @return void
     */
    public function handle(UpdatingTransport $event)
    {
        $request = $event->validated_request;
        $transport = $event->transport;

        $transportService = new TransportService();
        $attachmentService = new AttachmentService();
        $car_id = $event->validated_request->car_id;

        DB::transaction(function () use (
            $transportService,
            $request,
            $car_id,
            $transport,
            $attachmentService
        ) {
            $car = Car::find($car_id);
            $transportService->update($request, $transport);

            if ($request->images) {
                // dd($car_id);
                $attachmentService->addImages($request->images, $car, 'car', 300);
            }
        });
    }
}
