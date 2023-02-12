<?php

namespace App\Services\Plot;

use App\Actions\Plot\CreatePlotAction;
use App\Actions\Plot\UpdatePlotAction;



class PlotService
{
    public static function create(object $request): int
    {
        return CreatePlotAction::handle($request);
    }

    public static function update($request, $plot): void
    {
        UpdatePlotAction::handle($request, $plot);
    }
}
