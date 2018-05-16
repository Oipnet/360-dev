<?php
namespace App\Repository;

use App\Favorite\Favorite;
use App\Post;
use Illuminate\Auth\AuthManager;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

/**
 * App PostRepository
 */
class PostRepository extends Repository
{

	/**
	 * @var Post
	 */
	protected $model;

	public function __construct(Post $post)
	{
		$this->model    = $post;
	}

	/**
	 * @param array $data
	 * @return Model|Post
	 */
	public function save(array $data): Model
	{
		return $this->model->newQuery()->create($data);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getByOrderDesc(): Collection
	{
		return $this->model->newQuery()->orderBy('created_at', 'desc')->get();
	}

	/**
	 * @param int $id
	 * @return Model|Post
	 */
	public function getFirst(int $id): Model
	{
		return $this->model->newQuery()->findOrFail($id);
	}

	/**
	 * @param array $data
	 * @return int
	 */
	public function update(array $data)
	{
		return $this->model->newQuery()->update($data);
	}

	/**
	 * @param int|null $categoryId
	 * @return Builder
	 */
	public function findIsOnline(?int $categoryId = null)
	{
		$resultQuery = $this->model->newQuery()->with('category', 'user')
			->where('online', true)
			->orderBy('created_at', 'desc');
		if ($categoryId) {
			return $resultQuery->where('category_id', $categoryId);
		}
		return $resultQuery;
	}

}