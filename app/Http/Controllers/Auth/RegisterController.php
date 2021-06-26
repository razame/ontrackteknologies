<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Redirect;

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
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  public function showRegistrationForm()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/auth/register', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  public function postRegistration(Request $request)
  {
    request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'contact_person' => ['required', 'string', 'max:255'],
      'website' => ['required', 'string', 'max:255'],
      'phone_number_1' => ['required', 'string', 'max:255'],
      'mobile' => ['required', 'string', 'max:255'],
      'fax_number' => ['max:255'],
      'pan' => ['max:255'],
      'tax' => ['max:255'],
      'address1' => ['max:255'],
      'address2' => ['max:255'],
      'country' => ['max:255'],
      'state' => ['max:255'],
      'city' => ['max:255'],
      'pincode' => ['max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['string', 'min:8', 'confirmed'],
    ]);

    $data = $request->all();

    $check = $this->create($data);

    return Redirect::to("registration-completed")->withSuccess('Great! You have Successfully loggedin');
  }

  // Register

  /**
   * Create a new user instance after a valid registration.
   *
   * @param array $data
   * @return User
   */
  protected function create(array $data)
  {
    return User::create([
      'name' => $data['name'],
      'contact_person' => $data['contact_person'],
      'website' => $data['website'],
      'phone_number_1' => $data['phone_number_1'],
      'mobile' => $data['mobile'],
      'fax_number' => $data['fax_number'],
      'pan' => $data['pan'],
      'tax' => $data['tax'],
      'address1' => $data['address1'],
      'address2' => $data['address2'],
      'country' => $data['country'],
      'state' => $data['state'],
      'city' => $data['city'],
      'pincode' => $data['pincode'],
      'email' => $data['email'],
      'password' => Hash::make($data['email']),
    ]);
  }

  public function lock_screen()
  {
    $pageConfigs = [
      'bodyClass' => "bg-full-screen-image",
      'blankPage' => true
    ];

    return view('/auth/registration-completed', [
      'pageConfigs' => $pageConfigs
    ]);
  }

  // Lock Screen

  /**
   * Get a validator for an incoming registration request.
   *
   * @param array $data
   * @return \Illuminate\Contracts\Validation\Validator
   */
  protected function validator(array $data)
  {
    return Validator::make($data, [
      'name' => ['required', 'string', 'max:255'],
      'contact_person' => ['required', 'string', 'max:255'],
      'website' => ['required', 'string', 'max:255'],
      'phone_number_1' => ['required', 'string', 'max:255'],
      'mobile' => ['required', 'string', 'max:255'],
      'fax_number' => ['max:255'],
      'pan' => ['max:255'],
      'tax' => ['max:255'],
      'address1' => ['max:255'],
      'address2' => ['max:255'],
      'country' => ['max:255'],
      'state' => ['max:255'],
      'city' => ['max:255'],
      'pincode' => ['max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['string', 'min:8', 'confirmed'],
    ]);
  }
}
