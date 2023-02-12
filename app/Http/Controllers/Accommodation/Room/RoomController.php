<?php

namespace App\Http\Controllers\Accommodation\Room;

use Inertia\Inertia;
use App\Models\Accommodation;
use App\Http\Controllers\Controller;
use App\View\Shared\Room\RoomIndexProps;
use App\View\Shared\Room\RoomCreateProps;
use App\Handlers\Accommodation\RoomHandler;
use App\Http\Requests\Accommodation\Room\CreateRoomRequest;



class RoomController extends Controller
{
    public function index(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Room/Index', [
            'data' => new RoomIndexProps($accommodation),
        ]);
    }

    public function create(Accommodation $accommodation)
    {
        return Inertia::render('Mall/Accommodation/Room/Create', [
            'data' => new RoomCreateProps($accommodation),
        ]);
    }

    public function store(Accommodation $accommodation, CreateRoomRequest $request)
    {
        RoomHandler::store($accommodation, $request);
        return to_route(
            'accommodations.rooms.index',
             $accommodation->uuid)
             ->with('flash.banner', 'Room Added Successfully');
    }

   
}
