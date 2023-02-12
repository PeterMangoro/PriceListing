<?php

namespace App\Models\Shared;

use App\Builders\Shared\FeatureBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Feature extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [

        'path',
        'category_type',
        'category_slug',
        'featurable_id',
        'featurable_type',
        'rating',

    ];

    public function featurable(): MorphTo
    {
        return $this->morphTo('featurable');
    }

    // public function scopeSearch($query, string $terms = null)
    // {
    //     collect(str_getcsv($terms, ' ', '"'))->filter()
    //         ->each(function ($term) use ($query) {
    //             $term =  preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

    //             $query->whereIn('id', function ($query) use ($term) {
    //                 $query->select('id')
    //                     ->from(function ($query) use ($term) {

    //                         $query->select('features.id')
    //                             ->from('features')
    //                             ->where('rating', '>', 0)
    //                             // ->orWhere('location_normalized', 'like', $term)
    //                             ->union(
    //                                 $query->newQuery()
    //                                     ->select('features.id')
    //                                     ->from('features')
    //                                     ->join('products', 'products.id', 'features.featurable_id')
    //                                     ->where('products.title_normalized', 'like', $term)
    //                             )
    //                             ;
    //                     }, 'matches');
    //             });
    //         });
    // }

    public function newEloquentBuilder($query): FeatureBuilder
    {
        return new FeatureBuilder($query);
    }
}
