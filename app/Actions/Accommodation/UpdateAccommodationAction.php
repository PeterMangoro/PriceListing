<?php

namespace App\Actions\Accommodation;

class UpdateAccommodationAction
{
    public static function handle(
        object $validated_request,
        object $accommodation
    ): void {
        $location = $validated_request->location;
        $accommodation->a_rooms = $validated_request->a_rooms;
        $accommodation->price = $validated_request->price;
        $accommodation->detail = $validated_request->detail;
        $accommodation->sale_status = $validated_request->sale_status;
        $accommodation->location = $location['city'] . ','.$location['town'];
        $accommodation->save();
    }
}
