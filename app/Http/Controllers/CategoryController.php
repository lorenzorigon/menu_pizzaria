<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\File;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.category.form");
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $requestImage = $request->image;
            $extension = $requestImage->extension();
            
            $imageName = md5($requestImage->getClientOriginalName()) . strtotime("now") .'.'. $extension;
           
            $requestImage->move(public_path('img/categories'), $imageName);

            Category::create([
                'name' => $validated['name'],
                'image' => $imageName,
                'active' => $validated['active']
            ]);
        }

        return redirect()->route("categories.index");
    }


    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view("admin.category.form", compact("category"));
    }

    public function update(CategoryRequest $request, $id)
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

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index");
    }
}
