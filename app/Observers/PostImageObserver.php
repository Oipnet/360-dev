<?php
namespace App\Observers;

use App\Post;
 use App\Repository\PostRepository;
use Illuminate\Http\UploadedFile;
use Intervention\Image\ImageManager;

class PostImageObserver
{

	/**
	 * @var array
	 */
	private $sizes = [
		'thumb' => [750, 300],
		'crop'  => [900, 300],
	];

		/**
		 * @var ImageManager
		 */
		private $imageManager;

		/**
		 * @var PostRepository
		 */
		private $postRepository;

		/**
		 * PostImageObserver constructor
		 *
		 * @param ImageManager $imageManager
		 * @param PostRepository $postRepository
		 */
	public function __construct(ImageManager $imageManager, PostRepository $postRepository)
	{
			$this->imageManager   = $imageManager;
			$this->postRepository = $postRepository;
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
		$this->postRepository->update(['image' => $post->image]);
		foreach ($this->sizes as $type => [$width, $height]) {
			$this->imageManager->make($image)
				->fit($width, $height)
				->save(public_path('posts') . '/' . $post->getImageName($image, $type));
		}
	}

}