<?php

namespace App\Actions\Shared\Model;

use Illuminate\Database\Eloquent\Model;

class DeleteModelAction
{
    public static function delete(object $model): void
    {
        $model->delete();
    }

    public static function destroy(object $model): void
    {
        $model->forceDelete();
    }

    public static function restore(object $model, int $id): Model
    {
        $Model = $model->onlyTrashed()->find($id);
        $Model->restore();
        return $Model;
    }
}
