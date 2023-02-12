<?php

namespace App\Listeners\Product;

use Illuminate\Support\Facades\DB;
use App\Events\Product\UpdatingProduct;
use App\Services\Product\ProductService;
use App\Services\Shared\CategoryService;
use App\Services\Shared\DiscountService;
use Illuminate\Queue\InteractsWithQueue;
use App\Services\Shared\AttachmentService;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateProduct
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
     * @param  \App\Events\Product\UpdatingProduct  $event
     * @return void
     */
    public function handle(UpdatingProduct $event)
    {
        $request = $event->validated_request;
        $product = $event->product;

        DB::transaction(function () use ($request, $product) {
            ProductService::update($request, $product);
           
            $request->categories ? 
            CategoryService::forModel($product, $request->categories) : null;
            $request->discount['price'] ? 
            DiscountService::forModel($product, $request->discount, 'Product') : null;
            $request->images ?
             AttachmentService::addImages($request->images, $product, 'product', 300) : null;
            $request->document ? 
            AttachmentService::addDocument($request->document, $product, 'product') : null;
        });
    }
}
