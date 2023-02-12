<?php

namespace App\Services\Accommodation;

use App\Actions\Accommodation\Room\AddRoom;
use Illuminate\Database\Eloquent\Model;

class RoomService
{
    public static function addRoomForModel(object $model, object $request):Model
    {
        return AddRoom::forModel($model, $request);
    }

  
}
