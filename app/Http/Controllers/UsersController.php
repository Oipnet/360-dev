<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

	/**
	 * @return \Illuminate\Http\Response
	 */
	public function myFavorites(): Response
	{
		$myFavorites = Auth::user()->favorites;
		return response()->view('users.favorites', compact('myFavorites'));
	}

	/**
	 * @return Response
	 */
	public function myAccount(): Response
	{
		return response()->view('users.account', ['user' => Auth::user()]);
	}

	/**
	 * @param Request $request
	 * @param User $user
	 * @return RedirectResponse
	 */
	public function update(Request $request): RedirectResponse
	{
		if (Auth::user()->update($request->all())) {
			return redirect()->route('user.account')->with('success', 'Votre compte a bien été mis à jour');
		}
		return redirect()->back()->with('danger', 'Votre compte n\'a pas pu être à jour.');
	}
}
