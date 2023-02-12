<?php

namespace App\ValueObjects;

class Discount
{
    public function __construct(
        public string $price,
        public string $date,
        public string $percent
    ) {
        $this->price = $price;
        $this->date = $date;
        $this->percent = $percent;
    }

    public static function from(?object $discount, int $old_price):self
    {
        if ($discount === null) {
            return null;
        }

        return new self(
            Money::from($discount->price),
            Time::readable($discount->exp_date),
            '-' . CalcPercent::between($old_price, $discount->price)
        );
    }
}
