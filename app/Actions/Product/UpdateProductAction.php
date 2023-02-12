<?php

namespace App\Actions\Mall\Product;

class UpdateProductAction
{
    public static function handle(object $validated_request, object $product):void
    {
        $product->title = $validated_request->title;
        $product->price = $validated_request->price;
        $product->detail = $validated_request->detail;
        $product->sale_status = $validated_request->sale_status;
        $product->save();
    }
}
