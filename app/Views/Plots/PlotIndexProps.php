<?php

namespace App\Views\Plots;

use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\Handlers\Plot\PlotHandler;
use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Plot;

class PlotIndexProps extends BaseView
{
    public function plots()
    {
        return PlotDisplayData::toOwnerDisplay(ModelHandler::getPaginatedData(
            Plot::belongsToAuthUser()
        ));
    }

    public function filters()
    {
        return Filters::filters();
    }
}
