<?php

namespace App\View\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\Models\Plot;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomePlotIndexProps extends BaseView
{
    public function plots()
    {
        return PlotDisplayData::to_web_page(
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
