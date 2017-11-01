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
        /** @var $this Model */
        if ($this->name && !$slug) {
            $this->attributes['slug'] = Str::slug($this->name);
        }
    }
}
