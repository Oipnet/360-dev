<?php

namespace App\Forms;

use App\Category;
use Kris\LaravelFormBuilder\Form;

class PostsForm extends Form
{
    public function buildForm()
    {
        // Classic input
        $this
            ->add('name', 'text')
            ->add('slug', 'text')
            ->add('image', 'text')
            ->add('content', 'textarea')
            ->add('online', 'checkbox');

        // Entity
        $this->addBefore('content', 'categories', 'entity', [
            'class'    => Category::class,
            'property' => 'name'
        ]);

        // Button
        $this->add('submit', 'submit', [
            'label' => 'Enregistrer',
            'attr'  => ['class' => 'btn btn waves-effect waves-light']
        ]);
    }
}
