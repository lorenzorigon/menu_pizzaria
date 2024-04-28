<?php

namespace App\Services\Category;

use App\Models\Category;
use App\Services\Category\Data\CategoryData;
use App\Services\Category\Exceptions\InvalidPositionException;
use App\Services\Storage\StorageService;
use Illuminate\Http\UploadedFile;

class CategoryService
{
    const IMAGE_PATH = 'img/categories/';

    public function __construct(private readonly StorageService $storageService)
    {
    }

    /**
     * @throws InvalidPositionException
     */
    public function create(CategoryData $data): Category
    {
        $image = $data->imageFile;
        $path = $this->storageService->store($image, self::IMAGE_PATH);

        $position = $this->getNewPosition($data->position);

        $lastOrderPosition = Category::query()
            ->orderBy('position', 'desc')
            ->value('position');
        if ($position < $lastOrderPosition) {
            throw new InvalidPositionException('A posição precisa ser maior que ' . $lastOrderPosition);
        }

        /** @var Category */
        return Category::query()->create([
            'name' => $data->name,
            'image' => $path,
            'active' => $data->active,
            'position' => $position,
        ]);
    }

    public function update(Category $category, CategoryData $data): Category
    {
        /** @var UploadedFile $image */
        $image = $data['image'];
        $oldPath = $category->image;
        $newPath = $this->storageService->store($image, self::IMAGE_PATH);

        $data['image'] = $newPath;
        $category->update([
            'name' => $data->name,
            'image' => $newPath,
            'active' => $data->active,
        ]);

        $this->storageService->delete($oldPath);

        return $category;
    }

    private function getNewPosition(?int $position): ?int
    {
        if (!is_null($position)) {
            return $position;
        }

        $lastOrderPosition = Category::query()
            ->orderBy('position', 'desc')
            ->value('position');

        return is_null($lastOrderPosition) ? 1 : $lastOrderPosition + 1;
    }
}
