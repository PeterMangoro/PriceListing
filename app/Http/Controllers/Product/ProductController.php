<?php

namespace App\Http\Controllers\Product;

use Inertia\Inertia;
use App\Models\Product;
use App\Http\Controllers\Controller;
use App\Handlers\Product\ProductHandler;
use App\Handlers\Shared\ModelHandler;
use App\Views\Products\ProductEditProps;
use App\Views\Products\ProductIndexProps;
use App\Views\Products\ProductCreateProps;
use App\Http\Requests\Product\CreateProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;



class ProductController extends Controller
{
    public function index()
    {
        return Inertia::render('Mall/Product/show', [
            'data' => new ProductIndexProps(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Mall/Product/add', [
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
        return Inertia::render('Mall/Product/edit', [
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
