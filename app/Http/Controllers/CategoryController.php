<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\CategoryRequest;
use App\Services\Category\CategoryService;
use App\Services\Category\Data\CategoryData;
use App\Services\Category\Exceptions\InvalidPositionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\View\View;


class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService
    ) {
    }

    public function index()
    {
        $categories = Category::query()->paginate(10);
        return view("admin.category.index", compact("categories"));
    }

    public function create()
    {
        return view("admin.category.form");
    }

    public function store(CategoryRequest $request)
    {
        $dto = CategoryData::fromRequest($request);

        try {
            $this->categoryService->create($dto);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route("categories.index")->with("error", $exception->getMessage());
        } catch (InvalidPositionException $e) {
            ///
        } catch (\Throwable $exception) {
            //Sentry::send
        }

        return redirect()->route("categories.index");
    }

    public function edit(int $id): View
    {
        /** @var Category $category */
        $category = Category::query()->findOrFail($id);

        return view("admin.category.form", compact("category"));
    }

    public function update(CategoryRequest $request, $id)
    {
        $dto = CategoryData::fromRequest($request);

        /** @var Category $category */
        $category = Category::query()->findOrFail($id);
        $this->categoryService->update($category, $dto);

        return redirect()->route("categories.index");
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("categories.index");
    }
}
