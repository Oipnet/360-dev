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
		 * Default buildForm with crud configuration
		 *
		 * @return mixed|void
		 */
		public function buildForm()
		{
				if ($this->getModel() && $this->getModel()->id) {
						$url    = route('posts.update', $this->getModel());
						$method = Method::PUT;
						$label  = "Editer l'article";
				} else {
						$url    = route('posts.store');
						$method = Method::POST;
						$label  = "Créer l'article";
				}
				$this->formOptions = [
					'method' => $method,
						'url'  => $url
				];
				$this->add('submit', 'submit', [
					'label' => $label,
					'attr'  => ['class' => 'btn btn waves-effect waves-light']
				]);
				parent::buildForm();
		}
}
