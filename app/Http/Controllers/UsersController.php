<?php

namespace App\Http\Controllers;

use App\Model\Role;
use App\Model\User;
use App\Repository\RoleRepository;
use App\Service\DiscordService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use RestCord\DiscordClient;

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
     * @param DiscordService $discord
     * @param RoleRepository $roleRepository
     * @return RedirectResponse
     */
	public function update(Request $request, DiscordService $discord, RoleRepository $roleRepository): RedirectResponse
	{
	    $discord_id = $request->input('discord_id') ?? null;
        $data       = [];
        if ($discord_id) {
            $memberRoles = $discord->getMemberRoles($discord_id);
            if (in_array('@admin', $memberRoles)) {
                $role_admin      = $roleRepository->getBySlug('admin');
                $data['role_id'] = $role_admin->id;
            }
        }
        if ($discord_id && $request->has('use_discord')) {
            $discord_user   = $discord->getUser($discord_id);
            $data['name']   = $discord_user->username;
            $data['avatar'] = $discord_user->getAvatar();
        }
		if (Auth::user()->update(array_merge($request->all(), $data))) {
			return redirect()->route('user.account')->with('success', 'Votre compte a bien été mis à jour');
		}
		return redirect()->back()->with('danger', 'Votre compte n\'a pas pu être à jour.');
	}
}
