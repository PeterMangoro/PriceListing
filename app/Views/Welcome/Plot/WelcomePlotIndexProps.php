<?php

namespace App\Views\Welcome\Plot;

use App\Models\Plot;
use App\Views\Shared\Filters;
use App\Views\Shared\BaseView;
use App\Handlers\Plot\PlotHandler;
use App\Handlers\Shared\ModelHandler;
use App\DataObjects\Plot\PlotDisplayData;

class WelcomePlotIndexProps extends BaseView
{
    public function plots()
    {
        return PlotDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
                new Plot(),
                15
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
