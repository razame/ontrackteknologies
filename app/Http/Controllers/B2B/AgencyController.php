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

class AgencyController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $users = User::where('user_type', 'Agent')->orderBy('approved', 'DESC')->get();
    return view('B2B/agencies/index_agent', ['users' => $users]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view("B2B/agencies/add_new_agent");
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
      'contact_person' => ['max:255'],
      'website' => ['max:255'],
      'phone_number_1' => ['max:255'],
      'phone_number_2' => ['max:255'],
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
      'pincode' => ['max:255'],
      'approved' => ['max:255'],
      'email_signature' => ['max:255'],
      'logo' => 'mimes:jpg,png,jpeg|max:2048',
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'secondary_email' => ['max:255'],
      'password' => ['required', 'string', 'min:6'],
      'e_ticket' => ['max:255'],
      'voucher' => ['max:255'],
      'hotel_price_display' => ['max:255'],
      'enable_user_arkup' => ['max:255'],
      'show_user_markup' => ['max:255'],
      'agency_markup_on_air_non_air_search_result' => ['max:255'],
      'quick_search_result' => ['max:255'],
      'agency_hotel_markup_type' => ['max:255'],
      'agency_hotel_markup_value' => ['max:255'],
      'signed_contract' => 'mimes:jpg,png,jpeg|max:2048',
    ]);

    $data = $request->all();
    if (isset($request->logo)) {
      $fileName = time() . '.' . $request->logo->extension();
      $fileName_ = $fileName;
      $request->logo->move(public_path('uploads'), $fileName);
      $data['logo'] = $fileName_;
    }

    if (isset($request->signed_contract)) {
      $fileName = time() . '.' . $request->signed_contract->extension();
      $fileName_ = $fileName;
      $request->signed_contract->move(public_path('uploads'), $fileName);
      $data['signed_contract'] = $fileName_;
    }

    $data['password'] = Hash::make($request->password);
    $data['created_by'] = Auth::user()->id;
    $data['parent_id'] = Auth::user()->id;
    $data['user_type'] = "Agent";
    $user = User::create($data);
    $user->assignRole("Agent");


    return Redirect::to("B2B-Agencies")->withSuccess('Great! Agent added.');
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
    return view("B2B/agencies/edit_agent", ['user' => $user]);
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
      'contact_person' => ['max:255'],
      'website' => ['max:255'],
      'phone_number_1' => ['max:255'],
      'phone_number_2' => ['max:255'],
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
      'pincode' => ['max:255'],
      'approved' => ['max:255'],
      'email_signature' => ['max:255'],
      'logo' => 'mimes:jpg,png,jpeg|max:2048',
      'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id),],
      'secondary_email' => ['max:255'],
      'password' => ['min:6', 'nullable'],
      'e_ticket' => ['max:255'],
      'voucher' => ['max:255'],
      'hotel_price_display' => ['max:255'],
      'enable_user_arkup' => ['max:255'],
      'show_user_markup' => ['max:255'],
      'agency_markup_on_air_non_air_search_result' => ['max:255'],
      'quick_search_result' => ['max:255'],
      'agency_hotel_markup_type' => ['max:255'],
      'agency_hotel_markup_value' => ['max:255'],
      'signed_contract' => 'mimes:jpg,png,jpeg,pdf,zip,rar|max:20480',
    ]);

    $data = $request->all();
    if (isset($request->logo)) {
      $fileName = time() . '.' . $request->logo->extension();
      $fileName_ = $fileName;
      $request->logo->move(public_path('uploads'), $fileName);
      $data['logo'] = $fileName_;
    }
    if (isset($request->signed_contract)) {
      $fileName = time() . '.' . $request->logo->extension();
      $fileName_ = $fileName;
      $request->logo->move(public_path('uploads'), $fileName);
      $data['signed_contract'] = $fileName_;
    }

    if (!empty($data['password'])) {
      $data['password'] = Hash::make($request->password);
    } else {
      unset($data['password']);
    }
    $data['parent_id'] = Auth::user()->id;
    $data['updated_by'] = Auth::user()->id;
    $user->fill($data)->save();
    return Redirect::to("B2B-Agencies")->withSuccess('Great! Agent updated.');

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    $user = User::find($id)->delete();
    return Redirect::back()->withSuccess('Agent REMOVED.');

  }
}
