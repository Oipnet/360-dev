<?php
namespace App\Repository;

use App\Model\Category;

/**
 * App CategoryRepository
 */
class CategoryRepository extends Repository
{
		/**
		 * @var Category
		 */
		protected $model;

		/**
		 * CategoryRepository constructor
		 *
		 * @param Category $category
		 */
		public function __construct(Category $category)
		{
				$this->model = $category;
		}

}