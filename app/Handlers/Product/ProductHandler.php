<?php

namespace App\Handlers\Product;

use App\DataObjects\Product\ProductCreateData;
use App\DataObjects\Product\ProductUpdateData;
use App\Events\Product\CreatingProduct;
use App\Events\Product\UpdatingProduct;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductHandler
{
    public static function store(CreateProductRequest $request)
    {
        $validated_object = ProductCreateData::fromRequest($request);
        event(new CreatingProduct($validated_object));
    }

    public static function update(
        UpdateProductRequest $request,
        string $uuid
    ) {
        $validated_object = ProductUpdateData::fromRequest($request);
        event(
            new UpdatingProduct($validated_object, $uuid)
        );
    }
}
