<?php

namespace App\Actions\Dashboard;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardCountAction
{
    public function handle(): object
    {
        // $owner = User::where('id', Auth::user()->id)->first();

        
        // [
        //     'accommodation_count' => $owner->accommodations()->count(),
        //     'car_count' => $owner->cars()->count(),
        //     'plot_count' => $owner->plots()->count(),
        //     'product_count' => $owner->products()->count(),
        //     'service_count' => $owner->services()->count(),
        //     'employee_count' => $owner->employees()->count(),
        //     'social_count' => $owner->socials()->count(),
        // ];

        // return $counts;

        $owner_id = Auth::user()->id;
        $counts = DB::select("SELECT
        (SELECT COUNT('id') FROM accommodations WHERE `user_id`= {$owner_id} ) as accommodation_count,
        (SELECT COUNT('id') FROM cars WHERE `transport` <> 1 AND `user_id`= {$owner_id} ) as car_count,
        (SELECT COUNT('id') FROM plots WHERE `user_id`= {$owner_id} ) as plot_count,
        (SELECT COUNT('id') FROM products WHERE `user_id`= {$owner_id} ) as product_count,
        (SELECT COUNT('id') FROM services WHERE `user_id`= {$owner_id} ) as service_count,
        (SELECT COUNT('id') FROM transports WHERE `user_id`= {$owner_id} ) as transport_count,
        (SELECT COUNT('id') FROM employees WHERE `user_id`= {$owner_id} ) as employee_count,
        (SELECT COUNT('id') FROM socials WHERE `user_id`= {$owner_id} ) as contact_count
        ");

        return collect($counts)->first();
    }
}
