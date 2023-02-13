<?php

namespace App\Services\Product;

use App\Actions\Product\CreateProductAction;
use App\Actions\Product\UpdateProductAction;



class ProductService
{
    public static function create(object $request)
    {
        return CreateProductAction::handle($request);
    }

    public static function update(object $request, object $product)
    {
        return UpdateProductAction::handle($request, $product);
    }
}
