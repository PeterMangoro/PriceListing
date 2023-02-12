<?php

namespace App\Views\Services;

use App\Models\Service;
use App\View\Shared\BaseView;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\DataObjects\Service\Partials\ServiceForUpdate;

class ServiceEditProps extends BaseView
{
    public Service $service;

    public function __construct(public string $uuid)
    {
        $this->uuid = $uuid;
        $this->service = ServiceForUpdate::from(ModelHandler::getModelForEdit(new Service(),$this->uuid));
       
    }

    public function service()
    {       
        return $this->service;
    }

   

    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new ServiceCategory())
            ->sortBy('type')
            ->groupBy('type');
    }
}
