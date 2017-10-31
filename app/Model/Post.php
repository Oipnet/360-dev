<?php

namespace App\Model;

use App\Concern\Repository\PostRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

/**
 * Class Post
 * @property mixed created_at
 * @property mixed content
 * @property mixed $category
 * @property mixed $user
 * @property mixed user_id
 */
class Post extends Model
{
    use PostRepository;

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
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at->diffForHumans();
    }
}
