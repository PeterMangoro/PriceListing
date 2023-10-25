<?php

namespace App\Actions\Car\Insurance;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateCarInsuranceAction
{
    public static function handle(object $validated_request): int
    {
        return DB::table('car_insurances')->insertGetId([
            'uuid' => Str::uuid()->toString(),
            'owner' => $validated_request->owner,
            'contact' => $validated_request->contact,
            'car_title' => $validated_request->car_title,            
            'car_reg' => $validated_request->car_reg,
            'zimra' => $validated_request->zimra,
            'car_insurance' => $validated_request->car_insurance,
            'reg_date' => Carbon::now()->toDateString(),
            'reg_exp' => $validated_request->reg_exp,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
    }
}
