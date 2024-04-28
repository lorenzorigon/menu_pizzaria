<?php

namespace App\Services\Category\Data;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\UploadedFile;

class CategoryData
{
    public function __construct(
        public readonly string $name,
        public readonly UploadedFile $imageFile,
        public readonly ?int $position = null,
        public readonly bool $active = true,
    ) {
    }

    static public function fromRequest(CategoryRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            name: $validated['name'],
            imageFile: $validated['image'],
            position: $validated['position'],
            active: (bool) $validated['active'],
        );
    }
}
