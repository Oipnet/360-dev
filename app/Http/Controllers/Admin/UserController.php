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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::user()->hasRole('admin')) {
            return redirect()->back();
        }
        $items = User::with('roles')->get();
        return view('admin.' . $this->view . '.index', compact('items'));
    }
}
