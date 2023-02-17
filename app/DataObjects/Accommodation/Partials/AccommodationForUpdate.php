<?php

namespace App\DataObjects\Accommodation\Partials;

use App\ValueObjects\Attachments;
use Carbon\Carbon;

class AccommodationForUpdate
{
    public function __construct(
        public readonly  string $uuid,
        public readonly  object $address,
        public readonly  object $attachments,
        public  readonly ?object $trashed_images,
        public  readonly ?object $documents,
        public  readonly ?object $trashed_documents,
        public  readonly object $categories,
        public readonly  ?float $discount_price,
        public  readonly ?string $discount_exp_date,
        public  readonly array $detail,
        public readonly  int $id,
        public readonly  float $price,
        public  readonly bool $sale_status,
        public  readonly int $a_rooms,
    ) {
    }

    public static function from(object $accommodation)
    {
        return new self(
            $accommodation->uuid,
            $accommodation->address,
            Attachments::imagesForEdit($accommodation->attachments),
            Attachments::imagesForEdit($accommodation->trashed_attachments),
            Attachments::documentsForEdit($accommodation->documents),
            Attachments::documentsForEdit($accommodation->trashed_documents),
            (object) $accommodation->categories,
            $accommodation->discount ?
            $accommodation->discount->price : null,
            $accommodation->discount ?
            Carbon::parse($accommodation->discount->exp_date)->format('Y-m-d\TH:i') : null,
            $accommodation->detail,
            $accommodation->id,
            $accommodation->price,
            $accommodation->sale_status,
            $accommodation->a_rooms,
        );
    }
}
