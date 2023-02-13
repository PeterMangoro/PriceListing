<?php

namespace App\Views\Products;

use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Product;
use App\Views\Shared\BaseView;
use App\Views\Shared\Filters;

class ProductIndexProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Product::belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
