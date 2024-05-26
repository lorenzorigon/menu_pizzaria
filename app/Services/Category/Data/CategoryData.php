<?php

namespace App\Services\Category\Data;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\UploadedFile;

class CategoryData
{
    public function __construct(
        public readonly string $name,
        public readonly ?UploadedFile $image = null,
        public readonly ?int $position = null,
        public readonly bool $active = true,
        public readonly bool $size = false,
        public readonly ?float $size_m = null,
        public readonly ?float $size_g = null,
        public readonly ?float $size_gg = null,
        public readonly ?string $dimension_m = null,
        public readonly ?string $dimension_g = null,
        public readonly ?string $dimension_gg = null,
    ) {
    }

    static public function fromRequest(CategoryRequest $request): self
    {
        $validated = $request->validated();
        
        return new self(
            name: $validated['name'],
            image: $validated['image'] ?? null,
            position: $validated['position'],
            active: (bool) $validated['active'],
            size: (bool) $validated['size'],
            size_m: $validated['size_m'] ?? null,
            size_g: $validated['size_g'] ?? null,
            size_gg: $validated['size_gg'] ?? null,
            dimension_m: $validated['dimension_m'] ?? null,
            dimension_g: $validated['dimension_g'] ?? null,
            dimension_gg: $validated['dimension_gg'] ?? null,
        );
    }
}