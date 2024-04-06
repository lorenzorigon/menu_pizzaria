<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.category.form");
    }

    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route("categories.index");
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("admin.category.form", compact("category"));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route("categories.index");
    }

    public function destroy(Category $category)
    {
        $category->delete();    
        return redirect()->route("categories.index");
    }
}
