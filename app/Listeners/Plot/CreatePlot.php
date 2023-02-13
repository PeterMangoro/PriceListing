<?php

namespace App\Listeners\Plot;

use App\Events\Plot\CreatingPlot;
use App\Models\Plot;
use App\Services\Plot\PlotService;
use App\Services\Shared\AddressService;
use App\Services\Shared\AttachmentService;
use Illuminate\Support\Facades\DB;

class CreatePlot
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
     * @param  \App\Events\Plot\CreatingPlot  $event
     *
     * @return void
     */
    public function handle(CreatingPlot $event)
    {
        $validated_request = $event->validated_request;
        DB::transaction(function () use ($validated_request) {
            $plot_id = PlotService::create($validated_request);
            $plot = Plot::find($plot_id);
            AddressService::addForModel(
                $plot,
                $validated_request->location
            );
            $validated_request->images ?
            AttachmentService::addImages(
                $validated_request->images,
                $plot,
                'plot',
                300
            ) : null;
            $validated_request->document ?
            AttachmentService::addDocument($validated_request->document, $plot, 'plot') : null;
        });
    }
}
