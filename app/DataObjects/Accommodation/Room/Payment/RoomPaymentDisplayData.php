<?php

namespace App\DataObjects\Accommodation\Room\Payment;

class RoomPaymentDisplayData
{
    public static function toOwnerDisplay(object $payments)
    {
        return $payments->through(
            fn ($payment) => RoomPaymentDisplay::data($payment)
        );
    }
}
