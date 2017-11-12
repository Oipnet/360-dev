<?php
namespace App\Forms\Admin;

use Kris\LaravelFormBuilder\Form;

/**
 * Class AdminForm
 */
abstract class AdminForm extends Form
{

    /**
     * Generate a button for admin forms.
     *
     * @param array $options
     */
    public function addButton(array $options = [])
    {
        $defaultOptions = array_merge($options, [
            'label' => 'Enregistrer',
            'attr'  => ['class' => 'btn btn waves-effect waves-light']
        ]);
        $this->add('submit', 'submit', $defaultOptions);
    }
}
