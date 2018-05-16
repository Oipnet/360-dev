<?php
namespace App\Http\Controllers\Admin;

use App\Forms\Admin\UsersForm;
use App\Http\Controllers\Controller;
use App\Http\Tools\Method;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Kris\LaravelFormBuilder\FormBuilderTrait;

/**
 * UserController
 */
class UserController extends Controller
{
    use FormBuilderTrait;

    /**
     * @return Response
     */
    public function index(): Response
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return response()->view('admin.users.index', compact('users'));
    }

    /**
     * @param User $user
     * @return Response
     */
    public function edit(User $user): Response
    {
        $form = $this->form(UsersForm::class, [
            'url'    => route('users.update', $user),
            'method' => Method::PUT,
            'model'  => $user
        ]);
        return response()->view('admin.users.edit', compact('user', 'form'));
    }

    /**
     * @param Request $request
     * @param User $user
     * @return View
     */
    public function update(Request $request, User $user)
    {
        $data = [
            'name'  => $request->input('name'),
            'email' => $request->input('email'),
            'roles' => $request->input('roles')
        ];
        if ($user->update($data)) {
            return redirect(route('users.index'))->with('success', "L'utilisateur a bien été mis à jour");
        }
        return redirect()->back();
    }

	/**
	 * @param User $user
	 * @return RedirectResponse
	 * @throws \Exception
	 */
    public function destroy(User $user): RedirectResponse
    {
        if ($user->delete()) {
            return redirect(route('users.index'))->with('success', "L'utilisateur a bien été supprimé.");
        }
        return redirect(route('users.index'))->with('error', "L'utilisateur n'a pas pu être supprimé.");
    }

    public function myFavorites()
	{

	}
}
