<?php

namespace App\Views\Plots;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Plot;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class PlotIndexProps extends BaseView
{
    public function plots()
    {
        return PlotDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Plot::belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
