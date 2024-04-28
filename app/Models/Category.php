<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id
 * @property string $name
 * @property string $image
 * @property boolean $active
 * @property int $position
 *
 * @property Collection<int, User> $products
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "image",
        "active",
    ];

    public function products(): HasMany
    {
        return $this->hasMany('');
    }
}
