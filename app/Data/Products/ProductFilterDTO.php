<?php

namespace App\Data\Products;

class ProductFilterDTO
{
    public function __construct(
        public readonly ?string $name = null,
        public readonly array $category_ids = [],
        public readonly array $brand_ids = [],
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'] ?? '',
            category_ids: $data['categories_array'] ?? [],
            brand_ids: $data['brands_array'] ?? []
        );
    }
}
