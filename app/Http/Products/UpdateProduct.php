<?php

namespace App\Http\Products;

use App\Models\Product;
use App\Data\Products\ProductData;

class UpdateProduct
{
    public function __invoke(Product $product, ProductData $data): Product
    {
        $product->update([
            'name' => $data->name,
            'category_id' => $data->categoryId,
            'brand_id' => $data->brandId,
        ]);

        return $product;
    }
}
