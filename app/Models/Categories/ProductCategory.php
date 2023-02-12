<?php

namespace App\Models\Categories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use App\Builders\Product\ProductCategoryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class ProductCategory extends Model
{
    use HasFactory;
    protected $hidden = [
        'pivot',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_classifications');
    }

    public function newEloquentBuilder($query): ProductCategoryBuilder
    {
        return new ProductCategoryBuilder($query);
    }
}
