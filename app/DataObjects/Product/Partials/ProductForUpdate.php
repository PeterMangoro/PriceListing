<?php

namespace App\DataObjects\Product\Partials;

use App\ValueObjects\Attachments;
use Carbon\Carbon;

class ProductForUpdate
{
    public function __construct(
        public readonly  string $uuid,
        public readonly  ?object $attachments,
        public  readonly ?object $trashed_images,
        public  readonly ?object $documents,
        public  readonly ?object $trashed_documents,
        public readonly  object $categories,
        public readonly  ?float $discount_price,
        public  readonly ?string $discount_exp_date,
        public  readonly string $detail,
        public  readonly int $id,
        public readonly  float $price,
        public readonly  bool $sale_status,
        public  readonly string $title,
    ) {
        
    }

    public static function from(object $product)
    {
        return new self(
            $product->uuid,
            Attachments::imagesForEdit($product->attachments),
            Attachments::imagesForEdit($product->trashed_attachments),
            Attachments::documentsForEdit($product->documents),
            Attachments::documentsForEdit($product->trashed_documents),
            (object) $product->categories,
            $product->discount ? 
            $product->discount->price : null,
            $product->discount ? 
            Carbon::parse($product->discount->exp_date)->format('Y-m-d\TH:i') : null,
            $product->detail,
            $product->id,
            $product->price,
            $product->sale_status,
            $product->title,
        );
    }
}
