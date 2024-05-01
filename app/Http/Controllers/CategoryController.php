<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use App\Services\Category\Data\CategoryData;
use App\Services\Storage\StorageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService,
        private readonly StorageService $storageService,
    ) {
    }
    public function index() : View
    {
        $categories = Category::paginate(10);
        return view("admin.category.index", compact("categories"));
    }

    public function create() : View
    {
        return view("admin.category.form");
    }

    public function store(CategoryRequest $request) : RedirectResponse
    {
        $dto = CategoryData::fromRequest($request);

        $this->categoryService->create($dto);

        return redirect()->route("admin.categories.index");
    }


    public function edit(Category $category) : View
    {
        return view("admin.category.form", compact("category"));
    }

    public function update(CategoryRequest $request, Category $category) : RedirectResponse
    {
        $dto = CategoryData::fromRequest($request);

        $this->categoryService->update($dto, $category);

        return redirect()->route("admin.categories.index");
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $this->storageService->delete($category->image);
       
        $category->delete();
          
        return redirect()->route("admin.categories.index");
    }
}
