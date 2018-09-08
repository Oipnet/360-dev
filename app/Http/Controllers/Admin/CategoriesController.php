<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Http\Tools\Method;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\Form;
use Kris\LaravelFormBuilder\FormBuilder;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): Response
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return response()->view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function create(FormBuilder $formBuilder): Response
    {
        $form = $this->getForm($formBuilder, ['method' => Method::POST, 'route' => 'categories.store']);
        return response()->view('admin.categories.create', compact('form'));
    }

    /**
     * @param FormBuilder $formBuilder
     * @param array $options
     * @param null $model
     * @return Form
     */
    private function getForm(FormBuilder $formBuilder, array $options, $model = null): Form
    {
        if (!is_null($model)) {
            $options = array_merge(['model' => $model], $options);
        }
        return $formBuilder->plain($options)
            ->add('name', 'text')
            ->add('slug', 'text')
            ->add('submit', 'submit', [
                'label' => 'Enregistrer',
                'attr'  => ['class' => 'btn btn waves-effect waves-light']
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        if ($category) {
            return redirect(route('categories.index'))->with('success', "La catégorie a été ajouté avec succès.");
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @param FormBuilder $formBuilder
     * @return Response
     */
    public function edit(int $id, FormBuilder $formBuilder): Response
    {
        $category = Category::findOrFail($id);
        $form     = $this->getForm(
            $formBuilder,
            ['method' => Method::PUT, 'url'  => route('categories.update', $category)],
            $category
        );
        return response()->view('admin.categories.edit', compact('category', 'form'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Category $category
     * @return Response|RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        if ($category->update($request->all())) {
            return redirect(route('categories.index'))->with('success', "La catégorie a bien été édité");
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     */
    public function destroy(Category $category)
    {
        if ($category->delete()) {
            $message = sprintf("La catégorie %s a bien été supprimé.", $category->name);
            return redirect('categories.index')->with('success', $message);
        }
        $message = sprintf("La catégorie %s n'a pas pu être supprimé.", $category->name);
        return redirect('categories.index')->with('error', $message);
    }
}
