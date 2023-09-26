<?php

namespace App\Http\Controllers\Car;

use Inertia\Inertia;
use App\Models\CarInsurance;
use App\Http\Controllers\Controller;
use App\Handlers\Shared\ModelHandler;
use App\Handlers\Car\Insurance\CarInsuranceHandler;
use App\Views\Cars\Insurance\CarInsuranceEditProps;
use App\Views\Cars\Insurance\CarInsuranceIndexProps;
use App\Http\Requests\Car\Insurance\CreateCarInsuranceRequest;
use App\Http\Requests\Car\Insurance\UpdateCarInsuranceRequest;

class CarInsuranceController extends Controller
{
    public function index()
    {
        return Inertia::render('Car/Insurance/Index', [
            'data' => new CarInsuranceIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Car/Insurance/Create', [
            // 'data' => new CarInsuranceCreateProps(),
        ]);
    }

    public function store(CreateCarInsuranceRequest $request)
    {
        $this->handle()::store($request);
        return to_route('car-insurance.index')->with('flash.banner', 'Car Insurance Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Car/Insurance/Edit', [
            'data' => new CarInsuranceEditProps($uuid),
        ]);
    }

    public function update(UpdateCarInsuranceRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back();
    }

    public function destroy(CarInsurance $CarInsurance)
    {
        ModelHandler::delete($CarInsurance);
        return back()
            ->with('flash.banner', 'Car Insurance Deleted Successfully');
    }

    private function handle(): CarInsuranceHandler
    {
        return new CarInsuranceHandler();
    }
}
