<?php

namespace App\Http\Controllers;

use App\GnrHotel;
use App\GnrHotelImages;
use App\SiteSettings;
use App\User;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mail;
use Redirect;

class AgentController extends Controller
{
  public function index()
  {
    $hotels_arr = [];

    if (Cache::has('agent_firstpage_hotels')) {
      $hotels_arr = Cache::get('agent_firstpage_hotels');
    } else {
      $hotels = GnrHotel::where("star_category", 5)->where('city_code', 121449)->take(10)->get(); // get hotels from dubai

      foreach ($hotels as $hotel) {
        $image_url = @GnrHotelImages::where('hotel_code', $hotel['hotel_code'])->where('main_image', 'Y')->first()->image_url;
        if ($image_url != null) {
          $hotel['image_url'] = "https://images.grnconnect.com/" . $image_url;
          $hotels_arr[] = $hotel;
        }

      }
      Cache::put('agent_firstpage_hotels', $hotels_arr, 2592000);

    }

    return view('agent.index', ['hotels' => $hotels_arr]);
  }

  public function AboutUs()
  {
    $about_us = SiteSettings::find(14);
    return view('agent.about_us', ['data' => unserialize($about_us['value'])]);
  }

  public function Legalinformation()
  {
    $legal_information = SiteSettings::find(12);
    return view('agent.legal', ['data' => unserialize($legal_information['value'])]);
  }

  public function TechnicalSupport()
  {
    $technical_support = SiteSettings::find(13);
    return view('agent.legal', ['data' => unserialize($technical_support['value'])]);
  }

  public function Page3DSecure()
  {
    $data = SiteSettings::find(15);
    return view('agent.about_us', ['data' => unserialize($data['value'])]);
  }

  public function PageAgentContracts()
  {
    $data = SiteSettings::find(16);
    return view('agent.about_us', ['data' => unserialize($data['value'])]);
  }

  public function PageTermOfUse()
  {
    $data = SiteSettings::find(17);
    return view('agent.about_us', ['data' => unserialize($data['value'])]);
  }

  public function PagePrivacyPolicy()
  {
    $data = SiteSettings::find(18);
    return view('agent.about_us', ['data' => unserialize($data['value'])]);
  }

  public function PageContactUs()
  {
    return view('agent.contact_us');
  }

  public function RegisterForm1()
  {
    return view('agent.register');
  }

  public function storeRegisterForm1(Request $request)
  {

    request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => 'required|confirmed|min:6',
      'agreement' => 'required',
    ]);

    $data = $request->all();

    $data['password'] = Hash::make($request->password);
    $data['user_type'] = "Agent";
    $data['registration_form_for_agent'] = serialize(['continue_key' => $this->_generateRandomString(12), 'status' => 'pending']);
    $user = User::create($data);
    $user->assignRole("Agent");

    return Redirect::to("/agents/wait-for-activation/$user->id/$user->email");

  }

  function _generateRandomString($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function WaitForActivation(Request $request)
  {
    $user = User::findOrFail($request->id);
    $continue_data = unserialize($user->registration_form_for_agent);
    $data = ['to_name' => $user->name, 'domain' => "TRIPSERB2B.COM", 'to_email' => $user->email,
      'token' => $continue_data['continue_key'], 'subject' => 'TRIPSERB2B - Registration'];


    $send_mail = App('App\Http\Controllers\MailController')->SendRegisterVerificationLink(
      $user->email, $user->name, 'noreply@tripserb2b.com', 'No-Reply', $data, $user);

    return view('agent.wait_for_activation', ['id' => $user->id]);
  }

  public function VerifyEmailAndContinueRegistration($id, $token)
  {
    $user = User::findOrFail($id);
    $continue_data = unserialize($user->registration_form_for_agent);
    if (is_array($continue_data) and $continue_data['status'] == 'pending' and $continue_data['continue_key'] == $token) {
      return view('agent.register_form_1', ['user' => $user, 'continue_data' => $continue_data]);
    } else {
      return view('agent.message', ['title' => "Error", 'message' => 'Sorry, your token expired!']);
    }
  }

  public function storeRegisterForm2(Request $request, $id)
  {

    $user = User::findOrFail($id);
    $registration_form_for_agent = unserialize($user->registration_form_for_agent);
    if ($registration_form_for_agent['status'] != 'pending' or !is_array($registration_form_for_agent)) {
      abort(404);
    }


    $data['registration_form_for_agent'] = serialize(['continue_key' => $this->_generateRandomString(12), 'status' => 'pending']);
    request()->validate([
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
      'state' => ['max:255'],
      'city' => ['max:255'],
      'pincode' => ['max:255']
    ]);

    $data = $request->all();
    $data['registration_form_for_agent'] = serialize(['status' => 'competed']);
    $user->fill($data)->save();

    return view('agent.message', ['title' => "Thank You", 'message' => 'Please wait for the admin approval']);


  }
}
