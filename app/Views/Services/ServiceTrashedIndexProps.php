<?php

namespace App\Views\Services;

use App\Models\Service;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\DataObjects\Service\ServiceDisplayData;
use App\Handlers\Shared\ModelHandler;

class ServiceTrashedIndexProps extends BaseView
{
    public function services()
    {
        return ServiceDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Service::onlyTrashed()->belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
