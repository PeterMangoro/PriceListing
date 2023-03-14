<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        return User::justASupplier()->count();
        return inertia('Welcome');
    }
}
