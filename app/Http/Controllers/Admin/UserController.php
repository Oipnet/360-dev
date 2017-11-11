<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Response;

class UserController extends Controller
{

    /**
     * @return Response
     */
    public function index(): Response
    {
        $users = User::orderBy('created_at', 'DESC')->get();
        return response()->view('admin.users.index', compact('users'));
    }
}