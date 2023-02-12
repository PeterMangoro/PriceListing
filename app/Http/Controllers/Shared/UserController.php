<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Inertia\Inertia;

class UserController extends Controller
{
    public function login()
    {
        $countries = Country::select('id', 'phonecode', 'name')->get();

        return Inertia::render('Auth/Login', ['countries' => $countries]);
    }
}
