<?php

namespace App\Http\Controllers\Auth;

use App\User, Auth;
use Validator, Session, Mail, Redirect;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
     * Where to redirect users after login / registration.
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
        $this->middleware('guest');
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
            'display_name' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    public function register(Request $request)
    {

        $validator = $this->validator($request->all());

        if($validator->fails())
        {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        $confirmation_code = $this->generateConfirmationToken();
        $user =  User::create([
            'first_name'=> $request->first_name,
            'last_name'=> $request->last_name,
            'display_name'=> $request->display_name,
            'name' =>  'sample',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 1,
            'confirmation_code'=> $confirmation_code,
        ]);
        Mail::send('mail.email_verification', ['user'=>$user], function($message) use ($user) {
            $message->to($user->email, $user->display_name)
                ->subject('Verify your email address');
        });

        Session::flash('message', 'Thanks for signing up! Please check your email.');

        return redirect('/');
    }

    public function showRegistrationForm ()
    {
        $data = [];
        $data['page'] = 'register';
        return view('index', $data);
    }

    public function generateConfirmationToken()
    {
      return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
          Session::flash('message', 'Confirmation code is valid.');
          return redirect('/');
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
          Session::flash('message', 'User not found with this confirmation code.');
          return redirect('/');
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        Session::flash('message', 'You have successfully verified your account');
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
}
