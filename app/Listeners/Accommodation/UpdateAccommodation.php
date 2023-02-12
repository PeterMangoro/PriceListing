<?php

namespace App\Listeners\Accommodation;

use Illuminate\Support\Facades\DB;
use App\Services\Shared\AddressService;
use App\Services\Shared\CategoryService;
use App\Services\Shared\DiscountService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Accommodation\UpdatingAccommodation;
use App\Services\Accommodation\AccommodationService;

class UpdateAccommodation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Accommodation\UpdatingAccommodation  $event
     * @return void
     */
    public function handle(UpdatingAccommodation $event)
    {
        $request = $event->validated_request;
        $accommodation = $event->accommodation;

        DB::transaction(function () use ($request, $accommodation) {
            AccommodationService::update($request, $accommodation);
            AddressService::updateForModel($accommodation, $request->location);
            $request->categories ? 
            CategoryService::forModel($accommodation, $request->categories) : null;
            $request->discount['price'] ? 
            DiscountService::forModel($accommodation, $request->discount, 'Accommodation') : null;
            $request->images ? 
            AttachmentService::addImages($request->images, $accommodation, 'accommodation', 300) : null;
            $request->document ? 
            AttachmentService::addDocument($request->document, $accommodation, 'accommodation') : null;
        });
    }
}
