<?php

namespace App\Http\Controllers\Welcome\Accommodation;

use App\Models\User;

use Inertia\Inertia;
use App\Models\Shared\Address;
use App\Http\Controllers\Controller;
use App\Views\Welcome\Accommodation\Rental\WelcomeAccommodationShowProps;
use App\Views\Welcome\Accommodation\Rental\WelcomeOwnerAccommodationsProps;
use App\Views\Welcome\Accommodation\Rental\WelcomeRentalAccommodationIndexProps;
use App\Views\Welcome\Accommodation\Rental\WelcomeSameLocationAccommodationIndexProps;

class WelcomeRentalAccommodationController extends Controller
{
    public function index()
    {
        return Inertia::render('Mall/Accommodation/Welcome/Rental/showAllAccommodations', [
            'data' => new WelcomeRentalAccommodationIndexProps(),
        ]);
    }

    public function owner(User $owner)
    {
        return Inertia::render('Mall/Accommodation/Welcome/Rental/showOwnerAccommodations', [
            'data' => new WelcomeOwnerAccommodationsProps($owner),
        ]);
    }

    public function show(string $uuid)
    {
        return Inertia::render('Mall/Accommodation/Welcome/Rental/accommodationDetail', [
            'data' => new WelcomeAccommodationShowProps($uuid),
        ]);
    }

    public function location(Address $city)
    {
        return Inertia::render('Mall/Accommodation/Welcome/Rental/SameLocation', [
            'data' => new WelcomeSameLocationAccommodationIndexProps($city),
        ]);
    }
}
