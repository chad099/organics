<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request, Validator, Redirect, Auth, Session;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function validator(array $data, $rules)
    {
        return Validator::make($data, $rules);
    }

    public function login(Request $request) {
  		$user = array(
  			'email'=>$request->email,
  			'password'=>$request->password
  		);
      $rules = [
          'email' => 'required|email|max:255',
          'password' => 'required|min:6',
      ];
  		$v = $this->validator($request->all(), $rules);
  		if($v->fails()){
  			return Redirect::back()->withErrors($v)->withInput();
  		}
  		if(Auth::attempt($user)) {
  				if(Auth::user()->role == 0)
  					return redirect()->intended('/admin');
  				else
  					return redirect()->intended('/');
  			} else {
  					Session::flash('loginError', 'User not found');
  					return Redirect::back();
  			}
		}

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
