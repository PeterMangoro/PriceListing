<?php

namespace App\Http\Controllers\Shared\Payment\Accommodation;

use App\Http\Controllers\Controller;
use App\Models\Mall\Accommodation;
use App\Views\Accommodations\Payment\Room\AccommodationRoomPaymentIndexProps;
use App\Views\Accommodations\Payment\Room\AccommodationRoomPaymentMonthProps;
use App\Views\Accommodations\Payment\Room\AccommodationRoomPaymentTodayProps;
use App\Views\Accommodations\Payment\Room\AccommodationRoomPaymentWeekProps;
use App\Views\Accommodations\Payment\Room\AccommodationRoomPaymentYearProps;
use Inertia\Inertia;

class AccommodationRoomPaymentController extends Controller
{
    public function index(Accommodation $accommodation)
    {
        // return new AccommodationRoomPaymentIndexProps($accommodation);
        return Inertia::render('Mall/Accommodation/Payment/Room/Index', [
            'data' => new AccommodationRoomPaymentIndexProps($accommodation),
        ]);
    }

    public function today(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Payment/Room/Index', [
            'data' => new AccommodationRoomPaymentTodayProps($accommodation),
        ]);
    }

    public function week(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Payment/Room/Index', [
            'data' => new AccommodationRoomPaymentWeekProps($accommodation),
        ]);
    }

    public function month(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Payment/Room/Index', [
            'data' => new AccommodationRoomPaymentMonthProps($accommodation),
        ]);
    }

    public function year(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Payment/Room/Index', [
            'data' => new AccommodationRoomPaymentYearProps($accommodation),
        ]);
    }
}
