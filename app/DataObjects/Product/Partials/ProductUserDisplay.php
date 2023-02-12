<?php

namespace App\DataObjects\Product\Partials;

use App\ValueObjects\Attachments;
use App\ValueObjects\AvgRating;
use App\ValueObjects\Money;
use App\ValueObjects\SaleStatus;

class ProductUserDisplay
{
    public function __construct(
        public readonly  string $latest_image,
        public  readonly string $title,
        public  readonly string $price,
        public  readonly string $uuid,
        public  readonly string $detail,
        public  readonly string $status,
        public  readonly string $ratings,
        public  readonly int $id,
    ) {
        
    }
    public static function data($product)
    {
        return new self(
            Attachments::imagesForDisplay($product),
            $product->title,
            Money::from($product->price),
            $product->uuid,
            $product->detail,
            SaleStatus::from($product->sale_status),
            AvgRating::of($product->ratings),
            $product->id
        );
    }
}
