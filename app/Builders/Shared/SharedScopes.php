<?php

namespace App\Builders\Shared;

use Illuminate\Support\Facades\Auth;

trait SharedScopes
{
    public function scopeBelongsToAuthUser($query)
    {
        return $query->whereRelation('user', 'users.id', Auth::user()->id);
    }

    public function scopeSort($query)
    {
        return $query->when(request('column'), function ($query) {
            $query->orderBy(request('column'), request('direction'));
        });
    }

    public function scopeWhereActive($query)
    {
        return $query->where('sale_status', 1);
    }

    public function scopeWithUserSocialAccounts($query)
    {
        return $query
            ->with(['user' => function ($query) {
                $query
                    ->withSocialAccounts()
                    ->select(
                        'id',
                        'name',
                        'username'
                    );
            },
            ]);
    }

    public function scopeWithRatings($query)
    {
        return $query
            ->with(['ratings' => function ($query) {
                $query->select(
                    'ratingable_id',
                    'rating',
                    'comment',
                    'user_id'
                )
                    ->latest('id')
                    ->with('user:id,name');
            },
            ]);
    }

    public function scopeWhereUUIDmatches($query, $uuid)
    {
        return $query->where('uuid', $uuid);
    }

    public function scopeWithImages($query)
    {
        return $query
            ->with(['attachments' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                )
                    ->where('type', 'image')
                    ->latest('id');
            },
            ]);
    }

    public function scopeWithDocuments($query)
    {
        return $query
            ->with(['documents' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'uuid',
                    'title',
                    'id'
                )

                    ->latest('id');
            },
            ]);
    }

    public function scopeWithTrashedImages($query)
    {
        return $query
            ->with(['trashed_attachments' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                    'deleted_at'
                )
                    ->where('type', 'image')
                    ->latest('id');
            },
            ]);
    }

    public function scopeWithTrashedDocuments($query)
    {
        return $query
            ->with(['trashed_documents' => function ($query) {
                $query->select(
                    'attachmentable_id',
                    'path',
                    'id',
                    'uuid',
                    'deleted_at',
                    'title',
                )
                    ->latest('id');
            },
            ]);
    }

    public function scopeBelongsToOwner($query, $owner_id)
    {
        return $query->where('user_id', $owner_id);
    }

    public function scopeWithDisplayImage($query)
    {
        return $query->with('latestImage:id,attachments.attachmentable_id,path');
    }

    public function scopeWithLatestPrice($query)
    {
        return $query->with('latestPrice:id,prices.pricable_id,amount');
    }
    public function scopeClassifiedUnder($query, $slug)
    {
        return $query->whereRelation('categories', 'slug', $slug);

        //      return
        //     $query->whereIn('id',function($query)use($slug) {
        //     $query
        // ->join('product_categories','product_categories.id','product_classifications.product_category_id')
        // ->where('product_categories.slug',$slug)
        // ->select('product_id')->from('product_classifications')
        // ;
        // });
    }

    public function scopeOfCategoryType($query, $type)
    {
        return $query->whereRelation('categories', 'type', $type);

            //     dd (
        // return
            //     $query->whereIn('id',function($query)use($type) {
            //     $query
        // ->join('product_categories','product_categories.id','product_classifications.product_category_id')
        // ->where('product_categories.type',$type)
        // ->select('product_id')->from('product_classifications')
        // ;
        // })
        // )
    }

    public function scopeWithAddress($query)
    {
        return $query->with(['address' => function ($query) {
            $query->select(
                'addressable_id',
                'street',
                'town',
                'city',
                'country'
            );
        },
        ]);
    }

    public function scopeOrderByPageVisits($query)
    {
        return $query->latest('page_visits');
    }

    public function scopeWithDiscountPrice($query)
    {
        return $query->with('discount:discountable_id,price,exp_date');
    }

    public function scopeWithActiveDiscountPrice($query)
    {
        return $query->with([
            'discount' => function ($query) {
                $query
                    ->select(
                        'discountable_id',
                        'price',
                        'exp_date'
                    )
                    ->where('exp_date', '>', now());
            },

        ])

        ;
    }

    public function scopeWithCategories($query)
    {
        return $query->with('categories:id,title');
    }
}
