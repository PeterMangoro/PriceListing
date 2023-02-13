<?php

namespace App\Services\Accommodation;

use Illuminate\Database\Eloquent\Model;
use App\Actions\Accommodation\Room\AddRoom;



class RoomService
{
    public static function addRoomForModel(object $model, object $request):Model
    {
        return AddRoom::forModel($model, $request);
    }

  
}
