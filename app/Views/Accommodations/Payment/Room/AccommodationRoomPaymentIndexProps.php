<?php

namespace App\Views\Accommodations\Payment\Room;

use App\Support\Collection;
use App\View\Shared\Filters;
use App\Models\Accommodation;
use App\View\Shared\BaseView;
use App\DataObjects\Accommodation\Room\Payment\RoomPaymentDisplayData;



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
