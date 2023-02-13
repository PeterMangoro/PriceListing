<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class PopularBuilder extends Builder
{
    public function ofType(string $model)
    {
        return $this->where('popularable_type', 'App\Models\\' . $model);
    }

    public function ofCategoryType(string $category_type)
    {
        return $this->where('category_type', $category_type);
    }

    public function ofCategory(string $category_slug)
    {
        return $this->where('category_slug', $category_slug);
    }

    public function orderByPageVisits()
    {
        return $this->latest('page_visits');
    }

    // public function fromSameCity($city)
    // {
    //     return $this->with(['popularable' => function ($query)use($city) {
    //         $query
    //             ->fromSameCity($city);
    //     }]);
    // }

    public function withRelatedModels()
    {
        return $this->with(['popularable' => function ($query) {
            $query
                ->selectMinAttributes()
                ->withActiveDiscountPrice()
                ->withAddress();
        },
        ]);
    }

    public function withRelatedDisplayImage()
    {
        return $this->with(['popularable' => function ($query) {
            $query
                ->selectMinAttributes()
                ->withDisplayImage()
                ->withActiveDiscountPrice()
                ->withAddress()
                ->search(request('search'));
        },
        ])
            ->whereRelation('popularable', function ($query) {
                $query
                    ->selectMinAttributes()
                    ->search(request('search'));
            });
    }
}
