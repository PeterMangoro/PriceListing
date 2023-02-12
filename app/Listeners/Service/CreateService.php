<?php

namespace App\Listeners\Service;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Events\Service\CreatingService;
use App\Services\Service\ServiceService;
use App\Services\Shared\CategoryService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateService
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
     * @param  \App\Events\Service\CreatingService  $event
     * @return void
     */
    public function handle(CreatingService $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $service_id = ServiceService::create($request);
            $service = Service::find($service_id);
            AttachmentService::addImages($request->images, $service, 'service', 300);           
            CategoryService::forModel($service, $request->categories);
            $request->document ? 
            AttachmentService::addDocument($request->document, $service, 'service') : null;
        });
    }
}
