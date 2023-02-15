<?php

namespace App\Listeners\Accommodation;

use App\Events\Accommodation\CreatingAccommodation;
use App\Models\Accommodation;
use App\Services\Accommodation\AccommodationService;
use App\Services\Shared\AddressService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\CategoryService;
use Illuminate\Support\Facades\DB;

class CreateAccommodation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Accommodation\CreatingAccommodation  $event
     *
     * @return void
     */
    public function handle(CreatingAccommodation $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $accommodation_id = AccommodationService::create($request);
            $accommodation = Accommodation::find($accommodation_id);
            AttachmentService::addImages($request->images, $accommodation, 'accommodation', 600);
            AddressService::addForModel($accommodation, $request->location);
            CategoryService::forModel($accommodation, $request->categories);
            $request->document ? AttachmentService::addDocument($request->document, $accommodation, 'accommodation') : null;
        });
    }
}
