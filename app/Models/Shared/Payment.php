<?php

namespace App\Models\Shared;

use App\Models\Shared\RoomUser;
use App\Builders\Shared\PaymentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



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
