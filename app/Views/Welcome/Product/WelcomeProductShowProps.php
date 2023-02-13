<?php

namespace App\View\Welcome\Product;

use App\DataObjects\Product\ProductDetailData;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Category\CategoryHandler;
use App\Handlers\Model\ModelHandler;
use App\Handlers\Product\ProductHandler;
use App\Models\Categories\ProductCategory;
use App\Models\Product;
use App\ValueObjects\CategoryType;
use App\View\Shared\BaseView;

class WelcomeProductShowProps extends BaseView
{
    public function __construct(
        public string $uuid,
        public ?object $product = null,
        public ?object $category = null,
    ) {
        $this->uuid = $uuid;
        $this->product =
            ModelHandler::get_model_for_detailed_display(
                new Product(),
                $uuid
            );
        $this->category =
            CategoryHandler::get_category(
                ProductCategory::whichHasProduct($this->product->id)
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
        return ProductDisplayData::collection_to_web_page(
            ProductHandler::get_unpaginated_products(
                $this->category->products()
                    ->dontInclude($this->product->id),
                9
            )
        );
    }

    public function owner_products()
    {
        return ProductDisplayData::collection_to_web_page(
            ProductHandler::get_unpaginated_products(
                Product::belongsToOwner($this->product->user->id)
                    ->dontInclude($this->product->id),
                9
            )
        );
    }
}
