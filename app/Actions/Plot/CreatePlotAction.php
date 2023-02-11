<?php

namespace App\Actions\Plot;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreatePlotAction
{
    public static function handle(object $request): int
    {
        return DB::table('plots')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'size' => $request->size,
            'detail' => $request->detail,
            'location' => $request->location['street'].$request->location['city'],
            'price' => $request->price,
            'sale_status' => true,
            'user_id' => Auth::user()->id,
        ]);
    }
}
