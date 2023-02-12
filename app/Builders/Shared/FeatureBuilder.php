<?php

namespace App\Builders\Shared;

use Illuminate\Database\Eloquent\Builder;

class FeatureBuilder extends Builder
{
    public function ofType(string $model)
    {
        return $this->where('featurable_type', 'App\Models\Mall\\' . $model);
    }

    public function ofCategoryType(string $category_type)
    {
        return $this->where('category_type', $category_type);
    }

    public function ofCategory(string $category_slug)
    {
        return $this->where('category_slug', $category_slug);
    }

    public function orderByRating()
    {
        return $this->latest('rating');
    }

    public function withRelatedModels()
    {
        return $this->with(['featurable' => function ($query) {
            $query
                ->selectMinAttributes()
                ->withActiveDiscountPrice()
                ->withAddress();
        },
        ]);
    }

    // public function fromSameCity($city)
    // {
    //     return $this->with(['featurable' => function ($query)use($city) {
    //         $query
    //             ->fromSameCity($city);
    //     }]);
    // }

    public function withRelatedDisplayImage()
    {
        return $this->with(['featurable' => function ($query) {
            $query
                ->selectMinAttributes()
                ->withDisplayImage()
                ->withAddress()
                ->withActiveDiscountPrice()
                ->search(request('search'));
        },
        ])
            ->whereRelation('featurable', function ($query) {
                $query
                    ->selectMinAttributes()
                    ->search(request('search'));
            });
    }
}
