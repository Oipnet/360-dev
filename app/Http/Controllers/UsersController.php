<?php
namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    /**
     * @return Response
     */
    public function myFavorites(): Response
    {
        $myFavorites = Auth::user()->favorites;
        return response()->view('users.favorites', compact('myFavorites'));
    }

}