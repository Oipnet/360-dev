<?php

namespace App;

use App\Favorite\Favorite;
use App\Favorite\HasFavorites;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Michelf\Markdown;

/**
 * Class Post
 */
class Post extends Model
{
    use HasSlug;


    protected $fillable = ['name', 'slug', 'image', 'content', 'category_id', 'user_id', 'online'];

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

    /**
     * @return string
     */
    public function getOnlineToString(): string
    {
        return $this->getAttribute('online') ? 'Oui' : 'Non';
    }

    public function getHtmlAttribute()
    {
        return Markdown::defaultTransform($this->getAttribute('content'));
    }

	/**
	 * @param UploadedFile|string $image
	 * @param null|string $type
	 * @return string
	 */
    public function getImageName($image, ?string $type = null): string
	{
		if (is_string($image)) {
			return $image;
		}
		$type = $type ? '-' . $type : '';
		return $this->id . $type . '.' . $image->clientExtension();
	}

	/**
	 * @param null|string $type
	 * @return string Return the image with the full path (/../public/posts/1.png)
	 */
	public function getImage(?string $type = null): ?string
	{
		if ($this->image) {
			$fileName = $type
				? $this->id . '-' . $type . '.' . pathinfo($this->image, PATHINFO_EXTENSION)
				: $this->image;
			return '/posts/' . $fileName;
		}
		return null;
	}


	/**
	 * @return bool
	 */
	public function favorited(): bool
	{
		return (bool)
			Favorite::where('user_id', Auth::id())
				->where('post_id', $this->id)
				->first();
	}
}
