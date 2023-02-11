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
        object $data,
        int $per_page
    ): LengthAwarePaginator {
        return GetDataAction::fetchPaginatedModels(
            $data,
            $per_page
        );
    }

    public static function getUnpaginatedData(
        object $data,
        ?int $limit = 9
    ): Collection {
        return GetDataAction::fetchUnpaginatedModels(
            $data,
            $limit
        );
    }

        public static function getDisplayModel(
            object $data,
            string $uuid
        ): Model {
            return GetDataAction::fetchDisplayModelByUUID(
                $data,
                $uuid
            );
        }

    public static function getEditModel(
        object $data,
        string $uuid
    ): Model {
        return GetDataAction::fetchEditModelByUUID(
            $data,
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
}
