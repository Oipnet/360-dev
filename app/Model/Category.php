<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property \Carbon\Carbon $created_at
 * @property int            $id
 * @property \Carbon\Carbon $updated_at
 * @property string         $name
 * @property string         $slug
 * @property mixed          $tutos
 * @property mixed          $posts
 */
class Category extends Model
{
    protected $guarded = [];

    /**
     * @return BelongsToMany
     */
    public function tutos(): BelongsToMany
    {
        return $this->belongsToMany(Tuto::class);
    }

    /**
     * @return BelongsToMany
     */
    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }
}
