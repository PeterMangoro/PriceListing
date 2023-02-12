<?php

namespace App\Models\Shared;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Price extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'amount',

    ];

    public function pricable(): MorphTo
    {
        return $this->morphTo('pricable');
    }
}
