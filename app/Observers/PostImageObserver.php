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
	public function deleting(Post $post)
	{
		if ($post->image) {
			$this->deleteFile($post);
			foreach ($this->sizes as $type => [$width, $height]) {
				$this->deleteFile($post, $type);
			}
		}
	}

	/**
	 * @param Post $post
	 * @param null|string $type
	 */
	private function deleteFile(Post $post, ?string $type = null): void
	{
		$fileName = $type
			? $post->id . '-' . $type . '.' . pathinfo($post->image, PATHINFO_EXTENSION)
			: $post->image;
		$image = new UploadedFile(public_path('posts') . '/' . $fileName, $fileName);
		if ($image->isFile()) {
			unlink($image->path());
		}
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
		foreach ($this->sizes as $type => [$width, $height]) {
			$this->imageManager->make($image)
				->fit($width, $height)
				->save(public_path('posts') . '/' . $post->getImageName($image, $type));
		}
	}

}