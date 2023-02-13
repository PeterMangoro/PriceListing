<?php

namespace App\Views\Accommodations\Payment\Room;

use App\DataObjects\Accommodation\Room\Payment\RoomPaymentDisplayData;
use App\Models\Accommodation;
use App\Support\Collection;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;
use Carbon\Carbon;

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
