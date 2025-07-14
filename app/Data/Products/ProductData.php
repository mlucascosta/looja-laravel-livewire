<?php

namespace App\Data\Products;

class ProductData
{
    public function __construct(
        public string $name,
        public int $categoryId,
        public int $brandId,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['name'],
            $data['category_id'],
            $data['brand_id'],
        );
    }
}
