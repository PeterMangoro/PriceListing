<?php

namespace App\Views\Services;

use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Service;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class ServiceIndexProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Service::belongsToOwner()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
