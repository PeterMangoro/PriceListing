<?php

namespace App\Builders\Shared;

use App\Models\Accommodation;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class DiscountBuilder extends Builder
{
    public function ofType(string $model)
    {
        return $this->where('discountable_type', 'App\Models\\' . $model);
    }

    // public function lodgesOfCategoryType(string $category_type)
    // {
    //     return $this->with(['discountable' => function ($query) use ($category_type) {
    //         $query
    //         ->selectMinAttributes()
    //         ->ofCategoryType($category_type)
    //         ->withAddress()
    //         ->forLodges();
    //     }]);
    // }

    // public function lodgesOfCategoryType(object $model,string $category_type)
    // {
    //     return $this->with(['discountable' => function (MorphTo $morphTo) use($model,$category_type) {
    //         $morphTo->constrain([
    //             $model => function (Builder $query) use($category_type) {
    //                 $query
    //                 ->selectMinAttributes()
    //                 ->ofCategoryType($category_type)
    //                 ->withAddress()
    //                 ->forLodges()
    //                 ;
    //             }

    //         ]);
    //     }]);
    // }

    public function ofCategoryType(string $category_type)
    {
        return $this->with(['discountable' => function ($query) use ($category_type) {
            $query
                ->selectMinAttributes()
                ->ofCategoryType($category_type)
                ->withAddress();
        },
        ]);
    }

    // public function fromSameCity($city)
    // {
    //     return $this->with(['discountable' => function ($query)use($city) {
    //         $query
    //             ->fromSameCity($city);
    //     }]);
    // }

    public function forLodges()
    {
        return $this->with(['discountable' => function (MorphTo $morphTo) {
            $morphTo->constrain([
                Accommodation::class => function (Builder $query) {
                    $query
                        ->forLodges()
                    ;
                },

            ]);
        },
        ]);
    }

    public function withActiveDiscountPrice()
    {
        return $this->where('exp_date', '>', now());
    }

    public function ofCategory(string $category_slug)
    {
        return $this->with(['discountable' => function ($query) use ($category_slug) {
            $query
                ->selectMinAttributes()
                ->classifiedUnder($category_slug)
                ->withAddress();
        },
        ]);
    }

    public function orderByExpDate()
    {
        return $this->latest('exp_date');
    }

    public function withRelatedModels()
    {
        return $this->with(['discountable' => function ($query) {
            $query->selectMinAttributes();
        },
        ]);
    }

    public function withRelatedDisplayImage()
    {
        return $this->with(['discountable' => function ($query) {
            $query
                ->selectMinAttributes()
                ->withDisplayImage()
                ->withAddress()
                ->search(request('search'))
            ;
        },
        ])
            ->whereRelation('discountable', function ($query) {
                $query->selectMinAttributes()->withDisplayImage()->search(request('search'));
            });
    }
}
