<?php

namespace App\Actions\Shared\Feature;

use Illuminate\Support\Collection;

class GetFeaturedModels
{
    ##Integrate this to Shared/Model/getModels

    public static function ofType(
        object $data,
        string $model
    ): Collection {
        return $data
            ->ofType($model)
            ->withRelatedModels()
            ->get()
            // ->pluck('featurable')
        ;
    }

    public static function withDisplayImageOfType(
        object $data,
        string $model
    ): Collection {
        return $data
            ->ofType($model)
            ->withRelatedDisplayImage()
            ->get()
            // ->pluck('featurable')
        ;
    }

    public static function forPaginatedDisplayOfType(
        object $data,
        string $model,
        ?int $paginate = 18
    ): Collection {
        return $data
            ->ofType($model)
            ->withRelatedDisplayImage()
            ->paginate($paginate)
            ->withQueryString();
    }
}
