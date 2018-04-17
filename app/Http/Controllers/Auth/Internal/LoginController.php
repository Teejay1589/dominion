<?php

namespace App\Http\Controllers\Auth\Internal;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
use Auth;

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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/m/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.m.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);
      // Attempt to log the user in
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        return redirect()->intended(url('/m/home'));
      } else {
        // dd('These credentials do not match our records.');
        return redirect()->back()->withErrors(['email' => 'These credentials do not match our records.'])->withInput($request->only('email', 'remember'));
      }
    }

    public function logout(Request $request)
    {
        if( isset($request['_token']) && strlen($request['_token']) == 40 ) {
            $request->session()->invalidate();
            session()->flash('success', 'Logout Successful');
            return redirect('/m/login');
        }
        return redirect()->back();
    }
}
