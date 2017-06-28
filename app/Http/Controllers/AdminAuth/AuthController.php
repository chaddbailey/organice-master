<?php

namespace App\Http\Controllers\AdminAuth;

use App\Admin;
use App\ServiceType;
use Illuminate\Http\Request;
use Validator;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/admin/dashboard';
    protected $guard = 'admin';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    public function showLoginForm(){

        if(view()->exists('auth.authenticate')){
            return view('auth.authenticate');
        }
        return view('admin.auth.login');
    }
    
    public function showRegistrationForm(Request $request){

        $servicetypes = ServiceType::all();
        // Handle the user upload of avatar
       if($request->hasFile('avatar')){
          $avatar = $request->file('avatar');
          $filename = time() . '.' . $avatar->getClientOriginalExtension();
          Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

          $admin = Auth::guard('admin')->user();
          $admin->avatar = $filename;
          $admin->save();
        }
        if($request->hasFile('slider')){
          $slider = $request->file('slider');
          $filename = time() . '.' . $slider->getClientOriginalExtension();
          Image::make($slider)->resize(300, 300)->save( public_path('/uploads/sliders/' . $filename ) );

          $admin = Auth::guard('admin')->user();
          $admin->slider = $filename;
          $admin->save();
        }
        return view('admin.auth.register',compact('servicetypes'));
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:admins,email',
            'address' => 'required|max:255',
            'contactperson' => 'required|max:255',
            'contactnumber' => 'required|regex:/(09)[0-9]{9}/',
            'servicetype' => 'required',
            'password' => 'required|min:6|confirmed',

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
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'address' => $data['address'],
            'contactperson' => $data['contactperson'],
            'contactnumber' => $data['contactnumber'],
            'servicetype' => $data['servicetype'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
