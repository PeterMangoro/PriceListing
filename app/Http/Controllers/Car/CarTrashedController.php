<?php

namespace App\Http\Controllers\Car;

use App\Handlers\Shared\ModelHandler;
use Inertia\Inertia;
use App\Models\Car\Car;
use App\Http\Controllers\Controller;
use App\Views\Cars\CarTrashedIndexProps;


class CarTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Car/Trashed/show', [
            'data' => new CarTrashedIndexProps(),
        ]);
    }

    public function show(int $id)
    {
        $car =ModelHandler::restore(new Car(),$id);

        return to_route('cars.edit', $car->uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     *
     * @return \Illuminate\Http\Response
     */
   
}
