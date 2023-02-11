<?php

namespace App\Actions\Shared\Employee;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateEmployeeAction
{
    public static function handle(object $request): int
    {
        return DB::table('employees')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'name' => $request->name,
            'position' => $request->position,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
