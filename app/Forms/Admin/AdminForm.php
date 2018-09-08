<?php
namespace App\Forms\Admin;

use App\Http\Tools\Method;
use Kris\LaravelFormBuilder\Form;

/**
 * Class AdminForm
 */
abstract class AdminForm extends Form
{

	/**
	 * @var string
	 */
	protected $label;

	/**
	 * Default buildForm with crud configuration
	 *
	 * @return mixed|void
	 */
	public function buildForm()
	{
		if ($this->getModel() && $this->getModel()->id) {
			$url    = route('posts.update', $this->getModel());
			$method = Method::PUT;
			$this->label  = "Editer l'article";
		} else {
			$url    = route('posts.store');
			$method = Method::POST;
			$this->label  = "Créer l'article";
		}
		$this->formOptions = [
			'method' => $method,
			'url'    => $url,
		];
		parent::buildForm();
	}
}
