<?php

namespace App\Http\Products;

use App\Models\Product;
use App\Data\Products\ProductData;

class CreateProduct
{
    public function __invoke(ProductData $data): Product
    {
        return Product::create([
            'name' => $data->name,
            'category_id' => $data->categoryId,
            'brand_id' => $data->brandId,
        ]);
    }
}
