<?php

namespace App\Http\Controllers\Auth;

use App\Model\Role;
use App\Model\User;
use App\Http\Controllers\Controller;
use App\Repository\RoleRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

	/**
	 * @var RoleRepository
	 */
	private $roleRepository;

	/**
	 * Create a new controller instance.
	 *
	 * @param RoleRepository $roleRepository
	 */
    public function __construct(RoleRepository $roleRepository)
    {
        $this->middleware('guest');
		$this->roleRepository = $roleRepository;
	}

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Model\User
     */
    protected function create(array $data)
    {
        $roleMember = $this->roleRepository->getBySlug('membre');
    	if ($roleMember) {
    		$data['role_id'] = $roleMember->id;
		} else {
			$data['role_id'] = 0;
		}
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
			'role_id'  => $data['role_id'],
        ]);
    }
}
