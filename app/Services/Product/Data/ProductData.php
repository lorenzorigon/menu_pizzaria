<?php

namespace App\Services\Product\Data;

use App\Http\Requests\ProductRequest;

class ProductData
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly int $category_id,
        public readonly ?float $price = 0.0,
        public readonly ?float $second_price = 0.0,
        public readonly bool $active = true,
    ) {
    }

    static public function fromRequest(ProductRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            name: $validated['name'],
            description: $validated['description'],
            category_id: $validated['category_id'],
            price: $validated['price'],
            second_price: $validated['second_price'],
            active: (bool) $validated['active'],
        );
    }
}