<?php

namespace App\Http\Controllers\B2B;

use App\GnrCity;
use App\GnrCountry;
use App\GnrHotel;
use App\GnrLog;
use App\Http\Controllers\Controller;
use App\Setting;
use Auth;
use Cache;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GnrController extends Controller
{

  var $GnrAPIKEY = '';
  var $GnrHotelApiEndPoint = '';
  var $RequestHeader = [];

  public function __construct()
  {
    if (!Cache::has('gnr_settings')) {
      $countries = GnrCountry::all();
      foreach ($countries as $country) {
        Cache::put($country->country_code_2_letter, $country->country_name);
      }
    }
    $gnr_settings = Setting::where("name", "gnr_hotel_api_key")->orWhere("name", "gnr_hotel_api_end_point")->get();
    foreach ($gnr_settings as $setting) {
      if ($setting->name == 'gnr_hotel_api_key') {
        $this->GnrAPIKEY = $setting->value;
      }
      if ($setting->name == 'gnr_hotel_api_end_point') {
        $this->GnrHotelApiEndPoint = $setting->value;
      }

      $this->RequestHeader = [
        'api-key' => $this->GnrAPIKEY,
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
        'Accept-Encoding' => 'application/gzip',
      ];
    }
  }

  // get city name  - AJAX REQUEST - from search box
  public function ReginLists(Request $request)
  {

    if (empty($request->input('q')) or strlen($request->input('q')) < 2) {

      return response()->json([]);
    }

    $regionArr = [];
    if (!Cache::has('b2b_search_box_1' . $request->input('q'))) {

      // search in cities and result with country name
      $regions = GnrCity::where("city_name", "like", '%' . $request->input('q') . '%')->get()->toArray();

      foreach ($regions as $region) {
        $regionArr[] = ['id' => $region['city_code'], 'text' => $region['city_name'] . ' ' . Cache::get($region['country_code']) . '  [CITY]'];
      }

      // search in hotels
      $hotels = GnrHotel::where("hotel_name", "like", '%' . $request->input('q') . '%')->get()->toArray();

      foreach ($hotels as $hotel) {
        $regionArr[] = ['id' => $hotel['hotel_code'], 'text' => $hotel['hotel_name'] . ' ' . Cache::get($hotel['country_code']) . '  [HOTEL]'];
      }

      Cache::put('b2b_search_box_1' . $request->input('q'), serialize($regionArr), 2592000);
    } else {
      $regionSer = Cache::get('b2b_search_box_1' . $request->input('q'));
      $regionArr = unserialize($regionSer);
    }
    return response()->json($regionArr);
  }


  // get hotels by cities, countries, ... STATIC DATA
  public function hotels($search)
  {
    $response = Http::withHeaders($this->RequestHeader)->get(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels?" . $search
    );

    return $response->json();
  }


  // get available hotels
  public function hotelsAvailability($hotel_id_list, $check_in_date, $check_out_date, $currency, $source_market, $rooms, $rates = 'concise', $search_log_id)
  {
    $data = [
      'hotel_codes' => $hotel_id_list, 'checkin' => $check_in_date,
      'checkout' => $check_out_date, 'rates' => $rates, 'client_nationality' => $source_market,
      'rooms' => $rooms, 'cutoff_time' => 30000, 'version' => '2.0'
    ];


    $grn_log_id = $this->saveGrnLog($search_log_id, 'availability', $data, []);


    $response = Http::withHeaders($this->RequestHeader)->post(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels/availability",
      [
        'hotel_codes' => $hotel_id_list, 'checkin' => $check_in_date,
        'checkout' => $check_out_date, 'rates' => $rates, 'client_nationality' => $source_market,
        'rooms' => $rooms, 'cutoff_time' => 30000, 'version' => '2.0'
      ]
    );


    $this->updateGrnLog($grn_log_id, $response->json());

    return $response->json();
  }


  // get hotel images

  public function saveGrnLog($search_log_id, $function, $request, $response)
  {
    $user_id = isset(Auth::user()->id) ? Auth::user()->id : null;
    $gnr_log = GnrLog::create(['search_log_id' => (int)$search_log_id, 'function' => $function,
      'request' => $request, 'response' => $response, 'user_id' => $user_id]);
    return $gnr_log->id;
  }

  public function updateGrnLog($grn_log_id, $response)
  {
    $grn_log = GnrLog::find($grn_log_id);
    $grn_log->response = $response;
    $grn_log->save();
  }


  //recheck rate_key before booking

  public function GetHotelimages($hotel_code)
  {
    $response = Http::withHeaders($this->RequestHeader)->get(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels/$hotel_code/images");

    return $response->json();
  }

  public function RefetchAvailabilityForSingleHotel($sid, $hcode, $bundled = true, $search_log_id)
  {
    $data = ['sid' => $sid, 'hcode' => $hcode];
    $grn_log_id = $this->saveGrnLog($search_log_id, 'RefetchAvailabilityForSingleHotel', $data, []);

    $response = Http::withHeaders($this->RequestHeader)
      ->get($this->GnrHotelApiEndPoint . "/api/v3/hotels/availability/" . $data['sid'] . "?hcode=" . $data['hcode'] . "&bundled=true");

    $this->updateGrnLog($grn_log_id, $response->json());

    return $response->json();
  }

  // fetch booking

  public function RateRecheck($search_id, $rate_key, $group_code, $search_log_id)
  {
    $data = ['rate_key' => $rate_key, 'group_code' => $group_code, 'search_id' => $search_id];
    $grn_log_id = $this->saveGrnLog($search_log_id, 'RateRecheck', $data, []);
//        dd(json_encode(['rate_key' => $rate_key, 'group_code' => $group_code]));
    $response = Http::withHeaders($this->RequestHeader)->post(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels/availability/$search_id/rates/?action=recheck",
      ['rate_key' => $rate_key, 'group_code' => $group_code]
    );

    $this->updateGrnLog($grn_log_id, $response->json());
//  dd(json_encode($response->json()));
    return $response->json();
  }

  public function Booking(
    $search_id,
    $hotel_code,
    $city_code,
    $booking_name,
    $group_code,
    $checkin,
    $checkout,
    $payment_type,
    $holder,
    $booking_items,
    $booking_comments,
    $agent_reference,
    $search_log_id
  )
  {

    $data = [
      'search_id' => $search_id, 'hotel_code' => $hotel_code, 'city_code' => $city_code, 'booking_name' => $booking_name,
      'group_code' => $group_code, 'checkin' => $checkin, 'checkout' => $checkout, 'payment_type' => $payment_type, 'holder' => $holder,
      'booking_items' => $booking_items, 'booking_comments' => $booking_comments, 'agent_reference' => $agent_reference
    ];
    $grn_log_id = $this->saveGrnLog($search_log_id, 'Booking', $data, []);

    $response = Http::withHeaders($this->RequestHeader)->post(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels/bookings",
      $data
    );

    $this->updateGrnLog($grn_log_id, $response->json());

    return $response->json();
  }

  public function FetchBooking($bref, $type = 'Grn')
  {
    $data = ['bref' => $bref, 'type' => $type];
    //$grn_log_id = $this->saveGrnLog($search_log_id,'FetchBooking',json_encode($data),[]);

    $response = Http::withHeaders($this->RequestHeader)
      ->get($this->GnrHotelApiEndPoint . "/api/v3/hotels/bookings/" . $data['bref'] . "?type=" . $data['type']);

    //$this->updateGrnLog($grn_log_id,$response->json());
    return $response->json();
  }

  //Cancel Booking

  public function GenerateVoucherForBooking($bref)
  {
    $response = Http::withHeaders($this->RequestHeader)
      ->post($this->GnrHotelApiEndPoint . "/api/v3/hotels/bookings/$bref/voucher");

    return $response->json();
  }

  // Save GRN CONNECT request and response

  public function ViewVoucherForBooking($bref)
  {
    $response = Http::withHeaders($this->RequestHeader)
      ->get($this->GnrHotelApiEndPoint . "/api/v3/hotels/bookings/$bref/voucher");

    return $response->json();
  }

  // update grn log

  public function CancelBooking($bref, $comments, $reason, $search_log_id)
  {
    $data = ['bref' => $bref, 'comments' => $comments, 'reason' => $reason];
    $grn_log_id = $this->saveGrnLog($search_log_id, 'CancelBooking', $data, []);

    $response = Http::withHeaders($this->RequestHeader)->delete(
      $this->GnrHotelApiEndPoint . "/api/v3/hotels/bookings/" . $bref,
      $data
    );

    $this->updateGrnLog($grn_log_id, $response->json());

    return $response->json();
  }
}
