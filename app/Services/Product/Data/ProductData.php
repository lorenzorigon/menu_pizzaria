<?php

namespace App\Services\Product\Data;

use App\Http\Requests\ProductRequest;

class ProductData
{
    public function __construct(
        //variables
    ) {
    }

    static public function fromRequest(ProductRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            //variables
        );
    }
}