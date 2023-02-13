<?php

namespace App\Listeners\Plot;

use App\Events\Plot\UpdatingPlot;
use App\Services\Plot\PlotService;
use App\Services\Shared\AddressService;
use App\Services\Shared\AttachmentService;
use Illuminate\Support\Facades\DB;

class UpdatePlot
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
     * @param  \App\Events\Plot\UpdatingPlot  $event
     *
     * @return void
     */
    public function handle(UpdatingPlot $event)
    {
        $validated_request = $event->validated_request;
        $plot = $event->plot;

        DB::transaction(function () use ($validated_request, $plot) {
            PlotService::update($validated_request, $plot);
            AddressService::updateForModel(
                $plot,
                $validated_request->location
            );
            $validated_request->images ? AttachmentService::addImages(
                $validated_request->images,
                $plot,
                'plot',
                300
            ) : null;
            $validated_request->document ? AttachmentService::addDocument(
                $validated_request->document,
                $plot,
                'plot'
            ) : null;
        });
    }
}
