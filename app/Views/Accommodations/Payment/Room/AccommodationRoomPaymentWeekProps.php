<?php

namespace App\Views\Accommodations\Payment\Room;

use Carbon\Carbon;
use App\Support\Collection;
use App\View\Shared\Filters;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\DataObjects\Accommodation\Room\Payment\RoomPaymentDisplayData;


class AccommodationRoomPaymentWeekProps extends BaseView
{
    public function __construct(
        public Accommodation $accommodation
    ) {
        $this->accommodation = $accommodation;
    }

    public function payments()
    {
        return RoomPaymentDisplayData::toOwnerDisplay(
            (new Collection(
                $this->accommodation
                    ->rooms()
                    ->with(
                        ['payments' => function ($query) {
                            $query->selectMinAttributes()
                                ->whereBetween('created_at', [
                                    Carbon::now()->startOfWeek(),
                                    Carbon::now()->endOfWeek(),
                                ])
                            ;
                        },
                        ],
                    )
                    ->whereRelation('payments', function ($query) {
                        $query->selectMinAttributes()
                            ->whereBetween('created_at', [
                                Carbon::now()->startOfWeek(),
                                Carbon::now()->endOfWeek(),
                            ])
                        ;
                    })
                    ->get()
                    ->pluck('payments')
                    ->flatten()
            ))
                ->paginate(10)
        );
    }
    public function filters()
    {
        return Filters::filters();
    }
}
