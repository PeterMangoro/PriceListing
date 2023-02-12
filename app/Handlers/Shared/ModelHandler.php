<?php
namespace App\Handlers\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Services\Shared\Model\ModelService;

class ModelHandler
{
    

    public static function getPaginatedData(Model $model,?int $pagination=15)
    {
        return ModelService::getPaginatedData($model,$pagination);
    }

    public static function getUnPaginatedData(Model $model,?int $limit=15)
    {
        return ModelService::getUnPaginatedData($model,$limit);
    }

    public static function getModelForEdit(Model $model,string $uuid)
    {
        return ModelService::getEditModel($model,$uuid);
    }

    public static function getModelForDisplay(Model $model,string $uuid)
    {
        return ModelService::getDisplayModel($model,$uuid);
    }

    public static function delete(object $model)
    {
        return ModelService::delete($model);
    }

    public static function restore(Model $model,int $id):Model
    {
        return ModelService::restore($model,$id);
    }
}