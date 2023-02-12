<?php

namespace App\View\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Plot\PlotHandler;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class WelcomeOwnerPlotsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function plots()
    {
        return PlotDisplayData::to_web_page(
            PlotHandler::get_paginated_plots(
                $this->owner->plots(),
                15
            )
        );
    }

    public function owner()
    {
        return [
            'username' => $this->owner->username,
            'name' => $this->owner->name,
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
