<?php

namespace App\Http\Controllers\Car;

use App\Handlers\Car\CarHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Car\CreateCarRequest;
use App\Http\Requests\Car\UpdateCarRequest;
use App\Models\Car\Car;
use App\Views\Cars\CarCreateProps;
use App\Views\Cars\CarEditProps;
use App\Views\Cars\CarIndexProps;
use Inertia\Inertia;

class CarController extends Controller
{
    public function index()
    {
        return Inertia::render('Car/Index', [
            'data' => new CarIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Car/Create', [
            'data' => new CarCreateProps(),
        ]);
    }

    public function store(CreateCarRequest $request)
    {
        $this->handle()::store($request);
        return to_route('cars.index')->with('flash.banner', 'Car Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Car/Edit', [
            'data' => new CarEditProps($uuid),
        ]);
    }

    public function update(UpdateCarRequest $request, string $uuid)
    {
        // dd(5);
        $this->handle()::update($request, $uuid);
        return back();
    }

    public function destroy(Car $car)
    {
        ModelHandler::delete($car);
        return back()->with('flash.banner', 'Car Deleted Successfully');
    }

    private function handle(): CarHandler
    {
        return new CarHandler();
    }
}
