<?php

namespace App\DataObjects\Product\Partials;

use App\ValueObjects\Attachments;
use App\ValueObjects\Discount;
use App\ValueObjects\Money;

class ProductClientDisplay
{
    public function __construct(
        public readonly  string $title,
        public  readonly string $price,
        public readonly  string $uuid,
        public  readonly string $latest_image,
        public  readonly ?object $discount,
    ) {
    }
    public static function data(object $product, ?string $morph = null)
    {
        $price = $product->price ??
        $product->$morph->price;

        if ($product->discount === null) {
            $discount = null;
        } else {
            $product->discount ?
            $discount = Discount::from($product->discount, $price) :
            $discount = Discount::from($product->$morph->discount, $price);
        }

        return new self(
            $product->$morph->title ?? $product->title,
            $product->price ?
             Money::from($product->price) :
             Money::from($product->$morph->price),
            $product->uuid ??
            $product->$morph->uuid,
            Attachments::imagesForDisplay($product),
            $discount
        );
    }
}
