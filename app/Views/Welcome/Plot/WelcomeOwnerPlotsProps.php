<?php

namespace App\Views\Welcome\Plot;

use App\DataObjects\Plot\PlotDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class WelcomeOwnerPlotsProps extends BaseView
{
    public function __construct(public object $owner)
    {
        $this->owner = $owner;
    }

    public function plots()
    {
        return PlotDisplayData::toWebPage(
            ModelHandler::getPaginatedData(
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
