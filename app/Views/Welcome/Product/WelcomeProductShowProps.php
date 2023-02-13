<?php

namespace App\Views\Welcome\Product;

use App\Models\Product;
use App\Views\Shared\BaseView;
use App\ValueObjects\CategoryType;
use App\Handlers\Shared\ModelHandler;
use App\Handlers\Product\ProductHandler;
use App\DataObjects\Product\ProductDetailData;
use App\DataObjects\Product\ProductDisplayData;


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
       
    }

    public function product()
    {
        return ProductDetailData::toWebPage($this->product);
    }

    public function category_type()
    {
        return CategoryType::from($this->category->type);
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
