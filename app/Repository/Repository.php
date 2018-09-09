<?php
namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

/**
 * App base Repository
 */
abstract class Repository
{

	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * @param string $slug
	 * @return \Illuminate\Database\Eloquent\Collection|Model
	 */
	public function getBySlug(string $slug)
	{
		return $this->model->newQuery()->where('slug', $slug)->firstOrFail();
	}

	/**
	 * @param array $data
	 * @return Model
	 */
	public function save(array $data): Model
	{
		return $this->model->newQuery()->create($data);
	}

}