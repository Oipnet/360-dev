<?php
namespace App\Forms\Admin;

use App\Model\User\Role;

/**
 * Class UsersForm
 */
class UsersForm extends AdminForm
{

    public function buildForm()
    {
        $this
            ->add('name', 'text')
            ->add('email', 'text')
            ->add('roles', 'select', [
                'choices'     => [Role::ADMIN => 'Admin', Role::MEMBER => 'Membre'],
                'empty_value' => '=== Select Role ===',
                'label'       => false
            ]);

        $this->addButton();
    }
}
