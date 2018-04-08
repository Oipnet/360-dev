<?php
namespace App\Observers;

use App\Post;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;

class PostImageObserver
{

	/**
	 * @var array
	 */
	private $sizes = [
		'thumb' => [175, null],
		'crop'  => [825, 175],
	];
	/**
	 * @var ImageManager
	 */
	private $imageManager;

	/**
	 * PostImageObserver constructor.
	 * @param ImageManager $imageManager
	 */
	public function __construct(ImageManager $imageManager)
	{
		$this->imageManager = $imageManager;
	}

	/**
	 * @param Post $post
	 */
	public function created(Post $post): void
	{
		if ($post->image) {
			$this->upload($post);
		}
	}

	/**
	 * @param Post $post
	 */
	public function updated(Post $post)
	{
		if ($post->image) {
			$this->upload($post);
		}
	}

	/**
	 * @param Post $post
	 */
	public function deleted(Post $post)
	{

	}

	/**
	 * @param Post $post
	 */
	private function upload(Post $post): void
	{
		/** @var $image UploadedFile */
		$image       = $post->image;
		$post->image = $post->getImageName($image);
		$post->newQuery()->update(['image' => $post->image]);
		foreach ($this->sizes as $type => $sizes) {
			$this->imageManager->make($image)
				->fit($sizes[0], $sizes[1] ?? null)
				->save(public_path('posts') . '/' . $post->getImageName($image, $type));
		}
	}

}