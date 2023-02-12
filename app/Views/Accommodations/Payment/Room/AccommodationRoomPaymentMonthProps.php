<?php

namespace App\Views\Accommodations\Payment\Room;

use App\Support\Collection;
use App\View\Shared\Filters;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\DataObjects\Accommodation\Room\Payment\RoomPaymentDisplayData;



class AccommodationRoomPaymentMonthProps extends BaseView
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
                                ->whereMonth('created_at', date('m'))
                                ->whereYear('created_at', date('Y'))
                            ;
                        },
                        ],
                    )
                    ->whereRelation('payments', function ($query) {
                        $query->selectMinAttributes()
                            ->whereMonth('created_at', date('m'))
                            ->whereYear('created_at', date('Y'))
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
