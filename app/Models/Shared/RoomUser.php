<?php

namespace App\Models\Shared;

use App\Models\User;
use App\Models\Shared\Room;
use App\Models\Shared\Payment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomUser extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'payment_id',
        'guest',
        'room_id',
        'user_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
