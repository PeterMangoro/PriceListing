<?php

namespace App\Http\Controllers\Plot;

use App\Handlers\Plot\PlotHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Plot\CreatePlotRequest;
use App\Http\Requests\Plot\UpdatePlotRequest;
use App\Models\Plot;
use App\Views\Plots\PlotEditProps;
use App\Views\Plots\PlotIndexProps;
use Inertia\Inertia;

class PlotController extends Controller
{
    public function index()
    {
        return Inertia::render('Plot/Index', [
            'data' => new PlotIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Plot/Create');
    }

    public function store(CreatePlotRequest $request)
    {
        $this->handle()::store($request);
        return to_route('plots.index')
            ->with('flash.banner', 'Plot Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Plot/Edit', [
            'data' => new PlotEditProps($uuid),
        ]);
    }

    public function update(UpdatePlotRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back()
            ->with('flash.banner', 'Plot update successful');
    }

    public function destroy(Plot $plot)
    {
        ModelHandler::delete($plot);
        return back()->with('flash.banner', 'Plot Deleted Successfully');
    }

    private function handle(): PlotHandler
    {
        return new PlotHandler();
    }
}
