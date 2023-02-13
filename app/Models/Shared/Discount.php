<?php

namespace App\Models\Shared;

use App\Builders\Shared\DiscountBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'exp_date',
    ];

    public function discountable(): MorphTo
    {
        return $this->morphTo('discountable');
    }

    public function newEloquentBuilder($query): DiscountBuilder
    {
        return new DiscountBuilder($query);
    }
}
