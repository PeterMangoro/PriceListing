<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use App\Builders\Shared\DiscountBuilder;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



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
