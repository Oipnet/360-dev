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
		/**
		 * @return mixed|void
		 */
    public function buildForm()
    {
				parent::buildForm();
				// Classic input
        $this
            ->add('name', 'text')
            ->add('slug', 'text')
            ->add('image', 'image')
            ->add('image_file', 'file')
            ->add('content', 'textarea', ['attr' => ['id' => 'mdeditor']])
            ->add('online', 'checkbox')
            ->add('user_id', 'hidden', ['value' => Auth::user()->id]);

        // Entity
        $this->addBefore('image', 'category_id', 'entity', [
            'class'       => Category::class,
            'property'    => 'name',
            'empty_value' => '== Sélectionnez une catégorie ==',
            'label_show'  => false,
            'attr'        => ['class' => 'browser-default'],
						'rules'       => 'required'
        ]);
				$this->add('submit', 'submit', [
					'label' => $this->label,
					'attr'  => ['class' => 'btn btn waves-effect waves-light']
				]);
		}
}
