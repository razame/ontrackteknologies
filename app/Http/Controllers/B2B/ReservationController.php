<?php

namespace App\Http\Controllers\B2B;

use App;
use App\GnrCity;
use App\GnrHotel;
use App\GnrHotelImages;
use App\GnrLog;
use App\HotelBooking;
use App\HotelBookingRoomGuests;
use App\Http\Controllers\Controller;
use App\ReservationRoomsSearchResult;
use App\ReservationSearchLog;
use App\ReservationSearchResult;
use App\User;
use Auth;
use Cache;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use Redirect;

class ReservationController extends Controller
{
  // load search box
  public function index(Request $request)
  {
    return view("B2B.reservation.search_box", ['action' => $request->action]);
  }

  //save search params and then redirect to hotel list
  public function SaveSearchLogAndShowSearching(Request $request)
  {
    $request->validate([
      't-start' => 'required|date',
      't-end' => 'required|date'
    ]);

    $data = $request->all();

    //check rooms data - and calcute child ages
    $children_count = 0;
    $adults_count = 0;

    foreach ($request->rooms as $room) {

      switch ($room['children']) {
        case '0':
          $children_ages = [];
          break;
        case '1':
          $children_ages = [$room['chiild_1_age']];
          break;
        case '2':
          $children_ages = [$room['chiild_1_age'], $room['chiild_2_age']];
          break;

        default:
          # code...
          break;
      }

      $children_count += $room['children'];
      $adults_count += $room['adults'];
      $room_detail = [
        'adults' => $room['adults']
      ];
      if ($room['infant'] > 0) {
        $room_detail['no_of_infants'] = $room['infant'];
      }
      if (count($children_ages) > 0) {
        $room_detail['children_ages'] = $children_ages;
      }

      $room_req[] = $room_detail;
    }

    $data['adults_count'] = $adults_count;
    $data['children_count'] = $children_count;

    $data['rooms'] = $room_req;
    $data['checkin'] = $data['t-start'];
    $data['checkout'] = $data['t-end'];

    if ($data['location'] < 172859) { // last city_code is 172858
      // its city code
      $city = GnrCity::where('city_code', (int)$data['location'])->first();
      $data['location_details'] = $city->city_name . ", " . Cache::get($city->country_code);

    } else { // its hotel
      $hotel = GnrHotel::where('hotel_code', (int)$data['location'])->first();
      $data['location_details'] = $hotel->hotel_name . ", " . Cache::get($hotel->country_code);

    }

    unset($data['t-start']);
    unset($data['t-end']);

    $date1 = new DateTime($data['checkin']);
    $date2 = new DateTime($data['checkout']);

    // this calculates the diff between two dates, which is the number of nights
    $data['numberOfNights'] = $date2->diff($date1)->format("%a");

    // save search log
    $reservation_search_log = ReservationSearchLog::create([
      'params' => serialize($data), 'user_id' => Auth::user()->id,
      'reservation_type' => '$request->reservation_type',
    ]);


    return view("B2B.reservation.hotel_searching",
      ['reservation_search_log' => $reservation_search_log, 'data' => $data]);
  }

  //start search hotels - AjaxRequest
  public function SearchAndAvailabilityRequest(Request $request, $search_id)
  {

    $reservation_search_log = ReservationSearchLog::findorFail($search_id);
    $search_params = unserialize($reservation_search_log->params);
    $hoteIDs = [];

    if ($search_params['location'] < 172859) { // last city_code is 172858
      // its city_code
      if ($search_params['star_category'] == 'all') {
        $hotels_search_resp = GnrHotel::where('city_code', (int)$search_params['location'])->get();
      } else {
        $hotels_search_resp = GnrHotel::where('city_code', (int)$search_params['location'])
          ->where('star_category', '>=', (int)$search_params['star_category'])->get();
      }

      foreach ($hotels_search_resp as $hotel) {
        $hoteIDs[] = $hotel['hotel_code'];
      }
    } else { // its hotel_code
      $hoteIDs[] = $search_params['location'];
    }

    $hotel_codes_array = array_chunk($hoteIDs, 250);
    $hotels_result = [];
    $final_result = ['result' => "OK"];


    // SEND parallel request to GRN CONNECT
    $facilities = [];

    foreach ($hotel_codes_array as $hotel_codes) {

      $hotels_result = App('App\Http\Controllers\B2B\GnrController')
        ->hotelsAvailability(
          $hotel_codes,
          $search_params['checkin'],
          $search_params['checkout'],
          'USD',
          $search_params['client_nationality'],
          $search_params['rooms'],
          'concise',
          $reservation_search_log->id
        );


      if (isset($hotels_result['hotels'][0])) {

        foreach ($hotels_result['hotels'] as $hotel) {

          $hotel_search_result = [
            "checkin" => $hotels_result['checkin'],
            "checkout" => $hotels_result['checkout'],
            "no_of_adults" => $hotels_result['no_of_adults'],
            "no_of_nights" => $hotels_result['no_of_nights'],
            "no_of_rooms" => $hotels_result['no_of_rooms'],
            "hotel_search_id" => $hotels_result['search_id'],
            "hotel_address" => $hotel['address'],
            "hotel_category" => @$hotel['category'],
            "hotel_city_code" => $hotel['city_code'],
            "hotel_country" => $hotel['country'],
            "hotel_recommended" => @$hotels_result['recommended'],
            "hotel_geolocation" => $hotel['geolocation'],
            "hotel_facilities" => @$hotel['facilities'],
            "hotel_code" => $hotel['hotel_code'],
            "hotel_images" => @$hotel['images'],
            "hotel_min_rate" => $hotel['min_rate'],
            "hotel_min_price" => $hotel['min_rate']['price'],
            "hotel_name" => $hotel['name'],
            "hotel_safe2stay" => @$hotel['safe2stay'],
            "search_id" => $search_id
          ];

          ReservationSearchResult::create($hotel_search_result);

          // prepare data for filters in search result page
          if (isset($hotel['facilities'])) {
            $hotel_facilities = explode(';', $hotel['facilities']);
            foreach ($hotel_facilities as $hotel_facility) {
              $hotel_facility = trim($hotel_facility);

              if (isset($facilities[$hotel_facility])) {
                $facilities[$hotel_facility] += 1;
              } else {
                $facilities[$hotel_facility] = 1;
              }
            }

          }

          // prepare data for filters in search result page


        }
      }
    }

    $reservation_search_log->response_summary = serialize(['facilities' => $facilities]);
    $reservation_search_log->save();

    return response()->json($final_result);
  }


  public function HotelList(Request $request, $searchID)
  {

    // fetch search params
    $reservation_search_log = ReservationSearchLog::find($searchID);
    $search_params = unserialize($reservation_search_log->params);
    $search_response_summary = unserialize($reservation_search_log->response_summary);

    if ($search_params['location'] < 172859) { // last city_code is 172858
      // its city_code
      $city = GnrCity::where('city_code', (int)$search_params['location'])->first();
      $location_details = $city->city_name . ", " . Cache::get($city->country_code);
    } else {
      $hotel = GnrHotel::where('hotel_code', (int)$search_params['location'])->first();
      $location_details = $hotel->hotel_name . ", " . Cache::get($hotel->country_code);
    }


    $search_result = ReservationSearchResult::where('search_id', $searchID);

    // -- FILTERS
    if ($request->q_hotel_name) {
      $search_result = $search_result->where('hotel_name', 'like', '%' . $request->q_hotel_name . '%');
    }

    if ($request->q_hotel_address) {
      $search_result = $search_result->where('hotel_address', 'like', '%' . $request->q_hotel_address . '%');
    }

    // min and max filter
    if ($request->q_min_rate) {
      $search_result = $search_result->where('hotel_min_rate.price', '>=', (int)str_replace('.00', '', $request->q_min_rate));
    }

    if ($request->q_max_rate) {
      $search_result = $search_result->where('hotel_min_rate.price', '<=', (int)str_replace('.00', '', $request->q_max_rate));
    }

    // star categories
    if ($request->q_star_categories_1) {
      $search_result = $search_result->orWhere('hotel_category', 1);
    }
    if ($request->q_star_categories_2) {
      $search_result = $search_result->orWhere('hotel_category', 2);
    }
    if ($request->q_star_categories_3) {
      $search_result = $search_result->orWhere('hotel_category', 3);
    }
    if ($request->q_star_categories_4) {
      $search_result = $search_result->orWhere('hotel_category', 4);
    }
    if ($request->q_star_categories_5) {
      $search_result = $search_result->orWhere('hotel_category', 5);
    }

    if ($request->facilities) {
      foreach ($request->facilities as $facility) {
        $search_result = $search_result->where('hotel_facilities', 'like', '%' . $facility . '%');
      }
    }


    // sort type ASC or DESC
    if ($request->sort) {
      $order_by = explode(",", $request->sort);
      $search_result = $search_result->orderBy($order_by[0], $order_by[1]);

    } else {
      $search_result = $search_result->orderBy('created_at', 'ASC');
    }
    // -- FILTERS

    // get min/max rate
    $calcute_min_max_rate = $search_result;

    //todo : change desult max and min range when result is empty
    $min_rate = $calcute_min_max_rate->OrderBy('hotel_min_rate.price', 'ASC')->first();
    $min_rate = (isset($min_rate->hotel_min_rate)) ? $min_rate->hotel_min_rate['price'] : 10;
    $max_rate = $calcute_min_max_rate->OrderBy('hotel_min_rate.price', 'DESC')->first();
    $max_rate = (isset($max_rate->hotel_max_rate)) ? $max_rate->hotel_max_rate['price'] : 5000;


    $search_result = $search_result->paginate(50);

    $base_search_result = ReservationSearchResult::where('search_id', $searchID)->first();

    return view("B2B.reservation.hotel_lists", [
      'searchID' => $reservation_search_log->id,
      'location_details' => $location_details,
      'search_params' => $search_params,
      'search_result' => $search_result,
      'base_search_result' => $base_search_result,
      'min_rate' => $min_rate,
      'max_rate' => $max_rate,
      'request' => $request,
      'search_response_summary' => $search_response_summary
    ]);
  }


  // show hotel page
  public function showHotel(Request $request, $hotel_id, $searchID, $search_resp_id)
  {
    $data = $request->all();
    $data['hotel_id'] = $hotel_id;

    $hotel = GnrHotel::where('hotel_code', (int)$hotel_id)->first();

    // fetch search params
    $reservation_search_log = ReservationSearchLog::find($searchID);
    $search_params = unserialize($reservation_search_log->params);

    $search_resp = ReservationSearchResult::find($search_resp_id);

    if (!Cache::has('b2b_hotel_images_' . $hotel_id)) {
      $hotel_images = GnrHotelImages::where('hotel_code', (int)$hotel_id)->OrderBy('main_image ASC')->get();

      Cache::put('b2b_hotel_images_' . $hotel_id, serialize($hotel_images), 2592000);
    } else {
      $hotel_images = Cache::get('b2b_hotel_images_' . $hotel_id);
      $hotel_images = unserialize($hotel_images);
    }

    $hotels = App('App\Http\Controllers\B2B\GnrController')->RefetchAvailabilityForSingleHotel($search_resp->hotel_search_id, $hotel_id, true, $reservation_search_log->id);

    //delete prev rates
    $prev_rooms_search = ReservationRoomsSearchResult::where('search_id', $hotels['search_id'])->delete();

    //if search result expired
    if (isset($hotels['errors'])) {
      return view("B2B.reservation.show_hotel", [
        'hotels' => $hotels
      ]);
    }

    //save new rates
    foreach ($hotels['hotel']['rates'] as $rate) {
      $data = ['search_id' => $hotels['search_id'], 'rate' => $rate, 'hotel' => $hotels];
      $newRate = ReservationRoomsSearchResult::create($data);
    }


    $hotel_rates = ReservationRoomsSearchResult::where("search_id", $hotels['search_id'])->get();
    //categorize rooms
    $rooms = [];
    foreach ($hotel_rates as $hotel_rate) {
      $rooms[$hotel_rate['rate']['rooms'][0]['room_type']][] = $hotel_rate;
    }


    return view("B2B.reservation.show_hotel", [
      'hotels' => $hotels, 'search_params' => $search_params, 'hotel_rates' => $hotel_rates,
      'searchID' => $searchID, 'search_resp' => $search_resp, 'search_resp_id' => $search_resp_id, 'hotel' => $hotel,
      'hotel_images' => $hotel_images, 'reservation_search_log_id' => $reservation_search_log->id,
      'all_rooms' => $rooms
    ]);
  }

  // show price and add passenger details
  public function AddDetailForBookHotel(Request $request, $search_id, $book_search_id)
  {
    $reservation_search_log = ReservationSearchLog::find($search_id);
    $search_params = unserialize($reservation_search_log->params);

    $reservation_selected_room = ReservationRoomsSearchResult::find($request->selected_room_id);

    $hotel_detail = GnrHotel::where('hotel_code', (int)$request->hotel_code)->first();
    $RefetchAvailability = App('App\Http\Controllers\B2B\GnrController')->RefetchAvailabilityForSingleHotel($book_search_id, $request->hotel_code, true, $reservation_search_log->id);


    if (isset($RefetchAvailability['errors'])) {
      return Redirect::back()->withWarning($RefetchAvailability['errors'][0]['messages'][0]);
    }

    // update room data
    foreach ($RefetchAvailability['hotel']['rates'] as $rate) {
      if ($rate['room_code'] == $reservation_selected_room['rate']['room_code']) {
        $reservation_selected_room->rate = $rate;
        break;
      }
    }

    $reservation_selected_room->refetch_availability = $RefetchAvailability;
    $reservation_selected_room->reservation_search_log_id = $reservation_search_log->id;
    $reservation_selected_room->save();

    return view("B2B.reservation.book_details", [
      'hotel_detail' => $hotel_detail, 'search_id' => $search_id, 'refetch_availability' => $RefetchAvailability,
      'search_params' => $search_params, 'reservation_selected_room' => $reservation_selected_room
    ]);
  }

  public function HotelBooking(Request $request)
  {

    request()->validate([
      'rooms' => ['required', 'array'],
      'reference' => ['max:255'],
      'agent_remarks' => ['max:255'],
      'search_id' => ['required'],
      'book_search_id' => ['required'],
      'hotel_code' => ['required'],
      'room_code' => ['required'],
      'reservation_selected_room_id' => ['required'],
    ]);

    $booking_details_req = $request->all();

    $reservation_rooms_search_result = ReservationRoomsSearchResult::find($request->reservation_selected_room_id);
    $room_detail = $reservation_rooms_search_result->rate;
    $refetch_availability = $reservation_rooms_search_result->refetch_availability;

    // data for send to API provider
    $booking_data['search_id'] = $refetch_availability['search_id'];
    $booking_data['hotel_code'] = $refetch_availability['hotel']['hotel_code'];
    $booking_data['city_code'] = $refetch_availability['hotel']['city_code'];
    $booking_data['booking_name'] = 'OTTRP-' . date('Ymd') . $this->_generateRandomString(5, true);
    $booking_data['group_code'] = $room_detail['group_code'];
    $booking_data['checkin'] = $refetch_availability['checkin'];
    $booking_data['checkout'] = $refetch_availability['checkout'];
    $booking_data['payment_type'] = $room_detail['payment_type'][0];
    $booking_data['holder'] = serialize($booking_details_req['rooms'][0]['paxes'][0]);
    $booking_data['booking_items'] = $room_detail;
    $booking_data['booking_comments'] = $request->agent_remarks;
    $booking_data['agent_reference'] = $booking_details_req['reference'];

    //save something for search in table
    $data['hotel_code'] = $refetch_availability['hotel']['hotel_code'];
    $data['user_id'] = Auth::user()->id;
    $data['booking_data'] = serialize($booking_data);
    $data['booking_details_req'] = serialize($booking_details_req);
    $data['payment_status'] = 'pending';
    $data['booking_status'] = 'pending';
    $data['reservation_search_log_id'] = $reservation_rooms_search_result->reservation_search_log_id;

    //save booking data
    $booking = HotelBooking::create($data);

    //save paxes
    HotelBookingRoomGuests::create(['rooms' => serialize($booking_details_req['rooms']), 'book_hotel_id' => $booking->id]);

    return Redirect::to("/B2B-hotel/booking/payment/" . $booking->id . '?reservation_rooms_search_result_id=' . $reservation_rooms_search_result->id);
  }


  // choose payment

  function _generateRandomString($length = 10, $number = false)
  {
    if ($number) {
      $characters = '0123456789';
    } else {
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }

    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }


  // booking with user wallet

  public function HotelBookingPayment(Request $request, $booking_id)
  {


    $booking = HotelBooking::find($booking_id);
    $booking_data = unserialize($booking['booking_data']);

    $reservation_rooms_search_result = ReservationRoomsSearchResult::find($request->reservation_rooms_search_result_id);

    //GT Bank Details
    $merchant_id = "824";
    $gtpay_tranx_id = $booking->id;
    $gtpay_tranx_amt = round($booking_data['booking_items']['price']) . "00";

    $gtpay_tranx_curr = "826";
    $gtpay_cust_id = '91';
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $gtpay_redirect_url = $actual_link . "/B2B-hotels/callback/" . $gtpay_tranx_id;
    $GTPayKEY = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
    $user = Auth::user();

    // $hash_string = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_cust_id$gtpay_tranx_curr$gtpay_redirect_url$GTPayKEY";
    // dd($hash_string);
    $hash_string = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_tranx_curr$gtpay_cust_id$gtpay_redirect_url$GTPayKEY";

    $hashkey = hash('sha512', $hash_string);

    $hotel_details = GnrHotel::where('hotel_code', (int)$booking->hotel_code)->first();


    return view('B2B.reservation.payment', [
      'user' => $user, 'booking' => $booking, 'booking_data' => $booking_data, 'hash' => $hashkey, 'merchant_id' => $merchant_id,
      'gtpay_tranx_id' => $gtpay_tranx_id, 'gtpay_tranx_amt' => $gtpay_tranx_amt,
      'gtpay_tranx_curr' => $gtpay_tranx_curr, 'gtpay_cust_id' => $gtpay_cust_id,
      'gtpay_redirect_url' => $gtpay_redirect_url, 'GTPayKEY' => $GTPayKEY, 'hotel_details' => $hotel_details,
      'refetch_availability' => $reservation_rooms_search_result
    ]);
  }

  // show booked hotel to user

  public function HotelBookingPayWithWallet($booking_id)
  {
    //todo: check booing policy exired or not
    $booking = HotelBooking::find($booking_id);

    $booking_data = unserialize($booking['booking_data']);
    $refetch_availability = unserialize($booking['refetch_availability']);

    // todo: check booking id expire
    $user = User::find(Auth::user()->id);

    $rooms_paxes = HotelBookingRoomGuests::where('book_hotel_id', $booking->id)->first();

    // check user wallet
    if ($booking_data['booking_items']['price'] > $user->balance) {
      return Redirect::back()->withWarning('Not enough balance, Please choose other payment method.');
    } else {

      // recheck rate key

      $rate_recheck = App('App\Http\Controllers\B2B\GnrController')->RateRecheck(
        $booking_data['search_id'],
        $booking_data['booking_items']['rate_key'],
        $booking_data['group_code'],
        $booking->reservation_search_log_id
      );

      if (isset($rate_recheck['errors'])) {

        return Redirect::back()->withWarning($rate_recheck['errors'][0]['messages'][0]);
      }
      $rate_rechecked_rooms = $rate_recheck['hotel']['rate']['rooms'];
      $rooms_before = unserialize($rooms_paxes['rooms']);

      $rooms = [];
      foreach ($rooms_before as $key => $room) {
        $room['room_reference'] = $rate_rechecked_rooms[$key]['room_reference'];
        $room['room_type'] = $rate_rechecked_rooms[$key]['room_type'];
        $rooms[] = $room;
      }


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

      $message = "Hotel Booked.";
      return Redirect::to('/B2B-reservation/show-invoice/' . $book['booking_name'])->withInfo($message);
    }
  }

  public function HotelBookingShowinvoiceById(Request $request, $booking_name)
  {
    $booking = HotelBooking::where("booking_name", $booking_name)->first();
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
      return view('B2B.reservation.show_invoice_for_customer', ['booking' => $ViewVoucherForBooking]);
    } else {
      return view('B2B.reservation.show_invoice', ['booking' => $ViewVoucherForBooking,'id'=>$booking->id]);
    }

  }

  // fake
  public function changebookdate(Request $request,$id){
    $booking = HotelBooking::find($id);
    $voucher = unserialize($booking->voucher);
    $voucher['checkin'] = $request->checkin;
    $voucher['checkout'] = $request->checkout;
    $voucher['booking_date'] = $request->booking_date;
    $voucher['voucher_issue_date'] = $request->voucher_issue_date;
    $booking->voucher = serialize($voucher);
    $booking->save();
    return Redirect::back();
  }

  public function MakePdfFromInvoice(Request $request,$booking_name)
  {
    $booking = HotelBooking::where("booking_name", $booking_name)->first();
    $fetchBooking = App('App\Http\Controllers\B2B\GnrController')->FetchBooking($booking->booking_reference);

    // FAKE
    $fetchBooking = unserialize($booking->voucher);
    $ViewVoucherForBooking = unserialize($booking->voucher);
    // FAKE
//    $ViewVoucherForBooking = App('App\Http\Controllers\B2B\GnrController')->ViewVoucherForBooking($booking->booking_reference);

    if($request->complete){
      $pdf = PDF::loadView('B2B.reservation.show_invoice_pdf_complete', ['voucher' => $ViewVoucherForBooking, 'booking' => $fetchBooking,'price'=>unserialize($booking->booking_details_res)]);
    }else{
      $pdf = PDF::loadView('B2B.reservation.show_invoice_pdf', ['voucher' => $ViewVoucherForBooking, 'booking' => $fetchBooking]);
    }


    return $pdf->download($booking_name . '.pdf');
  }

  public function SendInvoiceWithEmail(Request $request, $booking_name)
  {
    $booking = HotelBooking::where("booking_name", $booking_name)->first();
    $fetchBooking = App('App\Http\Controllers\B2B\GnrController')->FetchBooking($booking->booking_reference);

    $ViewVoucherForBooking = App('App\Http\Controllers\B2B\GnrController')->ViewVoucherForBooking($booking->booking_reference);

    $pdf = PDF::loadView('B2B.reservation.show_invoice_pdf', ['voucher' => $ViewVoucherForBooking, 'booking' => $fetchBooking]);
    $pdf->save('./uploads/invoices/' . $booking_name . '.pdf');

    $data = ['to_name' => $request->to_name, 'domain' => "TRIPSERB2B.COM", 'booking_name' => $ViewVoucherForBooking['booking_name'],
      'to_email' => $request->to_email, 'message' => $request->message,
      'subject' => 'Booking Confirmation', 'file' => public_path('/uploads/invoices/' . $booking_name . '.pdf')];


    $send_mail = App('App\Http\Controllers\MailController')->SendBookingConfirmation(
      $request->to_email, $request->to_name, Auth::user()->email, Auth::user()->name, $data);

    return json_encode(['result' => 'sent']);

  }

  public function GTBankCallback($booking_id)
  {
    $booking = HotelBooking::where('booking_id', $booking_id)->first();
    $mertid = "824";
    $amount = round($booking->chargeable_rate);
    $GTPayKEY = "D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F";
    $hashkey = hash('sha512', $mertid . $booking_id . $GTPayKEY);

    $response = Http::get("https://gtweb.gtbank.com/GTPayService/gettransactionstatus.xml?mertid=824&tranxid=$booking_id&hash=$hashkey");
    $resp = simplexml_load_string($response->getBody()->getContents());
    if ($resp->ResponseCode == '00') {
      $book = App('App\Http\Controllers\B2B\ZumataController')->Book($booking_id);
      $book_details = App('App\Http\Controllers\B2B\ZumataController')->GetBookingStatus($booking_id);
      // dd($book);
      return view('B2B.reservation.callback', ['status' => 'success', 'description' => $resp->ResponseDescription]);
    } else {
      return view('B2B.reservation.callback', ['status' => 'warning', 'description' => $resp->ResponseDescription]);
    }
  }

  public function HotelBookingReports(Request $request)
  {
    $hotel_booking = HotelBooking::orderBy('updated_at', 'DESC');

    if ($request->status) {

      if ($request->status == 'canceled') {
        $hotel_booking = $hotel_booking->whereNotNull('cancellation_status');
      } else {
        $hotel_booking = $hotel_booking->where('booking_status', $request->status)->whereNull('cancellation_status');
      }
    }

    $hotel_booking = $hotel_booking->whereNotNull('booking_details_res');

    $user = User::find(Auth::user()->id);
    if ($user->hasRole("SuperAdmin")) {

    } else {
      $hotel_booking = $hotel_booking->where('user_id', $user->id);
    }

    $hotel_booking = $hotel_booking->paginate(30);

    return view('B2B.reservation.hotel_reports', ['hotel_booking' => $hotel_booking, 'status' => $request->status]);
  }

  public function ShowCancellationForm($booking_id, $booking_name)
  {
    $book = HotelBooking::where('id', $booking_id)->where('booking_name', $booking_name)->first();

    return view('B2B.reservation.cancellation', ['booking' => $book]);
  }

  public function CancelHotelBooking(Request $request, $booking_id, $booking_name)
  {

    $book = HotelBooking::where('id', $booking_id)->where('booking_name', $booking_name)->first();

    $data = [$book->booking_reference, $request->comments, $request->reason, $book->reservation_search_log_id];
    $cancel = App('App\Http\Controllers\B2B\GnrController')->CancelBooking(
      $book->booking_reference, $request->comments, $request->reason, $book->reservation_search_log_id
    );

    if (isset($cancel['errors'])) {
      return Redirect::back()->withErrors($cancel['errors'][0]['messages']);
    } else {
      $book->cancellation_req = serialize($data);
      $book->cancellation_res = serialize($cancel);
      $book->cancellation_status = $cancel['status'];
      $book->save();

      return Redirect::to('/B2B-hotels/booking-reports')->withSuccess("CANCELLATION RESULT for " . $book->booking_name . " : " . $book->cancellation_status);
    }


  }

  public function ShowBookedHotelLogs($booking_id)
  {
    $book = HotelBooking::find($booking_id);
    $gnr_logs = GnrLog::where('search_log_id', (int)$book->reservation_search_log_id)->orderBy('created_at', 'ASC')->get();
    header('Content-Type: application/json');
    foreach ($gnr_logs as $log) {
      echo "/////////////////////START ----- FUNCTION : " . $log->function . "----- ///////////////////// \n\n\n\n  ";

      echo "/********* REQUEST  *********/ \n\n";
      echo json_encode($log->request, JSON_PRETTY_PRINT) . "\n\n\n";

      echo "/********* RESPONSE *********/ \n\n";
      echo json_encode($log->response, JSON_PRETTY_PRINT) . "\n\n\n";

      echo "/////////////////////END ----- FUNCTION : " . $log->function . "----- ///////////////////// \n\n\n\n  ";
    }
  }

}
