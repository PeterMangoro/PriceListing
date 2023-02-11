<?php

namespace App\Actions\Shared\Popular;

use App\Models\Shared\Popular;
use App\Support\Collection as PaginateCollection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetPopularModels
{
    public static function ofType(string $model): Collection
    {
        return Popular::ofType($model)
            ->withRelatedModels()
            ->get()
            ->pluck('popularable');
    }

    public static function withDisplayImageOfType(string $model): Collection
    {
        return Popular::ofType($model)
            ->withRelatedDisplayImage()
            ->get()
            ->pluck('popularable');
    }

    public static function forPaginatedDisplayOfType(
        object $data,
        string $model,
        ?int $paginate = 18
    ): LengthAwarePaginator {
        $products = $data->ofType($model)
            ->withRelatedDisplayImage()
            ->get()
            ->pluck('popularable');
        return (new PaginateCollection($products))
            ->paginate($paginate)
            ->withQueryString();
    }
}
