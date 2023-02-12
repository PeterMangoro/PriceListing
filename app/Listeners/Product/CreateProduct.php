<?php

namespace App\Listeners\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use App\Events\Product\CreatingProduct;
use App\Services\Product\ProductService;
use App\Services\Shared\CategoryService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\Product\CreatingProduct  $event
     * @return void
     */
    public function handle(CreatingProduct $event)
    {
        $request = $event->validated_request;
        DB::transaction(function () use ($request) {
            $product_id = ProductService::create($request);
            $product = Product::find($product_id);
            AttachmentService::addImages($request->images, $product, 'product', 300);           
            CategoryService::forModel($product, $request->categories);
            $request->document ? 
            AttachmentService::addDocument($request->document, $product, 'product') : null;
        });
    }
}
