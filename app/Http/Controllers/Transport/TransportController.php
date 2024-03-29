<?php

namespace App\Http\Controllers\Transport;

use App\Handlers\Shared\ModelHandler;
use App\Handlers\Transport\TransportHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Transport\CreateTransportRequest;
use App\Http\Requests\Transport\UpdateTransportRequest;
use App\Models\Car\Transport;
use App\Views\Transports\TransportCreateProps;
use App\Views\Transports\TransportEditProps;
use App\Views\Transports\TransportIndexProps;
use Inertia\Inertia;

class TransportController extends Controller
{
    public function index()
    {
        return Inertia::render('Transport/show', ['data' => new TransportIndexProps()]);
    }

    public function create()
    {
        return Inertia::render('Transport/add', new TransportCreateProps());
    }

    public function store(CreateTransportRequest $request)
    {
        $this->handle()::store($request);
        return redirect()->route('transports.index')->with('flash.banner', 'Transport Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Transport/edit', new TransportEditProps($uuid));
    }

    public function update(UpdateTransportRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back()->with('flash.banner', 'Transport update successful');
    }

    public function destroy(Transport $transport)
    {
        ModelHandler::delete($transport);
        return back()->with('flash.banner', 'Trip Deleted Successfully');
    }

    private function handle(): TransportHandler
    {
        return new TransportHandler();
    }
}
