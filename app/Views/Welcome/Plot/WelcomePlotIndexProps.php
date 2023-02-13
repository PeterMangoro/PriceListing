<?php

namespace App\Views\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Plot;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

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
