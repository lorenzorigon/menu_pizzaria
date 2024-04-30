<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use App\Services\Category\Data\CategoryData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService,
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

        return redirect()->route("categories.index");
    }


    public function edit(Category $category) : View
    {
        return view("admin.category.form", compact("category"));
    }

    public function update(CategoryRequest $request, $id) : RedirectResponse
    {
        $validated = $request->validated();

        $category = Category::findOrFail($id);

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Delete old image
            File::delete(public_path('img/categories/' . $category->image));

            // Save new image
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName()) . strtotime("now") .'.'. $extension;
            $requestImage->move(public_path('img/categories'), $imageName);

            $validated['image'] = $imageName;
        }

        $category->update($validated);

        return redirect()->route("categories.index");
    }

    public function destroy(Category $category) : RedirectResponse
    {
        $category->delete();
        return redirect()->route("categories.index");
    }
}
