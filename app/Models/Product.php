<?php

namespace App\Models;

use App\Builders\Product\ProductBuilder;
use App\Models\Categories\ProductCategory;
use App\Models\Shared\SharedModel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends SharedModel
{
    protected $fillable = [
        'title',
        'price',
        'detail',
        'sale_status',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(ProductCategory::class, 'product_classifications', );
    }

    // public function scopeSearch($query, string $terms = null)
    // {
    //     collect(str_getcsv($terms, ' ', '"'))->filter()
    //         ->each(function ($term) use ($query) {
    //             $term =  preg_replace('/[^A-Za-z0-9]/', '', $term) . '%';

    //             $query->whereIn('id', function ($query) use ($term) {
    //                 $query->select('id')
    //                     ->from(function ($query) use ($term) {

    //                         $query->select('id')
    //                             ->from('products')
    //                             ->where('title_normalized', 'like', $term)
    //                             ->union(
    //                                 $query->newQuery()
    //                                     ->select('products.id')
    //                                     ->from('products')
    //                                     ->join('users', 'users.id', 'products.user_id')
    //                                     ->where('users.name_normalized', 'like', $term)
    //                             );
    //                     }, 'matches');
    //             });
    //         });
    // }

    public function newEloquentBuilder($query): ProductBuilder
    {
        return new ProductBuilder($query);
    }
}
