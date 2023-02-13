<?php

namespace App\Models\Shared;

use App\Builders\Shared\PaymentBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Payment extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'amount',
        'status',
        'service',
        'payable_id',
        'payable_type',
    ];

    public function newEloquentBuilder($query)
    {
        return new PaymentBuilder($query);
    }

    public function payable(): MorphTo
    {
        return $this->morphTo('payable');
    }

    public function buyer()
    {
        return $this->hasOne(RoomUser::class);
    }
}
