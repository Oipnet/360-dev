<?php
namespace App\Forms\Admin;

use App\Model\Role;

/**
 * Class UsersForm
 */
class UsersForm extends AdminForm
{

	protected $routePrefixName = 'users';

    public function buildForm()
    {
    	parent::buildForm();
        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('role_id', 'entity', [
            	'class'         => Role::class,
				'property_name' => 'name',
				'label_show'    => false,
				'empty_value'   => '== Sélectionnez un role ==',
				'attr'          => ['class' => 'browser-default'],
				'rules'         => 'required'
			]);

		$this->add('submit', 'submit', [
			'label' => 'Ajouter cet utilisateur',
			'attr'  => ['class' => 'btn btn waves-effect waves-light']
		]);
    }
}
