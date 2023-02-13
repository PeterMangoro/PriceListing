<?php

namespace App\Http\Controllers\Welcome;

use App\Models\User;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Views\Welcome\Transport\WelcomeTransportShowProps;
use App\Views\Welcome\Transport\WelcomeTransportTripProps;
use App\Views\Welcome\Transport\WelcomeTransportIndexProps;
use App\Views\Welcome\Transport\WelcomeOwnerTransportsProps;

class WelcomeTransportController extends Controller
{
    public function index()
    {
        return Inertia::render('Transport/Welcome/showAllTransports', [
            'data' => new WelcomeTransportIndexProps(),
        ]);
    }

    public function owner(User $owner)
    {
        // return new WelcomeOwnerTransportsProps($owner);
        return Inertia::render('Transport/Welcome/showOwnerTransports', [
            'data' => new WelcomeOwnerTransportsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Transport/Welcome/transportDetail', [
            'data' => new WelcomeTransportShowProps($uuid),
        ]);
    }

    public function trip(string $departure, string $destination)
    {
        return Inertia::render('Transport/Welcome/sameRoute', [
            'data' => new WelcomeTransportTripProps($departure, $destination),
        ]);
    }
}
