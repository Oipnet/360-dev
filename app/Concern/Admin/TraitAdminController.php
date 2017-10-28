<?php

namespace App\Concern\Admin;

use Illuminate\Http\Request;

/**
 * Trait TraitAdminController
 *
 * Basic CRUD controller
 *
 * @package App\Concern\Admin
 */
trait TraitAdminController
{

    private $model;

    public function __construct()
    {
        $this->model = self::__MODEL;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model::all();
        return view('admin.' . $this->view . '.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new $this->model;
        return view('admin.' . $this->view . '.form', compact('item'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->model::create($request->all());
        return $this->index()->with('success', 'Nouvel entité créé');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->model::where('id', $id)->first();
        return view('admin.' . $this->view . '.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->model::where('id', $id)->first();
        return view('admin.' . $this->view . '.form', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param                           $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = $this->model::where('id', $id)->first();
        $item->update($request->all());
        return $this->index()->with('success', 'Entité modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->model::where('id', $id)->first();
        $item->delete();
        return $this->index()->with('success', 'Entité supprimé');
    }
}
