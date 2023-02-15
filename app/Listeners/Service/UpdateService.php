<?php

namespace App\Listeners\Service;

use App\Events\Service\UpdatingService;
use App\Services\Service\ServiceService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\CategoryService;
use Illuminate\Support\Facades\DB;

class UpdateService
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
     * @param  \App\Events\Service\UpdatingService  $event
     *
     * @return void
     */
    public function handle(UpdatingService $event)
    {
        $request = $event->validated_request;
        $service = $event->service;

        DB::transaction(function () use ($request, $service) {
            ServiceService::update($request, $service);
            $request->categories ?
            CategoryService::forModel($service, $request->categories) : null;
            $request->images ?
            AttachmentService::addImages($request->images, $service, 'service', 600) : null;
            $request->document ?
            AttachmentService::addDocument($request->document, $service, 'service') : null;
        });
    }
}
