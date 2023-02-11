<?php

namespace App\Actions\Plot;

class UpdatePlotAction
{
    public static function handle(
        object $request,
        object $plot
    ): void {
        $plot->location = $request->location;
        $plot->size = $request->size;
        $plot->price = $request->price;
        $plot->detail = $request->detail;
        $plot->save();
    }
}
