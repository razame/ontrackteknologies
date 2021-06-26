<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\Setting;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Redirect;

class SettingController extends Controller
{

  public function Commission()
  {
    $commission = Auth::user()->commission;
    if ($commission == null) {
      $commission = ['hotel_reservations_percent' => '0.00'];
    } else {
      $commission = unserialize($commission);
    }
    return view('B2B.settings.commission', $commission);
  }

  public function UpdateCommission(Request $request)
  {
    request()->validate([
      'hotel_reservations_percent' => ['required', 'string', 'max:255']
    ]);

    $user = User::find(Auth::user()->id);
    $user->commission = serialize(['hotel_reservations_percent' => $request->hotel_reservations_percent]);
    $user->save();

    return Redirect::back()->withSuccess('Great! Setting Saved.');

  }

  public function HotelAPI()
  {

    $data['gnr_hotel_api_key'] = Setting::where("name", 'gnr_hotel_api_key')->first()->value;
    $data['gnr_hotel_api_end_point'] = Setting::where("name", 'gnr_hotel_api_end_point')->first()->value;

    return view('B2B.settings.hotel_api', $data);
  }

  public function HotelApiStore(Request $request)
  {
    request()->validate([
      'gnr_hotel_api_key' => ['required', 'string', 'max:255'],
      'gnr_hotel_api_end_point' => ['required', 'string', 'max:255']
    ]);

    $data = $request->all();
    //save setting
    $gnr_hotel_api_key = Setting::where("name", 'gnr_hotel_api_key')->first();
    $gnr_hotel_api_key->value = $data['gnr_hotel_api_key'];
    $gnr_hotel_api_key->save();

    $gnr_hotel_api_end_point = Setting::where("name", 'gnr_hotel_api_end_point')->first();
    $gnr_hotel_api_end_point->value = $data['gnr_hotel_api_end_point'];
    $gnr_hotel_api_end_point->save();

    return Redirect::to("B2B-Hotel-API")->withSuccess('Great! Setting Saved.');

  }


  public function GTpayAPI()
  {

    $data['gtpay_merchant_id'] = Setting::where("name", 'gtpay_merchant_id')->first()->value;
    $data['gtpay_key'] = Setting::where("name", 'gtpay_key')->first()->value;
    $data['gtpay_endpoint'] = Setting::where("name", 'gtpay_endpoint')->first()->value;

    return view('B2B.settings.gtpay_api', $data);
  }

  public function GTpayApiStore(Request $request)
  {
    request()->validate([
      'gtpay_merchant_id' => ['required', 'string', 'max:255'],
      'gtpay_key' => ['required', 'string', 'max:255'],
      'gtpay_endpoint' => ['required', 'string', 'max:255'],
    ]);

    $data = $request->all();
    //save setting
    $gtpay_merchant_id = Setting::where("name", 'gtpay_merchant_id')->first();
    $gtpay_merchant_id->value = $data['gtpay_merchant_id'];
    $gtpay_merchant_id->save();

    $gtpay_key = Setting::where("name", 'gtpay_key')->first();
    $gtpay_key->value = $data['gtpay_key'];
    $gtpay_key->save();

    $gtpay_endpoint = Setting::where("name", 'gtpay_endpoint')->first();
    $gtpay_endpoint->value = $data['gtpay_endpoint'];
    $gtpay_endpoint->save();

    return Redirect::to("B2B-GTpay-API")->withSuccess('Great! Setting Saved.');

  }

  // MIGS mastercard payment gateway
  public function MIGSAPI()
  {

    $data['migs_merchant_id'] = Setting::where("name", 'migs_merchant_id')->first()->value;
    $data['migs_api_password'] = Setting::where("name", 'migs_api_password')->first()->value;
    $data['migs_endpoint'] = Setting::where("name", 'migs_endpoint')->first()->value;
    $data['migs_status'] = Setting::where("name", 'migs_status')->first()->value;

    return view('B2B.settings.migs_api', $data);
  }

  // MIGS mastercard payment gateway
  public function MIGSApiStore(Request $request)
  {
    request()->validate([
      'migs_merchant_id' => ['required', 'string', 'max:255'],
      'migs_api_password' => ['required', 'string', 'max:255'],
      'migs_endpoint' => ['required', 'string', 'max:255'],
      'migs_status' => ['required', 'string', 'max:255'],
    ]);

    $data = $request->all();
    //save setting
    $migs_merchant_id = Setting::where("name", 'migs_merchant_id')->first();
    $migs_merchant_id->value = $data['migs_merchant_id'];
    $migs_merchant_id->save();

    $migs_api_password = Setting::where("name", 'migs_api_password')->first();
    $migs_api_password->value = $data['migs_api_password'];
    $migs_api_password->save();

    $migs_endpoint = Setting::where("name", 'migs_endpoint')->first();
    $migs_endpoint->value = $data['migs_endpoint'];
    $migs_endpoint->save();

    $migs_status = Setting::where("name", 'migs_status')->first();
    $migs_status->value = $data['migs_status'];
    $migs_status->save();

    return Redirect::to("B2B-MIGS-API")->withSuccess('Great! Setting Saved.');

  }
}
