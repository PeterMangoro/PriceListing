<?php

namespace App\Actions\Shared\Payment\Accommodation;

use Carbon\Carbon;

class AccommodationPayment
{
    public static function totalForAllRooms(object $rooms): int
    {
        return $rooms
            ->withSum('payments', 'amount')
            ->get()
            ->sum('payments_sum_amount');
    }

    public static function thisYearTotalForAllRooms(object $rooms): int
    {
        return $rooms
            ->withSum([
                'payments' => function ($query) {
                    $query->whereYear('created_at', date('Y'));
                },
            ], 'amount')
            ->get()
            ->sum('payments_sum_amount');
    }

    public static function thisMonthTotalForAllRooms(object $rooms): int
    {
        return $rooms
            ->withSum([
                'payments' => function ($query) {
                    $query
                        ->whereMonth('created_at', date('m'))
                        ->whereYear('created_at', date('Y'));
                },
            ], 'amount')
            ->get()
            ->sum('payments_sum_amount');
    }

    public static function thisWeekTotalForAllRooms(object $rooms): int
    {
        return $rooms
            ->withSum([
                'payments' => function ($query) {
                    $query
                        ->whereBetween(
                            'created_at',
                            [
                                Carbon::now()->startOfWeek(),
                                Carbon::now()->endOfWeek(),
                            ]
                        );
                },
            ], 'amount')
            ->get()
            ->sum('payments_sum_amount');
    }

    public static function todayTotalForAllRooms(object $rooms): int
    {
        return $rooms
            ->withSum([
                'payments' => function ($query) {
                    $query->whereDate('created_at', Carbon::today());
                },
            ], 'amount')
            ->get()
            ->sum('payments_sum_amount');
    }
}
