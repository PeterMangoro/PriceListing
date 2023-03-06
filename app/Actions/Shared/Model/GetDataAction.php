<?php

namespace App\Actions\Shared\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class GetDataAction
{
    public static function fetchUnpaginatedModels(
        object $model,
        ?int $limit = 50
    ): Collection {
        return $model
            ->whereActive()
            ->withDisplayImage()
            ->withActiveDiscountPrice()
            // ->inRandomOrder()  #It slowed down performance
            ->limit($limit)
            ->get()         
            ->shuffle();
    }

    public static function fetchDisplayModelByUUID(
        object $model,
        string $uuid
    ): Model {
        $display= $model
            ->whereUUIDmatches($uuid)
            ->withUserSocialAccounts()
            ->withRatings()
            ->withActiveDiscountPrice()
            // ->withAddress()
            ->withImages()
            ->withDocuments()
            ->first();

            $display->increment('page_visits'); #page visit counter

            return $display;
    }

    public static function fetchEditModelByUUID(
        object $model,
        string $uuid
    ): Model {
        return $model
            ->whereUUIDmatches($uuid)
            ->selectDetailAttributes()
            ->withImages()
            ->withDocuments()
            ->withTrashedImages()
            ->withTrashedDocuments()
            ->withCategories()
            ->withAddress()
            ->withDiscountPrice()
            ->belongsToAuthUser()
            ->first();
    }

    public static function fetchPaginatedModels(
        object $model,
        int $per_page = 9
    ): LengthAwarePaginator {
        $paginate = request('per_page') ?: $per_page;
        return $model
            ->latest('id')
            ->sort()
            ->withDisplayImage()
            ->withActiveDiscountPrice()
            ->withAddress()
            ->search(request('search'))
            ->paginate($paginate)
            ->withQueryString();
    }

    public static function fetchNoneAdvertModels($data, ?int $pagination = 10)
    {
        $paginate = request('per_page') ?: $pagination;
        return $data
            ->belongsToAuthUser()
            ->search(request('search'))
            ->sort()
            ->selectDetailAttributes()
          
            ->latest('updated_at', 'created_at')
            ->paginate($paginate)
            ->withQueryString();
    }
}
