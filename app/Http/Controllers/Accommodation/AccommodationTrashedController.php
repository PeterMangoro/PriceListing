<?php

namespace App\Http\Controllers\Accommodation;

use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Models\Accommodation;
use App\Views\Accommodations\AccommodationTrashedIndexProps;
use Inertia\Inertia;

class AccommodationTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Accommodation/Trashed/show', [
            'data' => new AccommodationTrashedIndexProps(),
        ]);
    }

    public function show(int $id)
    {
        $accommodation = ModelHandler::restore(new Accommodation(), $id);
        return to_route('accommodations.edit', $accommodation->uuid);
    }
}
