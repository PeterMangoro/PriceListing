<?php

namespace App\Http\Controllers\Service;

use Inertia\Inertia;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Handlers\Service\ServiceHandler;
use App\Handlers\Shared\ModelHandler;
use App\Views\Services\ServiceEditProps;
use App\Views\Services\ServiceIndexProps;
use App\Views\Services\ServiceCreateProps;
use App\Http\Requests\Service\CreateServiceRequest;
use App\Http\Requests\Service\UpdateServiceRequest;



class ServiceController extends Controller
{
    public function index()
    {
        return Inertia::render('Service/show', [
            'data' => new ServiceIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Service/add', [
            'data' => new ServiceCreateProps(),
        ]);
    }

    public function store(CreateServiceRequest $request)
    {
        $this->handle()::store($request);
        return redirect()->route('services.index')->with('flash.banner', 'Service Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Service/edit', [
            'data' => new ServiceEditProps($uuid),
        ]);
    }

    public function update(UpdateServiceRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back();
    }

    public function destroy(Service $service)
    {
        ModelHandler::delete($service);
        return back()->with('flash.banner', 'Service Deleted Successfully');
    }

    private function handle(): ServiceHandler
    {
        return new ServiceHandler();
    }
}
