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
            'name' => $data->name,
            'description' => $data->description,
            'category_id' => $data->category_id,
            'price' => $data->price ?? 0.0,
            'second_price' => $data->second_price ?? 0.0,
            'active' => $data->active,
        ]);
    }

    public function update(ProductData $data, Product $product) : Product
    {
        $product->update([
            'name' => $data->name,
            'description' => $data->description,
            'category_id' => $data->category_id,
            'price' => $data->price ?? 0.0,
            'second_price' => $data->second_price ?? 0.0,
            'active' => $data->active,
        ]);
        
        return $product;
    }
}