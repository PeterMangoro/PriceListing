<?php

namespace App\Http\Controllers\Mall\Service;

use App\Http\Controllers\Controller;
use App\Models\Mall\Service;
use App\Views\Services\ServiceTrashedIndexProps;
use Inertia\Inertia;

class ServiceTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Mall/Service/Trashed/show', [
            'data' => new ServiceTrashedIndexProps(),
        ]);
    }

    public function show(int $id)
    {
        $service = Service::onlyTrashed()->find($id);
        $service->restore();

        return to_route('services.edit', $service->uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mall\Service  $service
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
    }
}
