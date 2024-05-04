<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::paginate(10);
        return view("admin.product.index", compact("products"));
    }

    public function create() : View
    {
        return view("admin.product.form", ["categories" => Category::all()]);
    }

    public function store(ProductRequest $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function edit(Product $product)
    {
        //
    }

    public function update(ProductRequest $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
