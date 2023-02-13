<?php

namespace App\Views\Products;

use App\DataObjects\Product\Partials\ProductForUpdate;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\Views\Shared\BaseView;

class ProductEditProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $product = null,
        public ?object $categories = null
    ) {
        $this->uuid = $uuid;
        $this->product = ProductForUpdate::from(
            ModelHandler::getModelForEdit(
                new Product(),
                $this->uuid
            )
        );
        $this->categories = $this->product->categories;
    }

    public function product()
    {
        return $this->product;
    }

    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new ProductCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
