<?php

namespace App\Http\Products;

use App\Models\Product;

class SoftDeleteProduct
{
    public function __invoke(Product $product): void
    {
        $product->delete(); // Eloquent usará o soft delete automaticamente
    }
}
