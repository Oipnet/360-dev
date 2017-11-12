<?php

namespace App\Forms\Admin;

use App\Category;
use Illuminate\Support\Facades\Auth;

/**
 * Class PostsForm
 *
 * Manage the admin form of the articles.
 */
class PostsForm extends AdminForm
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
            ->add('user_id', 'hidden', ['value' => Auth::user()->id]);

        // Entity
        $this->addBefore('image', 'category_id', 'entity', [
            'class'       => Category::class,
            'property'    => 'name',
            'empty_value' => '== Select categorie ==',
            'label_show'  => false,
            'attr'        => ['class' => 'browser-default']
        ]);

        // Button
        $this->addButton();
    }
}
