<?php

namespace App\Http\Controllers\Accommodation;

use Inertia\Inertia;
use App\Models\Accommodation;
use App\Http\Controllers\Controller;
use App\Handlers\Accommodation\AccommodationHandler;
use App\Handlers\Shared\ModelHandler;
use App\Views\Accommodations\AccommodationCreateProps;
use App\Views\Accommodations\AccommodationEditProps;
use App\Views\Accommodations\AccommodationIndexProps;
use App\Http\Requests\Accommodation\UpdateAccommodationRequest;
use App\Http\Requests\Accommodation\CreateAccommodationRequest;



class AccommodationController extends Controller
{
    public function index()
    {
        return Inertia::render('Accommodation/show', [
            'data' => new AccommodationIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Accommodation/add', [
            'data' => new AccommodationCreateProps(),
        ]);
    }

    public function store(CreateAccommodationRequest $request)
    {
        $this->handle()::store($request);
        return to_route(
            'accommodations.index')
            ->with('flash.banner', 'Accommodation Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Accommodation/edit', [
            'data' => new AccommodationEditProps($uuid),
        ]);
    }

    public function update(UpdateAccommodationRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back();
    }

    public function destroy(Accommodation $accommodation)
    {
        ModelHandler::delete($accommodation);
        return back()
        ->with('flash.banner', 'Accommodation Deleted Successfully');
    }

    private function handle(): AccommodationHandler
    {
        return new AccommodationHandler();
    }
}
