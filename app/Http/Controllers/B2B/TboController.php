<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\TboAirline;
use App\TboAirport;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TboController extends Controller
{
  var $TboAirApiEndPoint = 'https://xmloutapi.tboair.com/api/v1/';
  var $TboAirApiUserName = 'Onttest';
  var $TboAirApiPassword = 'Ot@131020';
  var $TboAirApiBookingMode = 'API';
  var $RequestHeader = [];

  public function __construct()
  {
    if (!Cache::has('tbo_airlines')) {
      $tbo_airlines = TboAirline::all();
      foreach ($tbo_airlines as $airline) {
        Cache::put($airline->airport_code, $airline->airline_name);
      }
    }
    $this->RequestHeader = [
      'Content-Type' => 'application/json',
      'Accept' =>
        'application/json, text/javascript, */*; q=0.01',
      'Accept-Encoding' => 'gzip, deflate',
    ];
  }

  // search in airports
  public function AirportsList(Request $request)
  {
    $airportsArr = [];
    if (!Cache::has('b2b5_flights_search_box_1' . $request->input('q'))) {

      $airlines = TboAirport::orWhere('airport_code', 'like', '%' . $request->input('q') . '%')
        ->orWhere('airport_name', 'like', '%' . $request->input('q') . '%')
        ->orWhere('city_name', 'like', '%' . $request->input('q') . '%')
        ->orWhere('country_name', 'like', '%' . $request->input('q') . '%')
        ->get()
        ->toArray();

      foreach ($airlines as $airline) {
        $airportsArr[] = ['id' => $airline['airport_code'],
          'text' => "[" . $airline['airport_code'] . "] " . $airline['airport_name'] . ' - ' . $airline['city_name'] . ' , ' . $airline['country_name']];
      }

    } else {
      $airportsSer = Cache::get('b2b5_flights_search_box_1' . $request->input('q'));
      $airportsArr = unserialize($airportsSer);
    }

    return response()->json($airportsArr);
  }


  // search in airports
  public function AirlineList(Request $request)
  {
    $airlineArr = [];
    if (!Cache::has('b2b_flights_search_box_airline_' . $request->input('q'))) {

      $airlines = TboAirline::orWhere('airline_name', 'like', '%' . $request->input('q') . '%')
        ->get()
        ->toArray();

      foreach ($airlines as $airline) {
        $airlineArr[] = ['id' => $airline['airport_code'], 'text' => $airline['airline_name']];
      }

    } else {
      $airlinesSer = Cache::get('b2b_flights_search_box_airline_' . $request->input('q'));
      $airlineArr = unserialize($airlinesSer);
    }

    return response()->json($airlineArr);
  }

  public function Authenticate()
  {	
    //if (!Cache::has('tbo_auth_data_1' . $_SERVER['REMOTE_ADDR'])) {

      //TokenId is valid for 20 hours only - TBO
	  $response = Http::post($this->TboAirApiEndPoint . 'Authenticate/ValidateAgency',
        [
          'UserName' => $this->TboAirApiUserName,
          'Password' => $this->TboAirApiPassword,
          'BookingMode' => $this->TboAirApiBookingMode,
          'IPAddress' => $_SERVER['REMOTE_ADDR']]);
      // Cache::put('tbo_auth_data_' . $_SERVER['REMOTE_ADDR'], serialize($response->json()), 25200); // save for 7 hours
    // } else {
      // $response = unserialize(Cache::get('tbo_auth_data_1' . $_SERVER['REMOTE_ADDR']));
    // }


    return $response->json();
  }

  public function SearchFlight(
    $point_of_sale, $request_origin, $journey_type = 2, $adult_count = 0,
    $child_count = 0, $infant_count = 0, $flight_cabin_class = 1, $preferred_airlines = [],
    $segments = [])
  {

    $tb_auth = $this->Authenticate();
	
	// print_r($tb_auth);
	// dd($tb_auth['TokenId']);
	// dd('aaaa');
    $data = [
      "IPAddress" => $_SERVER['REMOTE_ADDR'],
      "TokenId" => $tb_auth['TokenId'],
      "EndUserBrowserAgent" => $_SERVER['HTTP_USER_AGENT'],
      "PointOfSale" => $point_of_sale, // Departure Country code
      "RequestOrigin" => $request_origin, // Departure Country name
      "UserData" => null,
      "JourneyType" => $journey_type, //Specify journey type (1 - OneWay 2 - Return 3 - MultiCity)
      "AdultCount" => (int)$adult_count,
      "ChildCount" => (int)$child_count,
      "InfantCount" => (int)$infant_count,
      "FlightCabinClass" => (int)$flight_cabin_class, // Cabin class(1 - All Class 2 - Economy 3 - PremiumEconomy 4 - Business 5 - PremiumBusiness 6 - First)
      "PreferredAirlines" => $preferred_airlines,
      "segment" => $segments
    ];
	
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://xmloutapi.tboair.com/api/v1/Search/Search",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Accept-Encoding: gzip, deflate, br"
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response, true);
  }
  
	public function GenerateVoucherFlight()
  {
    $tb_auth = $this->Authenticate();
	$point_of_sale = 'QA';
    $data = [
      "ConfirmationNo" => 'aa',
      "TokenId" => $tb_auth['TokenId'],
      "BookingMode" => $this->TboAirApiBookingMode,
      "FirstName" => "Farhad 1", 
      "LastName" => "Arjmand 1", 
      "PaymentMode" => 1,
	  "PointOfSale"	=>	$point_of_sale

    ];

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://xmloutapi.tboair.com/api/v1/Book/GenerateVoucher",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode($data),
      CURLOPT_HTTPHEADER => array(
        "Content-Type: application/json",
        "Accept-Encoding: gzip, deflate, br"
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);

    return json_decode($response, true);
  }

  public function FareQuote($PointOfSale ,$RequestOrigin ,$ResultId ,$TrackingId){
    $tb_auth = $this->Authenticate();
    $TokenId  = $tb_auth['TokenId'];
    $response = Http::post($this->TboAirApiEndPoint . 'Detail/FareQuote',
      [
        'EndUserBrowserAgent'=>$_SERVER['HTTP_USER_AGENT'],
        'PointOfSale'=>$PointOfSale,
        'RequestOrigin'=>$RequestOrigin,
        'ResultId'=>$ResultId,
        'TokenId'=>$TokenId,
        'TrackingId'=>$TrackingId
      ]);

    return $response->json();
  }

  public function SSRRequest($PointOfSale ,$RequestOrigin ,$ResultId ,$TrackingId){
    $tb_auth = $this->Authenticate();
    $TokenId  = $tb_auth['TokenId'];
    $response = Http::post($this->TboAirApiEndPoint . 'Detail/GetSSR',
      [
        'EndUserBrowserAgent'=>$_SERVER['HTTP_USER_AGENT'],
        'PointOfSale'=>$PointOfSale,
        'RequestOrigin'=>$RequestOrigin,
        'ResultId'=>$ResultId,
        'TokenId'=>$TokenId,
        'TrackingId'=>$TrackingId
      ]);

    return $response->json();
  }

}
