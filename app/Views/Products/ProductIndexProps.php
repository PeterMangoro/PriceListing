<?php

namespace App\Views\Products;

use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\Handlers\Product\ProductHandler;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;
use App\Models\Product;

class ProductIndexProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toOwnerDisplay(ModelHandler::getPaginatedData(
            Product::belongsToAuthUser()
        ));
    }

    public function filters()
    {
        return Filters::filters();
    }
}
