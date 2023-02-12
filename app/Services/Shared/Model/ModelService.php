<?php

namespace App\Services\Shared\Model;

use App\Actions\Shared\Model\DeleteModelAction;
use App\Actions\Shared\Model\GetDataAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ModelService
{
    public static function getPaginatedData(
        object $model,
        int $per_page
    ): LengthAwarePaginator {
        return GetDataAction::fetchPaginatedModels(
            $model,
            $per_page
        );
    }

    public static function getUnpaginatedData(
        object $model,
        ?int $limit = 9
    ): Collection {
        return GetDataAction::fetchUnpaginatedModels(
            $model,
            $limit
        );
    }

        public static function getDisplayModel(
            object $model,
            string $uuid
        ): Model {
            return GetDataAction::fetchDisplayModelByUUID(
                $model,
                $uuid
            );
        }

    public static function getEditModel(
        object $model,
        string $uuid
    ): Model {
        return GetDataAction::fetchEditModelByUUID(
            $model,
            $uuid
        );
    }

    public static function delete(object $model): void
    {
        DeleteModelAction::delete($model);
    }

    public static function destroy(object $model): void
    {
        DeleteModelAction::destroy($model);
    }

    public static function restore(object $model,int $id): Model
    {
        return DeleteModelAction::restore($model,$id);
    }
}
