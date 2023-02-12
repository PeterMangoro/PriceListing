<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Address extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'path',
        'street',
        'town',
        'city',
        'city_slug',
        'country',
    ];

    public function addressable(): MorphTo
    {
        return $this->morphTo('addressable');
    }
}
