<?php

namespace App\DataObjects\Plot\Partials;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use Carbon\Carbon;

class PlotForUpdate
{
    public function __construct(
        public readonly  string $uuid,
        public readonly  ?object $attachments,
        public readonly  ?object $trashed_images,
        public readonly  ?object $documents,
        public readonly  ?object $trashed_documents,
        public readonly  ?float $discount_price,
        public readonly  ?string $discount_exp_date,
        public readonly  array $detail,
        public readonly  int $id,
        public  readonly float $price,
        public  readonly bool $sale_status,
        public  readonly string $size,
        public  readonly object $address,
    ) {
    }

    public static function from(object $plot)
    {
        return new self(
            $plot->uuid,
            Attachments::imagesForEdit($plot->attachments),
            Attachments::imagesForEdit($plot->trashed_attachments),
            Attachments::documentsForEdit($plot->documents),
            Attachments::documentsForEdit($plot->trashed_documents),
            $plot->discount ? $plot->discount->price : null,
            $plot->discount ? Carbon::parse($plot->discount->exp_date)->format('Y-m-d\TH:i') : null,
            $plot->detail,
            $plot->id,
            $plot->price,
            $plot->sale_status,
            $plot->size,
            Address::from($plot->address)
        );
    }
}
