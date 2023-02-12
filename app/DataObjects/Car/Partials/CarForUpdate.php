<?php

namespace App\DataObjects\Car\Partials;

use App\ValueObjects\Attachments;
use Carbon\Carbon;

class CarForUpdate
{
    public function __construct(
        public  readonly string $uuid,
        public readonly  object $address,
        public  readonly ?object $attachments,
        public  readonly ?object $trashed_images,
        public  readonly ?object $documents,
        public  readonly ?object $trashed_documents,
        public  readonly object $categories,
        public  readonly ?float $discount_price,
        public  readonly ?string $discount_exp_date,
        public  readonly string $detail,
        public  readonly int $id,
        public  readonly float $price,
        public  readonly ?bool $sale_status,
        public  readonly string $car_make_id,
        public readonly  string $car_model_id,
    ) {
    }

    public static function from(object $car)
    {
        return new self(
            $car->uuid,
            $car->address,
            Attachments::imagesForEdit($car->attachments),
            Attachments::imagesForEdit($car->trashed_attachments),
            Attachments::documentsForEdit($car->documents),
            Attachments::documentsForEdit($car->trashed_documents),
            (object) $car->categories,
            $car->discount ? $car->discount->price : null,
            $car->discount ? Carbon::parse($car->discount->exp_date)->format('Y-m-d\TH:i') : null,
            $car->detail,
            $car->id,
            $car->price,
            $car->sale_status,
            $car->car_make_id,
            $car->car_model_id,
        );
    }
}
