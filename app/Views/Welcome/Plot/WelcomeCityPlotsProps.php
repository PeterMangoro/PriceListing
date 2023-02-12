<?php

namespace App\View\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\Models\Mall\Plot;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeCityPlotsProps extends BaseView
{
    public function __construct(public string $city)
    {
        $this->city = $city;
    }

    public function plots()
    {
        return PlotDisplayData::to_web_page(
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
