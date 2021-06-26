<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\SiteSettings;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Validator;

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
    $this->middleware('guest')->except('logout');
  }

  // Login
  public function showLoginForm()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    $legal_information = SiteSettings::find(12);
    $technical_support = SiteSettings::find(13);
    return view('/auth/login', [
      'pageConfigs' => $pageConfigs,
      'legal_information' => unserialize($legal_information['value']),
      'technical_support' => unserialize($technical_support['value']),
    ]);
  }

  public function authenticate(Request $request)
  {
    $credentials = $request->only('email', 'password');

    $user = User::where("email", $request->email)->first();

    if (isset($user) and $user->approved == 1) {
      if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->intended('B2B-reservation');
      }
    } else {
      return Redirect::to("auth-login")->withErrors('User not activated.');

    }

    return Redirect::to("auth-login")->withErrors('Oppes! You have entered invalid credentials');

  }

  /**
   * Log the user out of the application.
   *
   * @param Request $request
   * @return Response
   */
  public function logout(Request $request)
  {
    $this->guard()->logout();

    $request->session()->invalidate();

    return $this->loggedOut($request) ?: redirect('/agents');
  }
}
