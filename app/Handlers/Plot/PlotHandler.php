<?php

namespace App\Handlers\Plot;

use App\DataObjects\Plot\PlotData;
use App\Events\Plot\CreatingPlot;
use App\Events\Plot\UpdatingPlot;
use App\Http\Requests\Plot\CreatePlotRequest;
use App\Http\Requests\Plot\UpdatePlotRequest;

class PlotHandler
{
    public static function store(CreatePlotRequest $request)
    {
        $validated_object = PlotData::fromRequest($request);

        event(new CreatingPlot($validated_object));
    }

    public static function update(UpdatePlotRequest $request, string $uuid)
    {
        $validated_object = PlotData::fromRequest($request);
        event(new UpdatingPlot($validated_object, $uuid));
    }
}
