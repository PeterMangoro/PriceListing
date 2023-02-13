<?php

namespace App\Views\Accommodations\Payment\Room;

use App\DataObjects\Accommodation\Room\Payment\RoomPaymentDisplayData;
use App\Models\Accommodation;
use App\Support\Collection;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class AccommodationRoomPaymentIndexProps extends BaseView
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
                            ;
                        },
                        ]
                    )
                    ->whereRelation('payments', function ($query) {
                        $query->selectMinAttributes()
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
