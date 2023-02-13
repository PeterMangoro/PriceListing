<?php

namespace App\Http\Controllers\Service;

use Inertia\Inertia;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Views\Services\ServiceTrashedIndexProps;

class ServiceTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Service/Trashed/show', [
            'data' => new ServiceTrashedIndexProps(),
        ]);
    }

    public function show(int $id)
    {
        $service = Service::onlyTrashed()->find($id);
        $service->restore();

        return to_route('services.edit', $service->uuid);
    }

  
}
