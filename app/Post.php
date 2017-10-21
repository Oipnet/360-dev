<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class Post
 */
class Post extends Model
{
    /**
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns the content of the truncated post.
     *
     * @return string
     */
    public function shortContent(): string
    {
        return Str::limit($this->content);
    }

    /**
     * Recover only online articles and pages.
     *
     * @param int $numberpage The number of articles per page.
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function paginatePosts(int $numberpage = 15)
    {
        return self::with('category')
            ->with('user')
            ->where('online', true)
            ->paginate($numberpage);
    }
}
