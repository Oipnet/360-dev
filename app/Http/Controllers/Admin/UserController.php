<?php

namespace App\Http\Controllers\Admin;

use App\Concern\Admin\TraitAdminController;
use App\Http\Controllers\Controller;
use App\Model\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    use TraitAdminController;

    const __MODEL = 'App\\Model\\User';

    protected $view = 'user';

    protected $validator = [];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', self::__MODEL);
        $items = User::with('roles')->get();
        return view('admin.' . $this->view . '.index', compact('items'));
    }

    public function destroy(User $user)
    {
        $this->authorize('delete', $user);
        $user->roles()->detach();
        $user->delete();
        return $this->index()->with('success', 'Utilisateur supprimé');
    }
}
