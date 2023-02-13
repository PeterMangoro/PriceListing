<?php

namespace App\DataObjects\Plot;

use App\DataObjects\Plot\Partials\PlotClientDisplay;
use App\DataObjects\Plot\Partials\PlotUserDisplay;

class PlotDisplayData
{
    public static function toWebPage($plots)
    {
        return $plots->through(
            fn ($plot) => PlotClientDisplay::data($plot)
        );
    }

    public static function collectionToWebPage($plots)
    {
        return $plots->map(
            fn ($plot) => PlotClientDisplay::data($plot)
        );
    }

    public static function toOwnerDisplay($plots)
    {
        return $plots->through(
            fn ($plot) => PlotUserDisplay::data($plot)
        );
    }
}
