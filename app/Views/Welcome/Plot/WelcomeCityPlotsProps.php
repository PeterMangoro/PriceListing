<?php

namespace App\Views\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\Models\Plot;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeCityPlotsProps extends BaseView
{
    public function __construct(public string $city)
    {
        $this->city = $city;
    }

    public function plots()
    {
        return PlotDisplayData::toWebPage(
            PlotHandler::get_paginated_plots(
                Plot::fromSameLocation($this->city),
                15
            )
        );
    }

    public function city()
    {
        return $this->city;
    }

    public function filters()
    {
        return Filters::filters();
    }
}
