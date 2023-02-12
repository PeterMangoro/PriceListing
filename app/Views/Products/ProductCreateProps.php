<?php

namespace App\Views\Products;

use App\Handlers\Shared\ModelHandler;
use App\View\Shared\BaseView;
use App\Models\Categories\ProductCategory;


class ProductCreateProps extends BaseView
{
    public function category_types()
    {
        return ModelHandler::getUnPaginatedData(
            new ProductCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
