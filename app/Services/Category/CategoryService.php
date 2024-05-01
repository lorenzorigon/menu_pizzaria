<?php   

namespace App\Services\Category;

use App\Services\Category\Data\CategoryData;
use App\Models\Category;
use App\Services\Storage\StorageService;
use Illuminate\Http\UploadedFile;

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