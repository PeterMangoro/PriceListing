<?php

namespace App\Actions\Product;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateProductAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('products')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'title' => $validated_request->title,
            'detail' => $validated_request->detail,
            'price' => $validated_request->price,
            'sale_status' => true,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
