<?php

namespace App\Views\Plots;

use App\Models\Plot;
use App\View\Shared\BaseView;
use App\DataObjects\Plot\Partials\PlotForUpdate;
use App\Handlers\Shared\ModelHandler;

class PlotEditProps extends BaseView
{
    public function __construct(public $uuid)
    {
        $this->uuid = $uuid;
    }

    public function plot()
    {
        return PlotForUpdate::from(
            ModelHandler::getModelForEdit(
                new Plot(), $this->uuid));
    }

   
}
