<?php

namespace App\Forms;

use App\Category;
use Kris\LaravelFormBuilder\Form;

/**
 * Class PostsForm
 *
 * Manage the admin form of the articles.
 */
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
            ->add('online', 'checkbox')
            ->add('user_id', 'hidden', ['value' => 1]);

        // Entity
        $this->addBefore('image', 'category_id', 'entity', [
            'class'       => Category::class,
            'property'    => 'name',
            'empty_value' => '== Select categorie ==',
            'label_show'  => false,
            'attr'        => ['class' => 'browser-default']
        ]);

        // Button
        $this->add('submit', 'submit', [
            'label' => 'Enregistrer',
            'attr'  => ['class' => 'btn btn waves-effect waves-light']
        ]);
    }
}
