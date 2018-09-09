<?php
namespace App\Forms\Admin;

/**
 * Class UsersForm
 */
class RolesForm extends AdminForm
{

	/**
	 * @var string
	 */
	protected $routePrefixName = 'roles';

    public function buildForm()
    {
    	parent::buildForm();
        $this
            ->add('name', 'text')
            ->add('slug', 'text')
			->add('description', 'textarea', ['attr' => ['id' => 'mdeditor']]);

		$this->add('submit', 'submit', [
			'label' => 'Ajouter le role',
			'attr'  => ['class' => 'btn btn waves-effect waves-light']
		]);
    }
}
