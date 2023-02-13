<?php

namespace App\Http\Controllers\Plot;

use App\Models\Plot;
use Inertia\Inertia;
use App\Handlers\Plot\PlotHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Views\Plots\PlotEditProps;
use App\Views\Plots\PlotIndexProps;
use App\Http\Requests\Plot\CreatePlotRequest;
use App\Http\Requests\Plot\UpdatePlotRequest;



class PlotController extends Controller
{
    public function index()
    {
        return Inertia::render('Plot/show', [
            'data' => new PlotIndexProps()]);
    }

    public function create()
    {
        return Inertia::render('Plot/add');
    }

    public function store(CreatePlotRequest $request)
    {
        $this->handle()::store($request);
        return to_route('plots.index')
        ->with('flash.banner', 'Plot Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Plot/edit', [
            'data' => new PlotEditProps($uuid)]);
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
