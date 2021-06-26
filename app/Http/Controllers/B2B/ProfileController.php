<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\Rules\MatchOldPassword;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Redirect;

class ProfileController extends Controller
{

  // edit profile
  public function EditProfile()
  {
    $user = User::findOrFail(Auth::user()->id);

    return view("B2B/profile/edit_profile", ['user' => $user]);
  }

  // update profile
  public function UpdateProfile(Request $request)
  {
    $user = User::findOrFail(Auth::user()->id);
    request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'phone_number_1' => ['max:255'],
      'mobile' => ['max:255'],
      'fax_number' => ['max:255'],
      'pan' => ['max:255'],
      'tax' => ['max:255'],
      'address1' => ['max:255'],
      'address2' => ['max:255'],
      'country' => ['max:255'],
      'currency' => ['max:255'],
      'state' => ['max:255'],
      'city' => ['max:255'],
      'email_signature' => ['max:255'],
      'secondary_email' => ['max:255'],
      'logo' => 'mimes:jpg,png,jpeg|max:5048',
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
    ]);


    $data = $request->all();
    if (isset($request->logo)) {
      $fileName = time() . '.' . $request->logo->extension();
      $fileName_ = $fileName;
      $request->logo->move(public_path('uploads'), $fileName);
      $data['logo'] = $fileName_;
    }

    $data['updated_by'] = Auth::user()->id;
    $user->fill($data)->save();
    return Redirect::back()->withSuccess('Your Profile Updated.');
  }

  // change password
  public function ChangePassword()
  {
    return view("B2B/profile/change_password");
  }

  // update password
  public function UpdateChagePassword(Request $request)
  {
    request()->validate([
      'current_password' => ['required', new MatchOldPassword],
      'new_password' => ['required', 'min:6'],
      'confirm_password' => ['same:new_password'],
    ]);

    User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

    return Redirect::back()->withSuccess('Your Password Changed.');
  }

  public function CreateRole()
  {

    // $user = User::find(63);
    // $user->deposit(200000);
    // //$role = Role::create(['name' => 'SuperAdmin']);
    // //$role = Role::create(['name' => 'Agent']);
    // //$role = Role::create(['name' => 'Branch']);
    // //$role = Role::create(['name' => 'User']);
    // // $user = User::find(1);
    // $user->assignRole("SuperAdmin");

    //$user = User::find(13);
    //$user->assignRole("Agent");

    //$user = User::find(14);
    // $user->assignRole("Agent");

  }
}
