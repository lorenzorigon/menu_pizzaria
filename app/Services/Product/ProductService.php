<?php   

namespace App\Services\Product;

use App\Services\Product\Data\ProductData;
use App\Models\Product;

class ProductService
{
    public function create(ProductData $data) : Product
    {
        /** @var Product */
        return Product::query()->create([
            //variables
        ]);
    }

    public function update(ProductData $data, Product $Product) : Product
    {
        Product::query()->update([
            //variables
        ]);
        
        return $Product;
    }
}