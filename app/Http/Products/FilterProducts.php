<?php

namespace App\Http\Products;

use App\Models\Product;
use App\Data\Products\ProductFilterDTO;

class FilterProducts
{
    public function __invoke(ProductFilterDTO $dto)
    {
        return Product::query()
            ->when($dto->name, fn($q) => $q->where('name', 'like', "%{$dto->name}%"))
            ->when($dto->category_ids, fn($q) => $q->whereIn('category_id', $dto->category_ids))
            ->when($dto->brand_ids, fn($q) => $q->whereIn('brand_id', $dto->brand_ids));
    }
}
