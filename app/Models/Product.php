<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $name
 * @property string $description
 * @property boolean $active
 * @property float $price
 * @property float $second_price
 * @property int $categpry_id
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "description",
        "active",
        "category_id",
        "price",
        "second_price",
    ];

    /** @var Category */
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
