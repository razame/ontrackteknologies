<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\ReservationFlightSearchLog;
use App\ReservationFlightSearchResult;
use App\TboAirport;
use Cache;
use App\FlightBookingPassenger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\User;

class FlightReservationController extends Controller
{
  public function __construct()
  {
    if (!Cache::has('tbo_airports')) {
      $airports = TboAirport::all();
      foreach ($airports as $airport) {
        Cache::put($airport->airport_code, $airport->airport_name . ' - ' . $airport->city_name . ' , ' . $airport->country_name);
      }
    }
  }

  public function Searching(Request $request)
  {
    $request->validate([
      'advance' => 'required',
      'from' => 'required',
      'to' => 'required',
      'departure_date' => 'required',
      'adult_count' => 'numeric',
      'child_count' => 'numeric',
      'infant_count' => 'numeric',
    ]);

    $data = $request->all();

    $data['user_id'] = Auth::user()->id;
    $data['departure_date'] = $data['departure_date_submit'];
    $data['return_date'] = $data['return_date_submit'];

    // save search log
    $reservation_flight_search_log = ReservationFlightSearchLog::create($data);
	

    $from = TboAirport::where('airport_code', $data['from'])->first();
    $to = TboAirport::where('airport_code', $data['to'])->first();
	
	
    return view('B2B.flight_reservation.flight_searching', ['search_log' => $reservation_flight_search_log, 'from' => $from, 'to' => $to]);
  }

  public function SearchAndAvailabilityRequest($flight_search_id)
  {
   
	$search_params = ReservationFlightSearchLog::findOrFail($flight_search_id);
    $adult_count = $search_params['adult_count'];
    $child_count = $search_params['child_count'];
    $infant_count = $search_params['infant_count'];
    if ($search_params['advance'] == 'return') {
      $journey_type = 2;
    } else {
      $journey_type = 1; // oneway
    }


    $destination = TboAirport::where('airport_code', $search_params['to'])->first();

    $destination = $destination->city_code;
    $origin = TboAirport::where('airport_code', $search_params['from'])->first();
    $request_origin = $origin->country_name;
    $origin = $origin->city_code;


    $point_of_sale = 'QA';
    $flight_cabin_class = 1;
    $preferred_airlines = [];
    $preferred_departure_time = $search_params['departure_date'];
    $preferred_arrivalTime = $search_params['return_date'];
    $segments = [];
    if ($journey_type == 1) {
      $segments[] = [
        "Origin" => $origin,
        "Destination" => $destination,
        "PreferredDepartureTime" => $preferred_departure_time . 'T00:00:00',
        "PreferredArrivalTime" => $preferred_departure_time . 'T00:00:00',
        "PreferredAirlines" => $preferred_airlines
      ];
    } else { // with return and 2 way
      $segments[] = [
        "Origin" => $origin,
        "Destination" => $destination,
        "PreferredDepartureTime" => $preferred_departure_time . 'T00:00:00',
        "PreferredArrivalTime" => $preferred_departure_time . 'T00:00:00',
        "PreferredAirlines" => $preferred_airlines
      ];

      $segments[] = [
        "Origin" => $destination,
        "Destination" => $origin,
        "PreferredDepartureTime" => $preferred_arrivalTime . 'T00:00:00',
        "PreferredArrivalTime" => $preferred_arrivalTime . 'T00:00:00',
        "PreferredAirlines" => $preferred_airlines
      ];
    }



    $flights_result = App('App\Http\Controllers\B2B\TboController')->SearchFlight(
      $point_of_sale, $request_origin, $journey_type, $adult_count,
      $child_count, $infant_count, $flight_cabin_class, $preferred_airlines,
      $segments
    );


    
	
	//if (isset($flights_result['IsSuccess']) and $flights_result['IsSuccess']) {
	if (!is_null ($flights_result)) {
      // save additional info
      $search_params->TrackingId = $flights_result['TrackingId'];
      $search_params->IsDomestic = $flights_result['IsDomestic'];
      $search_params->save();

      foreach ($flights_result['Results'][0] as $flight) {
        $flight['flight_search_id'] = $flight_search_id;
        ReservationFlightSearchResult::create($flight);
      }

      return response()->json(['result' => "OK"]);
    } else {
		return response()->json(['result' => "NOK"]);

      //dd($flights_result);
    }


  }

  public function ShowFlights(Request $request, $flight_search_log_id)
  {
    $flights = ReservationFlightSearchResult::where('flight_search_id', $flight_search_log_id)->paginate(50);
	$search_log = ReservationFlightSearchLog::find($flight_search_log_id);
    return view('B2B.flight_reservation.flights_list', ['flights' => $flights, 'search_log' => $search_log, 'request' => $request]);
  }

  public function Passenger(Request $request, $flight_id)
  {
    $flight = ReservationFlightSearchResult::findOrFail($flight_id);
    $search_log = ReservationFlightSearchLog::find($flight->flight_search_id);

    if($flight['IsLcc']){
      $fare_quote = App('App\Http\Controllers\B2B\TboController')->FareQuote(
        'QA','Dubai',$flight['ResultId'],$search_log['TrackingId']
      );

      $flight['fare_quote'] = $fare_quote;
    }


    $ssr_req = App('App\Http\Controllers\B2B\TboController')->SSRRequest(
      'QA','Dubai',$flight['ResultId'],$search_log['TrackingId']
    );


    return view('B2B.flight_reservation.flight_passenger',
      ['flight' => $flight, 'search_id' => $search_log,'ssr_request'=>$ssr_req]);
  }

  public function PassengerStore(Request $request, $flight_id){

	foreach($request->passengers as $passengers_type){
      foreach ($passengers_type as $passenger){
        $passenger['flight_id'] = $flight_id;
        $passenger['user_id'] = Auth::user()->id;
        FlightBookingPassenger::create($passenger);
      }
    }
	return Redirect::to("/B2B-flight-reservation/passenger-payment/" . $flight_id );
  }
  public function PassengerPayment(Request $request, $flight_id){

	$flight = ReservationFlightSearchResult::findOrFail($flight_id);
	$user = Auth::user();
	//GT Bank Details
    $merchant_id = "824";
    $gtpay_tranx_id = $flight->id;
    $gtpay_tranx_amt = round($flight['Fare']['TotalFare']) . "00";

    $gtpay_tranx_curr = "826";
    $gtpay_cust_id = '91';
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $gtpay_redirect_url = $actual_link . "/B2B-flight-reservation/callback/" . $gtpay_tranx_id;
    $GTPayKEY = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
	$hash_string = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_tranx_curr$gtpay_cust_id$gtpay_redirect_url$GTPayKEY";

    $hashkey = hash('sha512', $hash_string);
	return view('B2B.flight_reservation.payment', [
      'user' => $user, 'flight' => $flight ,   'hash' => $hashkey, 'merchant_id' => $merchant_id,
      'gtpay_tranx_id' => $gtpay_tranx_id, 'gtpay_tranx_amt' => $gtpay_tranx_amt,
      'gtpay_tranx_curr' => $gtpay_tranx_curr, 'gtpay_cust_id' => $gtpay_cust_id,
      'gtpay_redirect_url' => $gtpay_redirect_url, 'GTPayKEY' => $GTPayKEY,
     
	  ]);
	  
  }
	public function GTBankCallback($flight_id)
  {
    $flight = ReservationFlightSearchResult::findOrFail($flight_id);
	//GT Bank Details
    $merchant_id = "824";
    $gtpay_tranx_id = $flight->id;
    $gtpay_tranx_amt = round($flight['Fare']['TotalFare']) . "00";

    $gtpay_tranx_curr = "826";
    $gtpay_cust_id = '91';
	

	
    $GTPayKEY = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
	$hashkey = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_tranx_curr$gtpay_cust_id$gtpay_redirect_url$GTPayKEY";

    $response = Http::get("https://gtweb.gtbank.com/GTPayService/gettransactionstatus.xml?mertid=824&tranxid=$gtpay_tranx_id&hash=$hashkey");
    $resp = simplexml_load_string($response->getBody()->getContents());
    if ($resp->ResponseCode == '00') {
      // $book = App('App\Http\Controllers\B2B\ZumataController')->Book($booking_id);
      // $book_details = App('App\Http\Controllers\B2B\ZumataController')->GetBookingStatus($booking_id);
      // dd($book);
      return view('B2B.reservation.callback', ['status' => 'success', 'description' => $resp->ResponseDescription]);
    } else {
      return view('B2B.reservation.callback', ['status' => 'warning', 'description' => $resp->ResponseDescription]);
    }
  }
  
    // show booked hotel to user

  public function FlightReservationPayWithWallet($flight_id)
  {
    //todo: check booing policy exired or not
    $flight = ReservationFlightSearchResult::findOrFail($flight_id);


    // todo: check booking id expire
    $user = User::find(Auth::user()->id);

    //$rooms_paxes = HotelBookingRoomGuests::where('book_hotel_id', $booking->id)->first();

    // check user wallet
    if ($flight['Fare']['TotalFare'] > $user->balance) {
      return Redirect::back()->withWarning('Not enough balance, Please choose other payment method.');
    } else {

      // recheck flight key
		
		$recheck	=	$this->SearchAndAvailabilityRequest($flight->flight_search_id);
		if($recheck == 'error'){
			 return Redirect::back()->withWarning('error');
		}else{
			// dd($flight);
			// $search_params = ReservationFlightSearchLog::findOrFail($flight->flight_search_id);
			// dd($search_params);
			      // force Force Withdraw from user wallet
			//$user->forceWithdraw($book['price']['total'], ['booking_id' => $booking->id]);
			$response	=	App('App\Http\Controllers\B2B\TboController')->GenerateVoucherFlight();
			dd($response);
			die;
		}




      /*$rate_rechecked_rooms = $rate_recheck['hotel']['rate']['rooms'];
      $rooms_before = unserialize($rooms_paxes['rooms']);

      $rooms = [];
      foreach ($rooms_before as $key => $room) {
        $room['room_reference'] = $rate_rechecked_rooms[$key]['room_reference'];
        $room['room_type'] = $rate_rechecked_rooms[$key]['room_type'];
        $rooms[] = $room;
      }
		*/
		/*
      $booking_data['holder'] = unserialize($booking_data['holder']);

      //todo: add email and complete phone number
      $holder = ['title' => $booking_data['holder']['title'], 'name' => $booking_data['holder']['name'],
        'surname' => $booking_data['holder']['surname'], 'email' => $booking_data['holder']['email'],
        'phone_number' => $booking_data['holder']['countryCode'] . $booking_data['holder']['phone_number'],
        'client_nationality' => $booking_data['holder']['client_nationality']];

      $booking_items[] = [
        'rate_key' => $rate_recheck['hotel']['rate']['rate_key'], 'room_code' => $rate_recheck['hotel']['rate']['room_code'],
        'rooms' => $rooms
      ];

      $book = App('App\Http\Controllers\B2B\GnrController')->Booking(
        $booking_data['search_id'],
        $booking_data['hotel_code'],
        $booking_data['city_code'],
        $booking_data['booking_name'],
        $booking_data['group_code'],
        $booking_data['checkin'],
        $booking_data['checkout'],
        $booking_data['payment_type'],
        $holder,
        $booking_items,
        $booking_data['booking_comments'],
        $booking_data['agent_reference'],
        $booking->reservation_search_log_id
      );


      //check if have error - todo: handle error
      if (isset($book['errors'])) {

        return Redirect::back()->withWarning($book['errors'][0]['messages'][0]);
      }

      // force Force Withdraw from user wallet
      $user->forceWithdraw($book['price']['total'], ['booking_id' => $booking->id]);

      $booking->booking_status = $book['status'];
      $booking->payment_status = $book['payment_status'];
      $booking->booking_details_res = serialize($book);
      $booking->booking_reference = $book['booking_reference'];
      $booking->booking_name = $book['booking_name'];
      $booking->save();
	  */

      $message = "Hotel Booked.";
      return Redirect::to('/B2B-flight-reservation/flight-show-invoice/' . $flight_id)->withInfo($message);
	 
    } 
  }
   public function FlightReservationShowinvoiceById(Request $request, $booking_name)
  {
	  die('aa');
    /*$booking = HotelBooking::where("booking_name", $booking_name)->first();
    $fetchBooking = App('App\Http\Controllers\B2B\GnrController')->FetchBooking($booking->booking_reference);

    $generateVoucher = App('App\Http\Controllers\B2B\GnrController')->GenerateVoucherForBooking($booking->booking_reference);

    $ViewVoucherForBooking = App('App\Http\Controllers\B2B\GnrController')->ViewVoucherForBooking($booking->booking_reference);

    // FAKE

    if($booking->voucher == null){
      $booking = HotelBooking::find($booking->id);
      $booking->voucher = serialize($ViewVoucherForBooking);
      $booking->save();
    }

    $ViewVoucherForBooking = unserialize($booking->voucher);

    // FAKE

    if (isset($request->voucher_for_customer)) {
      return view('B2B.flight_reservation.show_invoice_for_customer', ['booking' => $ViewVoucherForBooking]);
    } else {
      return view('B2B.flight_reservation.show_invoice', ['booking' => $ViewVoucherForBooking,'id'=>$booking->id]);
    }
	*/

  }

  
  
  
  
}
