<?php

namespace App;

use App\Concern\HasSlug;
use App\Concern\Repository\PostRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Michelf\Markdown;

/**
 * Class Post
 */
class Post extends Model
{
    use PostRepository;
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
     * @param $online bool
     * @return string
     */
    public function getOnlineAttribute(bool $online): string
    {
        return $online ? 'Oui' : 'Non';
    }

    public function getHtmlAttribute()
    {
        return Markdown::defaultTransform($this->content);
    }

	/**
	 * @param UploadedFile $image
	 * @param null|string $type
	 * @return string
	 */
    public function getImageName(UploadedFile $image, ?string $type = null): string
		{
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
}
