<?php

namespace App\Http\Controllers\Auth;

use App\Model\Role;
use App\Model\User;
use App\Http\Controllers\Controller;
use App\Notifications\RegisteredUser;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUser());
        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Verify the email adress with token
     *
     * @param int    $id
     * @param string $token
     * @return Redirector
     */
    public function confirm(int $id, string $token)
    {
        $user = User::where([['id', $id], ['verify_token', $token]])->first();
        if ($user) {
            $role = Role::where('name', 'user')->first();
            $user->roles()->attach($role);
            $user->update(['veriffy_token' => null]);
            $this->guard()->login($user);
            return redirect($this->redirectPath());
        } else {
            return redirect('/login')->with('error', 'Ce lien n\'est pas valide');
        }
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
        $default = null;
        $size = 40;
        $avatar = "https://www.gravatar.com/avatar/";
        $avatar .= md5(strtolower(trim($data['email'])));
        $avatar .= "?d=";
        $avatar .= urlencode($default);
        $avatar .= "&s=";
        $avatar .= $size;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'verify_token' => str_replace('/', '', bcrypt(str_random(16))),
            'avatar' => $avatar
        ]);
    }
}
