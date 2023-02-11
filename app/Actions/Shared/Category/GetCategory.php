<?php

namespace App\Actions\Shared\Category;

use Illuminate\Support\Collection;

class GetCategory
{
    public static function types(object $data): Collection
    {
        return $data
            ->toBase()
            ->get()
            ->sortBy('type')
            ->pluck('type')
            ->unique()
            ->map(
                fn ($type) => [
                    'title' => ucwords(
                        preg_replace('/[_]/', ' ', $type)
                    ),
                    'type' => $type,
                ]
            );
    }
}
