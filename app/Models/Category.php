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

    /**@property Collection<int, Product> $products*/
    public function products(){
        return $this->hasMany(Product::class);
    }
}
