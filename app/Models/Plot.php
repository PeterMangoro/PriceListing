<?php

namespace App\Models;

use App\Models\SharedModel;
use App\ValueObjects\Category;
use App\Builders\Plot\PlotBuilder;

class Plot extends SharedModel
{
    protected $guarded = [];
    protected $fillable = [
        'location',
        'size',
        'price',
        'detail',
        'sale_status',
    ];

    // public function categories(): BelongsToMany
    // {
    //     return $this->belongsToMany(Category::class ,'classifications');
    // }
    /**
     * groups the user wants the service to be shown in
     *
     * @return void
     */

    public function scopeSearch($query, ?string $terms = null)
    {
        collect(str_getcsv($terms, ' ', '"'))->filter()
            ->each(function ($term) use ($query) {
                $term = preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('id')
                                ->from('plots')
                                ->where('location', 'like', $term)
                                ->union(
                                    $query->newQuery()
                                        ->select('plots.id')
                                        ->from('plots')
                                        ->join('addresses', 'addresses.addressable_id', 'plots.id')
                                        ->where('addresses.city', 'like', $term)
                                        ->where('addresses.addressable_type', 'App\Models\Plot')
                                )
                            ;
                        }, 'matches');
                });
            });
    }

    public function newEloquentBuilder($query): PlotBuilder
    {
        return new PlotBuilder($query);
    }
}
