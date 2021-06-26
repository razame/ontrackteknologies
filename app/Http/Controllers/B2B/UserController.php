<?php

namespace App\Http\Controllers\B2B;

use App;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Redirect;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $user = Auth::user();
    if ($user->hasRole("SuperAdmin")) {
      $users = User::where('user_type', 'User')->orderBy('created_at', 'DESC')->get();
    } else {
      $users = User::where('user_type', 'User')->where('parent_id', $user->id)->orderBy('created_at', 'DESC')->get();
    }
    return view('B2B/users/index_user', ['users' => $users]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

    $branches = User::where('user_type', 'Branch')->orderBy('name')->pluck('name', 'id')->all();
    return view("B2B/users/add_new_user", ['branches' => $branches]);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param Request $request
   * @return Response
   */
  public function store(Request $request)
  {
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
      'user_role' => ['max:255'],
      'approved' => ['max:255'],
      'password' => ['required', 'min:6', 'max:255'],
      'email_signature' => ['max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'secondary_email' => ['max:255'],
      'parent_id' => ['max:255'],

    ]);

    $data = $request->all();


    $data['password'] = Hash::make($request->password);
    $data['created_by'] = Auth::user()->id;
    $data['user_type'] = "User";
    $user = User::create($data);
    $user->assignRole("User");

    return Redirect::to("B2B-Users")->withSuccess('Great! User added.');
  }

  /**
   * Display the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    $user = User::find($id);
    $branches = User::where('user_type', 'Branch')->orderBy('name')->pluck('name', 'id')->all();

    return view("B2B/users/edit_user", ['user' => $user, 'branches' => $branches]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {

    $user = User::findOrFail($id);
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
      'user_role' => ['max:255'],
      'approved' => ['max:255'],
      'password' => ['min:6', 'nullable'],
      'email_signature' => ['max:255'],
      'secondary_email' => ['max:255'],
      'parent_id' => ['max:255'],
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
    ]);

    $data = $request->all();


    $data['updated_by'] = Auth::user()->id;
    $user->fill($data)->save();
    return Redirect::to("B2B-Users")->withSuccess('Great! User updated.');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
