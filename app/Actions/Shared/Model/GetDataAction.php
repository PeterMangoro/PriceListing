<?php

namespace App\Actions\Shared\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetDataAction
{
    public static function fetchUnpaginatedModels(
        object $data,
        ?int $limit = 50
    ): Collection {
        return $data
            ->whereActive()
            ->withDisplayImage()
            ->withActiveDiscountPrice()
            // ->inRandomOrder()  #It slowed down performance
            ->limit($limit)
            ->get()
            ->random(
                fn ($items) => min($limit, count($items))
            );
    }

    public static function fetchDisplayModelByUUID(
        object $data,
        string $uuid
    ): Model {
        return $data
            ->whereUUIDmatches($uuid)
            ->withUserSocialAccounts()
            ->withRatings()
            ->withActiveDiscountPrice()
            ->withAddress()
            ->withImages()
            ->withDocuments()
            ->first();
    }

    public static function fetchEditModelByUUID(
        object $data,
        string $uuid
    ): Model {
        return $data
            ->whereUUIDmatches($uuid)
            ->selectDetailAttributes()
            ->withImages()
            ->withDocuments()
            ->withTrashedImages()
            ->withTrashedDocuments()
            ->withCategories()
            ->withAddress()
            ->withDiscountPrice()
            ->first();
    }

    public static function fetchPaginatedModels(
        object $data,
        int $per_page = 9
    ): LengthAwarePaginator {
        $paginate = request('per_page') ?: $per_page;
        return $data
            ->whereActive()
            ->selectMinAttributes()
            ->withDisplayImage()
            ->withActiveDiscountPrice()
            ->withAddress()
            ->search(request('search'))
            ->paginate($paginate)
            ->withQueryString();
    }
}
