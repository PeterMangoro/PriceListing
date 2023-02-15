<?php

namespace App\Handlers\Shared;

use App\Services\Shared\Model\ModelService;
use Illuminate\Database\Eloquent\Model;

class ModelHandler
{
    public static function getPaginatedData(object $model, ?int $pagination = 15)
    {
        return ModelService::getPaginatedData($model, $pagination);
    }

    public static function getUnPaginatedData(object $model, ?int $limit = 15)
    {
        return ModelService::getUnPaginatedData($model, $limit);
    }

    public static function getModelForEdit(Model $model, string $uuid)
    {
        return ModelService::getEditModel($model, $uuid);
    }

    public static function getModelForDisplay(object $model, string $uuid)
    {
        return ModelService::getDisplayModel($model, $uuid);
    }

    public static function getPaginatedNoneAdvertModels(object $data, ?int $pagination = 10)
    {
        return ModelService::getNoneAdvertModels($data, $pagination);
    }
    public static function delete(object $model)
    {
        return ModelService::delete($model);
    }

    public static function restore(Model $model, int $id): Model
    {
        return ModelService::restore($model, $id);
    }
}
