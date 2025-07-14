<?php

namespace App\Http\Products;

use App\Models\Product;

class RestoreProduct
{
    public function __invoke(Product $product): void
    {
        if ($product->trashed()) {
            $product->restore();
        }
    }
}
