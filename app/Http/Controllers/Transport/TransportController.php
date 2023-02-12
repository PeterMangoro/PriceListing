<?php

namespace App\Http\Controllers\Mall;

use App\Handlers\Transport\TransportHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mall\Transport\CreateTransportRequest;
use App\Http\Requests\Mall\Transport\UpdateTransportRequest;
use App\Models\Mall\Transport;
use App\Views\Transports\TransportCreateProps;
use App\Views\Transports\TransportEditProps;
use App\Views\Transports\TransportIndexProps;
use Inertia\Inertia;

class TransportController extends Controller
{
    public function index()
    {
        return Inertia::render('Mall/Transport/show', ['data' => new TransportIndexProps()]);
    }

    public function create()
    {
        return Inertia::render('Mall/Transport/add', new TransportCreateProps());
    }

    public function store(CreateTransportRequest $request)
    {
        $this->handle()::store_transport($request);
        return redirect()->route('transports.index')->with('flash.banner', 'Transport Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Mall/Transport/edit', new TransportEditProps($uuid));
    }

    public function update(UpdateTransportRequest $request, string $uuid)
    {
        $this->handle()::update_transport($request, $uuid);
        return back()->with('flash.banner', 'Transport update successful');
    }

    public function destroy(Transport $transport)
    {
        $this->handle()::delete_transport($transport);
        return back()->with('flash.banner', 'Trip Deleted Successfully');
    }

    private function handle(): TransportHandler
    {
        return new TransportHandler();
    }
}
