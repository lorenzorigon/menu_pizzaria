<?php   

namespace App\Services\Category;

use App\Services\Category\Data\CategoryData;
use App\Models\Category;
use App\Services\Storage\StorageService;

class CategoryService
{
    const IMAGE_PATH = 'img/categories/';

    public function __construct(
        private readonly StorageService $storageService,
    ) {
    }

    public function create(CategoryData $data) : Category
    {
        $image = $data->image;
        $path = $this->storageService->store($image, self::IMAGE_PATH);
        $position = $this->getNewPosition($data->position);

        /** @var Category */
        return Category::query()->create([
            'name' => $data->name,
            'image' => $path,
            'position' => $position,
            'active' => $data->active,
            'size' => $data->size,
            'size_m' => $data->size_m,
            'size_g' => $data->size_g,
            'size_gg' => $data->size_gg,
            'dimension_m' => $data->dimension_m,
            'dimension_g' => $data->dimension_g,
            'dimension_gg' => $data->dimension_gg,
        ]);
    }

    public function update(CategoryData $data, Category $category) : Category
    {
        $image = $data->image;
        $oldPath = $category->image;

        if($image){
            $newPath = $this->storageService->store($image, self::IMAGE_PATH);
            $this->storageService->delete($oldPath);
        }

        $position = $this->getNewPosition($data->position);


        $category->update([
            'name'=> $data->name,
            'image'=> $newPath ?? $category->image,
            'active' => $data->active,
            'position' => $position,
            'size' => $data->size,
            'size_m' => $data->size_m,
            'size_g' => $data->size_g,
            'size_gg' => $data->size_gg,
            'dimension_m' => $data->dimension_m,
            'dimension_g' => $data->dimension_g,
            'dimension_gg' => $data->dimension_gg,
        ]);
        
        return $category;
    }

    private function getNewPosition(int $position): int
    {
        if(!is_null($position)){
            return $position;
        }

        $lastOrderPosition = Category::query()
            ->orderBy('position', 'desc')
            ->value('position');

        return is_null($lastOrderPosition) ? 1 : $lastOrderPosition + 1;
    }
}