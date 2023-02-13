<?php

namespace App\Actions\Service;

class UpdateServiceAction
{
    public static function handle(
        object $validated_request,
        object $service
    ): void {
        $service->title = $validated_request->title;
        $service->detail = $validated_request->detail;
        $service->sale_status = $validated_request->sale_status;
        $service->save();
    }
}
