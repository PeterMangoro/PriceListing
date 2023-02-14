<?php

namespace App\Http\Controllers\Product;

use App\Handlers\Product\ProductHandler;
use App\Handlers\Shared\ModelHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use App\Views\Products\ProductCreateProps;
use App\Views\Products\ProductEditProps;
use App\Views\Products\ProductIndexProps;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Product/show', [
            'data' => new ProductIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Product/Add', [
            'data' => new ProductCreateProps(),
        ]);
    }

    public function store(CreateProductRequest $request)
    {
        $this->handle()::store($request);
        return to_route('products.index')->with('flash.banner', 'Product Added Successfully');
    }

    public function edit(string $uuid)
    {
        return Inertia::render('Product/edit', [
            'data' => new ProductEditProps($uuid),
        ]);
    }

    public function update(UpdateProductRequest $request, string $uuid)
    {
        $this->handle()::update($request, $uuid);
        return back();
    }

    public function destroy(Product $product)
    {
        ModelHandler::delete($product);
        return back()
            ->with('flash.banner', 'Product Deleted Successfully');
    }

    private function handle(): ProductHandler
    {
        return new ProductHandler();
    }
}
