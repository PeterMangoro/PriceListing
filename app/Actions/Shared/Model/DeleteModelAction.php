<?php

namespace App\Actions\Shared\Model;

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
}
