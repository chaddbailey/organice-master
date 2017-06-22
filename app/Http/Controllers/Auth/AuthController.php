<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\EventType;
use App\Admin;
use DB;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'client/dashboard';
    protected $guard = 'user';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showRegistrationForm(){

        $events = EventType::all();

        return view('auth/register',compact('events'));
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
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'firstname'=> 'required|max:255',
            'lastname'=> 'required|max:255',
            'location' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'firstname'=> $data['firstname'],
            'lastname'=> $data['lastname'],
            'location' => $data['location'],
            'event' => $data['event'],
            'others' => $data['others'],
            'budget' => $data['budget'],
            'mobile' => $data['mobile'],
        ]);
    }

    public function logout()
    {
        Db::table('nearby')->delete();
        Auth::logout();
        $admins = Admin::all();
        return view('welcome', compact('admins'));
    }
}
