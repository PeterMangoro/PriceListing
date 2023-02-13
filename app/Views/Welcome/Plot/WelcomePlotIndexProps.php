<?php

namespace App\Views\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\Models\Plot;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomePlotIndexProps extends BaseView
{
    public function plots()
    {
        return PlotDisplayData::toWebPage(
            PlotHandler::get_paginated_plots(
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
