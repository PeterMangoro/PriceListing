<?php

namespace App\Views\Shared\Room;

use App\Actions\Shared\Payment\Accommodation\AccommodationPayment;
use App\Actions\Shared\Room\GetRooms;
use App\DataObjects\Accommodation\Room\AccommodationRoomDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\ValueObjects\Money;
use App\View\Shared\BaseView;
use App\View\Shared\Filters;

class RoomIndexProps extends BaseView
{
    public function __construct(
        public object $model,
    ) {
        $this->model = $model;
    }

    public function parent()
    {
        return $this->model;
    }

    public function rooms()
    {
        return AccommodationRoomDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                $this->model->rooms(),
                15
            )
        );
    }

    public function counts()
    {
        return [
            'total' => Money::from(
                AccommodationPayment::totalForAllRooms(
                    $this->model->rooms()
                )
            ),
            'total_year' => Money::from(
                AccommodationPayment::thisYearTotalForAllRooms(
                    $this->model->rooms()
                )
            ),
            'total_month' => Money::from(
                AccommodationPayment::thisMonthTotalForAllRooms(
                    $this->model->rooms()
                )
            ),
            'total_week' => Money::from(
                AccommodationPayment::thisWeekTotalForAllRooms(
                    $this->model->rooms()
                )
            ),
            'total_today' => Money::from(
                AccommodationPayment::todayTotalForAllRooms(
                    $this->model->rooms()
                )
            ),
            'rooms' => $this->model->rooms()->count(),
        ];
    }

    public function filters()
    {
        return Filters::filters();
    }
}
