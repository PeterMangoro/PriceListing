<?php

namespace App\Views\Services;

use App\DataObjects\Service\Partials\ServiceForUpdate;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ServiceCategory;
use App\Models\Service;
use App\Views\Shared\BaseView;

class ServiceEditProps extends BaseView
{
    

    public function __construct(
        public string $uuid,
        public ?object $service = null,
        public ?object $categories = null
    ) {
        $this->uuid = $uuid;
        $this->service = serviceForUpdate::from(
            ModelHandler::getModelForEdit(
                new service(),
                $this->uuid
            )
        );
        $this->categories = $this->service->categories;
    }

    public function service()
    {
        return $this->service;
    }

    public function category_types()
    {
        return CategoryHandler::getAllCategories(
            new ServiceCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
