<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

	/**
	 * @return \Illuminate\Http\Response
	 */
	public function myFavorites()
	{
		$myFavorites = Auth::user()->favorites;
		return response()->view('users.favorites', compact('myFavorites'));
	}
}
