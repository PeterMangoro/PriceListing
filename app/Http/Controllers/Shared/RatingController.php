<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use App\Handlers\Shared\RatingHandler;
use App\Http\Requests\Shared\RatingRequest;

class RatingController extends Controller
{
    public function product(RatingRequest $request)
    {
        RatingHandler::forProduct($request);
        return back()->with('flash.banner', 'Thanks for Feedback');
    }
}
