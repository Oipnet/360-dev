<?php
namespace App\Repository;

use App\Post;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepository
{

		/**
		 * @var Post
		 */
		private $post;

		public function __construct(Post $post)
		{
				$this->post = $post;
		}

		/**
		 * @param array $data
		 * @return Model|Post
		 */
		public function save(array $data): Model
		{
				return $this->post->newQuery()->create($data);
		}

		/**
		 * @return \Illuminate\Database\Eloquent\Collection|static[]
		 */
		public function getByOrderDesc(): Collection
		{
				return $this->post->newQuery()->orderBy('created_at', 'desc')->get();
		}

}