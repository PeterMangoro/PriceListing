<?php

namespace App\DataObjects\Accommodation\Room\Payment;

use App\ValueObjects\Money;
use App\ValueObjects\Time;

class RoomPaymentDisplay
{
    public function __construct(
        public  readonly  string $room_name,
        public  readonly  string $name,
        public  readonly string $amount,
        public  readonly string $date,
        public  readonly string $service,
    ) {
    }

    public static function data($payment)
    {
        $room_name = $payment->load('payable')->payable->title;

        return new self(
            $room_name,
            $payment->guest,
            Money::from($payment->amount),
            Time::readable($payment->created_at),
            $payment->service,
        );
    }
}
