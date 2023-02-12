<?php

namespace App\Http\Controllers\Shared;

use App\Handlers\Shared\SocialHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\Social\CreateSocialRequest;
use App\Http\Requests\Shared\Social\UpdateSocialRequest;
use App\Models\Shared\Social;
use App\View\Shared\Social\SocialIndexProps;
use Inertia\Inertia;

class SocialController extends Controller
{
    public function index()
    {
        return Inertia::render('Profile/Social/index', [
            'data' => new SocialIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Profile/Social/create', [
            'data' => new SocialIndexProps(),
        ]);
    }

    public function store(CreateSocialRequest $request)
    {
        $this->handle()::store_social($request);
        return redirect()->route('socials.index')->with('flash.banner', 'Social Added Successfully');
    }

    public function update(UpdateSocialRequest $request, Social $social)
    {
        $this->handle()::update_social($request, $social);
        return back();
    }

    public function destroy(Social $social)
    {
        $this->handle()::delete_social($social);
        return back()->with('flash.banner', 'Social Deleted Successfully');
    }

    private function handle(): SocialHandler
    {
        return new SocialHandler();
    }
}
