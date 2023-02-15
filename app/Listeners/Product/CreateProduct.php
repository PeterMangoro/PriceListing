<?php

namespace App\Listeners\Product;

use App\Events\Product\CreatingProduct;
use App\Models\Product;
use App\Services\Product\ProductService;
use App\Services\Shared\AttachmentService;
use App\Services\Shared\CategoryService;
use Illuminate\Support\Facades\DB;

class CreateProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Product\CreatingProduct  $event
     *
     * @return void
     */
    public function handle(CreatingProduct $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $product_id = ProductService::create($request);
            $product = Product::find($product_id);
            AttachmentService::addImages($request->images, $product, 'product', 600);
            CategoryService::forModel($product, $request->categories);
            $request->document ?
            AttachmentService::addDocument($request->document, $product, 'product') : null;
        });
    }
}
