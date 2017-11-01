<?php
namespace App\Concern;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * HasSlug
 */
trait HasSlug
{

    /**
     * @param null|string $slug
     */
    public function setSlugAttribute(?string $slug): void
    {
        $attributeName = 'slug';
        /** @var $this Model */
        if ($this->name && is_null($slug)) {
            $this->attributes[$attributeName] = Str::slug($this->name);
        }
        else {
            $this->attributes[$attributeName] = $slug;
        }
    }
}
