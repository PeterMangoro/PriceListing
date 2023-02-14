<?php

namespace App\DataObjects\Product;

use App\ValueObjects\Address;
use App\ValueObjects\Attachments;
use App\ValueObjects\Discount;
use App\ValueObjects\Money;
use App\ValueObjects\Ratings;
use App\ValueObjects\Socials;
use Illuminate\Support\Collection;

class ProductDetailData
{
    public function __construct(
        public readonly  int $id,
        public  readonly  Collection|array $images,
        public  readonly  Collection|array|null $documents,
        public  readonly string $title,
        public  readonly array $detail,
        public  readonly object $location,
        public  readonly string $price,
        public  readonly string $owner,
        public  readonly string $username,
        public  readonly ?Collection $contact,
        public  readonly ?object $ratings,
        public  readonly ?object $discount,
    ) {
    }
    public static function toWebPage($product)
    {
        $price = $product->price;

        if ($product->discount === null) {
            $discount = null;
        } else {
            $discount = Discount::from($product->discount, $price);
        }
        return new self(
            $product->id,
            Attachments::imagesFrom($product->attachments),
            Attachments::documentsFrom($product->documents),
            $product->title,
            $product->detail,
            Address::from($product->user->address),
            Money::from($product->price),
            $product->user->name,
            $product->user->username,
            Socials::from($product->user->socials),
            Ratings::from($product->ratings),
            $discount,
        );
    }
}
