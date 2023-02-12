<?php

namespace App\Actions\Accommodation\Room;

use Illuminate\Database\Eloquent\Model;

class AddRoom
{
    public static function forModel(
        object $model, 
        object $validated_request):Model
    {
        return $model->rooms()->create([
            'title' => $validated_request->title,
            'type' => $validated_request->type,
            'detail' => $validated_request->detail,
            'sale_status' => true,

        ]);
    }
}
