<?php

namespace App\Http\Controllers\Shared;

use App\Models\User;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Handlers\Shared\UserProfileHandler;
use App\View\Shared\Profile\ProfileShowProps;
use App\View\Shared\Profile\ProfileTeamProps;
use App\Http\Requests\Shared\Profile\ProfileUpdateRequest;


class ProfileController extends Controller
{
    public function show(User $user)
    {
        return Inertia::render('Company/Profile', [
            'data' => new ProfileShowProps($user),
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        UserProfileHandler::update($request);
    }

    public function team(User $user)
    {
        return Inertia::render('Company/Team', [
            'data' => new ProfileTeamProps($user),
        ]);
    }
}
