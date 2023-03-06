<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Models\Plot;
use App\Models\User;
use App\Views\Welcome\Plot\WelcomeCityPlotsProps;
use App\Views\Welcome\Plot\WelcomeOwnerPlotsProps;
use App\Views\Welcome\Plot\WelcomePlotIndexProps;
use App\Views\Welcome\Plot\WelcomePlotShowProps;
use Inertia\Inertia;

class WelcomePlotController extends Controller
{
    public function index()
    {
        return Inertia::render('Plot/Welcome/Index', [
            'data' => new WelcomePlotIndexProps(),
        ]);
    }

    public function owner(User $owner)
    {
        return Inertia::render('Plot/Welcome/OwnerPlots', [
            'data' => new WelcomeOwnerPlotsProps($owner),
        ]);
    }

    public function show(Plot $plot)
    {
        return Inertia::render('Plot/Welcome/Show', [
            'data' => new WelcomePlotShowProps($plot),
        ]);
    }

    public function city(string $city)
    {
        return Inertia::render('Plot/Welcome/SameCity', [
            'data' => new WelcomeCityPlotsProps($city),
        ]);
    }
}
