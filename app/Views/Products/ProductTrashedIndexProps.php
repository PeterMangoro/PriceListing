<?php

namespace App\Views\Products;

use App\Models\Product;
use App\View\Shared\Filters;
use App\View\Shared\BaseView;
use App\Handlers\Product\ProductHandler;
use App\DataObjects\Product\ProductDisplayData;
use App\Handlers\Shared\ModelHandler;

class ProductTrashedIndexProps extends BaseView
{
    public function products()
    {
        return ProductDisplayData::toOwnerDisplay(
            ModelHandler::getPaginatedData(
                Product::onlyTrashed()
                ->belongsToAuthUser()
            )
        );
    }

    public function filters()
    {
        return Filters::filters();
    }
}
