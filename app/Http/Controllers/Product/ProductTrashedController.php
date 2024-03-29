<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Views\Products\ProductTrashedIndexProps;
use Inertia\Inertia;

class ProductTrashedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Product/Trashed/Index', [
            'data' => new ProductTrashedIndexProps(),
        ]);
    }

    public function show(int $id)
    {
        $product = Product::onlyTrashed()->find($id);
        $product->restore();

        return to_route('products.edit', $product->uuid);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
    }
}
