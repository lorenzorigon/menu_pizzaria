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
 * @property boolean $size
 * @property float $size_m
 * @property float $size_g
 * @property float $size_gg
 * @property string $dimension_m
 * @property string $dimension_g
 * @property string $dimension_gg
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "active",
        "position",
        "size",
        "size_m",
        "size_g",
        "size_gg",
        "dimension_m",
        "dimension_g",
        "dimension_gg",
    ];

    /**@property Collection<int, Product> $products*/
    public function products(){
        return $this->hasMany(Product::class)->orderBy('name');
    }
}
