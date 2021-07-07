<?php

namespace App\Model;

use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App Category
 */
class Category extends Model
{
    use HasSlug;

    protected $fillable = ['name', 'slug'];

    /**
     * @return HasMany
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
