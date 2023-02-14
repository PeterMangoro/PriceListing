<?php

namespace App\Views\Products;

use App\Handlers\Category\CategoryHandler;
use App\Handlers\Shared\ModelHandler;
use App\Models\Categories\ProductCategory;
use App\Views\Shared\BaseView;

class ProductCreateProps extends BaseView
{
    public function category_types()
    {
        return CategoryHandler::getAllCategories(
            new ProductCategory()
        )
            ->sortBy('type')
            ->groupBy('type');
    }
}
