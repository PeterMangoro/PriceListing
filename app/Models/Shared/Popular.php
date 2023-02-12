<?php

namespace App\Models\Shared;

use App\Builders\Shared\PopularBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Popular extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [

        'popularable_id',
        'popularable_type',
        'category_type',
        'category_slug',
        'page_visits',

    ];

    public function popularable(): MorphTo
    {
        return $this->morphTo('popularable');
    }

    public function newEloquentBuilder($query): PopularBuilder
    {
        return new PopularBuilder($query);
    }
}
