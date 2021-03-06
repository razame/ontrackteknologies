<?php

namespace App\Http\Controllers;

use Password;

class AuthenticationController extends Controller
{
  // Login
  public function login()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/pages/auth-login', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  // Register
  public function register()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/pages/auth-register', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  // Forgot Password
  public function forgot_password()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/pages/auth-forgot-password', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  public function forgot()
  {

    $credentials = request()->validate(['email' => 'required|email']);

    Password::sendResetLink($credentials);

    return response()->json(["msg" => 'Reset password link sent on your email id.']);
  }

  // Reset Password
  public function reset_password()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/pages/auth-reset-password', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  public function reset()
  {
    $credentials = request()->validate([
      'email' => 'required|email',
      'token' => 'required|string',
      'password' => 'required|string|confirmed'
    ]);

    $reset_password_status = Password::reset($credentials, function ($user, $password) {
      $user->password = $password;
      $user->save();
    });

    if ($reset_password_status == Password::INVALID_TOKEN) {
      return response()->json(["msg" => "Invalid token provided"], 400);
    }

    return response()->json(["msg" => "Password has been successfully changed"]);
  }

  // Lock Screen
  public function lock_screen()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/pages/auth-lock-screen', [
      'pageConfigs' => $pageConfigs
    ]);
  }
}
