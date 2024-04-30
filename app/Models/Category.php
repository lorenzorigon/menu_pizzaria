<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

/**
 * @property string $name
 * @property UploadedFile $image
 * @property boolean $active
 * @property integer $position
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "active",
        "position",
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $lastCategory = Category::orderBy('position', 'desc')->first();
            $category->position = is_null($lastCategory) ? 1 : $lastCategory->position + 1;
        });
    }
}
