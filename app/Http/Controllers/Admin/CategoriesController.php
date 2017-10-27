<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Concern\HasRedirect;
use App\Http\Tools\Method;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Kris\LaravelFormBuilder\FormBuilder;

class CategoriesController extends Controller
{
    use HasRedirect;

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
        $form = $formBuilder->plain(['method' => Method::POST, 'route' => 'categories.store'])
            ->add('name', 'text')
            ->add('slug', 'text')
            ->add('submit', 'submit', [
                'label' => 'Enregistrer',
                'attr'  => ['class' => 'btn btn waves-effect waves-light']
            ]);
        return response()->view('admin.categories.create', compact('form'));
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
            return $this->redirectWithMessage(
                $request, 'categories.index', "La catégorie a été ajouté avec succès."
            );
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
