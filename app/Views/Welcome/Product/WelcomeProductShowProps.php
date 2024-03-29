<?php

namespace App\Views\Welcome\Product;

use App\DataObjects\Product\ProductDetailData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\Views\Shared\BaseView;

class WelcomeProductShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $product = null,
        public ?object $category = null,
    ) {
        $this->uuid = $uuid;
        $this->product =
            ModelHandler::getModelForDisplay(
                new Product(),
                $uuid
            );
        $this->category =
        CategoryHandler::getCategory(
            ProductCategory::whichHasProduct($this->product->id)
        );
    }

    public function product()
    {
        return ProductDetailData::toWebPage($this->product);
    }

    public function category_type()
    {
        return $this->category->type;
    }

    public function similar_products()
    {
        return ProductDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
                $this->category->products()
                    ->dontInclude($this->product->id),
                9
            )
        );
    }

    public function owner_products()
    {
        return ProductDisplayData::collectionToWebPage(
            ModelHandler::getUnPaginatedData(
                Product::belongsToOwner($this->product->user->id)
                    ->dontInclude($this->product->id),
                9
            )
        );
    }
}
