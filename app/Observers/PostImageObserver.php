<?php
namespace App\Observers;

use App\Post;
use Illuminate\Http\UploadedFile;

class PostImageObserver
{

		/**
		 * @param Post $post
		 */
		public function created(Post $post): void
		{
				/** @var $image UploadedFile */
				$image       = $post->image;
				$post->image = $post->getImageName($image);
		}

		/**
		 * @param Post $post
		 */
		public function updated(Post $post)
		{

		}

}