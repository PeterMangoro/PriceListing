<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class WelcomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Welcome');
    }
}
