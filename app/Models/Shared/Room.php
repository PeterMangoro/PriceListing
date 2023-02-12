<?php

namespace App\Models\Shared;

use App\Models\SharedModel;
use App\Models\Shared\RoomUser;
use App\Builders\Accommodation\RoomBuilder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Room extends SharedModel
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'detail',
        'sale_status',
        'type',

    ];

    public function newEloquentBuilder($query)
    {
        return new RoomBuilder($query);
    }

    public function room_users()
    {
        return $this->hasMany(RoomUser::class);
    }

    public function guest()
    {
        return $this->hasOne(RoomUser::class)->latestOfMany('id');
    }

    public function roomable(): MorphTo
    {
        return $this->morphTo('roomable');
    }
}
