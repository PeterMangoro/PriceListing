<?php

namespace App\Actions\Mall\Service;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateServiceAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('services')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'title' => $validated_request->title,
            'detail' => $validated_request->detail,
            'sale_status' => true,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
