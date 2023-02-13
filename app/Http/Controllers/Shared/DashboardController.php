<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Views\MallDashboardProps;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard', new MallDashboardProps());
    }
}
