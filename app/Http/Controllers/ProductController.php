<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Services\Product\ProductService;
use App\Services\Product\Data\ProductData;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function __construct(
        private readonly ProductService $productService,
    ) {
    }

    public function index() : View
    {
        $products = Product::paginate(10);
        return view("admin.product.index", compact("products"));
    }

    public function create() : View
    {
        return view("admin.product.form", ["categories" => Category::all()]);
    }

    public function store(ProductRequest $request) : RedirectResponse
    {
        $dto = ProductData::fromRequest($request);
        $this->productService->create($dto);

        return redirect()->route("admin.products.index");
    }

    public function edit(Product $product)
    {

        return view("admin.product.form", ["categories" => Category::all(), 'product' => $product]);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $dto = ProductData::fromRequest($request);

        $this->productService->update($dto, $product);

        return redirect()->route("admin.products.index");
    }

    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route("admin.products.index");
    }
}
