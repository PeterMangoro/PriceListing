<?php

namespace App\DataObjects\Product;

use App\DataObjects\Product\Partials\ProductClientDisplay;
use App\DataObjects\Product\Partials\ProductUserDisplay;

class ProductDisplayData
{
    public static function toWebPage(
        object $products, 
        ?string $morph = null)
    {
        return 
        $products->through(
            fn ($product) => 
            ProductClientDisplay::data($product, $morph));
    }

    public static function collectionToWebPage(
        object $products, 
        ?string $morph = null)
    {
        return 
        $products->map(
            fn ($product) => 
            ProductClientDisplay::data($product, $morph));
    }

    public static function toOwnerDisplay($products)
    {
        return 
        $products->through(
            fn ($product) => ProductUserDisplay::data($product));
    }
}
