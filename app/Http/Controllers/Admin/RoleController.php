<?php

namespace App\Http\Controllers\Admin;

use App\Forms\Admin\RolesForm;
use App\Model\Role;
use App\Repository\RoleRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends AdminController
{

	/**
	 * @var string
	 */
	protected $routePrefix = 'roles';

	/**
	 * @var string
	 */
	protected $formClass = RolesForm::class;

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        return response()->view('admin.roles.index', [
			'roles' => Role::all(),
		]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  Request $request
	 * @param RoleRepository $roleRepository
	 * @return Response
	 */
    public function store(Request $request, RoleRepository $roleRepository)
    {
        if ($roleRepository->save($request->all())) {
			return redirect(route('roles.index'))->with('success', "Le role a bien été ajouté");
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
