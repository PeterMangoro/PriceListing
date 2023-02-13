<?php

namespace App\Http\Controllers\Welcome;

use App\Models\Plot;

use App\Models\User;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Views\Welcome\Plot\WelcomePlotShowProps;
use App\Views\Welcome\Plot\WelcomeCityPlotsProps;
use App\Views\Welcome\Plot\WelcomePlotIndexProps;
use App\Views\Welcome\Plot\WelcomeOwnerPlotsProps;

class WelcomePlotController extends Controller
{
    public function index()
    {
        return Inertia::render('Plot/Welcome/showAllPlots', [
            'data' => new WelcomePlotIndexProps(),
        ]);
    }

    public function owner(User $owner)
    {
        return Inertia::render('Plot/Welcome/showOwnerPlots', [
            'data' => new WelcomeOwnerPlotsProps($owner),
        ]);
    }

    public function show(Plot $plot)
    {
        return Inertia::render('Plot/Welcome/plotDetail', [
            'data' => new WelcomePlotShowProps($plot),
        ]);
    }

    public function city(string $city)
    {
        return Inertia::render('Plot/Welcome/sameCity', [
            'data' => new WelcomeCityPlotsProps($city),
        ]);
    }
}
