<?php

namespace App\Http\Controllers;

use App\Handlers\Shared\RatingHandler;
use App\Http\Requests\Shared\RatingRequest;

class RatingController extends Controller
{
    public function product(RatingRequest $request)
    {
        RatingHandler::for_product($request);
        return back()->with('flash.banner', 'Thanks for Feedback');
    }
}
