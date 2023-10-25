<?php

namespace App\Http\Controllers\Shared;

use App\Handlers\Shared\RatingHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Shared\RatingRequest;
use App\Models\Accommodation;
use App\Models\Car\Car;
use App\Models\Product;
use App\Models\Service;

class RatingController extends Controller
{
    public function accommodation(RatingRequest $request)
    {
        RatingHandler::forModel($request, new Accommodation(), 'Accommodation');
        return back()->with('flash.banner', 'Thanks for Feedback');
    }

    public function product(RatingRequest $request)
    {
        RatingHandler::forModel($request, new Product(), 'Product');
        return back()->with('flash.banner', 'Thanks for Feedback');
    }

    public function car(RatingRequest $request)
    {
        RatingHandler::forModel($request, new Car(), 'Car\Car');
        return back()->with('flash.banner', 'Thanks for Feedback');
    }

    public function service(RatingRequest $request)
    {
        RatingHandler::forModel($request, new Service(), 'Service');
        return back()->with('flash.banner', 'Thanks for Feedback');
    }
}
