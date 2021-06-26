<?php

namespace App\Http\Controllers\B2C;

use App\GnrArea;
use App\GnrAreaCodeMap;
use App\GnrCity;
use App\GnrHotel;
use App\Http\Controllers\Controller;
use App\ReservationRoomsSearchResult;
use App\ReservationSearchLog;
use App\ReservationSearchResult;
use Auth;
use Cache;
use DateTime;
use Illuminate\Http\Request;

class HotelReservationController extends Controller
{
  public function HotelSearching(Request $request)
  {

    $request->validate([
      't-start' => 'required|date',
      't-end' => 'required|date'
    ]);

    $data = $request->all();
    //check rooms data - and calcute child ages
    $children_count = 0;
    $adults_count = 0;
    $infant_count = 0;

    foreach ($request->rooms as $room) {

      switch ($room['children']) {
        case '0':
          $children_ages = [];
          break;
        case '1':
          if ($room['children_ages'][1] > 0) {
            $children_ages = [$room['children_ages'][1]];
          } else {
            $infant_count += 1;
          }

          break;
        case '2':
          if ($room['children_ages'][1] > 0) {
            $children_ages[] = $room['children_ages'][1];
          } else {
            $infant_count += 1;
          }
          if ($room['children_ages'][2] > 0) {
            $children_ages[] = $room['children_ages'][2];
          } else {
            $infant_count += 1;
          }

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
      if ($infant_count > 0) {
        $room_detail['no_of_infants'] = $infant_count;
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

    $location_type = explode("!", $data['location']);

    switch ($location_type[0]) {
      case 'C':
        $city = GnrCity::where('city_code', $data['location'])->first();
        $data['location_details'] = $city->city_name . ", " . Cache::get($city->country_code);
        break;
      case 'G':
        $area = GnrArea::where('area_code', $data['location'])->first();
        $data['location_details'] = $area->area_name . ", " . Cache::get($area->country_code);
        break;
      case 'H':
        $hotel = GnrHotel::where('hotel_code', $data['location'])->first();
        $data['location_details'] = $hotel->hotel_name . ", " . Cache::get($hotel->country_code);
        break;

      default:
        # code...
        break;
    }

    unset($data['t-start']);
    unset($data['t-end']);
    $date1 = new DateTime($data['checkin']);
    $date2 = new DateTime($data['checkout']);

    // this calculates the diff between two dates, which is the number of nights
    $data['numberOfNights'] = $date2->diff($date1)->format("%a");

    $user_id = isset(Auth::user()->id) ? Auth::user()->id : null;
    // save search log
    $reservation_search_log = ReservationSearchLog::create([
      'params' => serialize($data), 'user_id' => $user_id,
      'reservation_type' => '$request->reservation_type'
    ]);


    return view("B2C.hotel_reservation.hotel_searching", ['reservation_search_log' => $reservation_search_log, 'data' => $data]);
  }

  //start search hotels - AjaxRequest
  public function SearchAndAvailabilityRequest(Request $request, $search_id)
  {
    $reservation_search_log = ReservationSearchLog::findorFail($search_id);
    $search_params = unserialize($reservation_search_log->params);


    $location_type = explode("!", $search_params['location']);

    switch ($location_type[0]) {
      case 'C': // if search by city
        $hotels_search_resp = GnrHotel::where('city_code', $search_params['location'])->get();

        $hoteIDs = [];
        foreach ($hotels_search_resp as $hotel) {
          $hoteIDs[] = $hotel['hotel_code'];
        }
        break;
      case 'G': // if search by Area Code
        $area_cities = GnrAreaCodeMap::where('area_code', $search_params['location'])->get();
        $cities = [];
        foreach ($area_cities as $area_city) {
          $cities[] = $area_city['city_code'];
        }

        $hotels_search_resp = GnrHotel::whereIn('city_code', $cities)->get();

        $hoteIDs = [];
        foreach ($hotels_search_resp as $hotel) {
          $hoteIDs[] = $hotel['hotel_code'];
        }
        break;
      case 'H':
        $hoteIDs[] = $search_params['location'];
        break;

      default:
        # code...
        break;
    }


    $hotel_codes_array = array_chunk($hoteIDs, 250);
    $hotels_result = [];
    $final_result = ['result' => "OK"];


    // SEND parallel request to GRN CONNECT
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
            "hotel_description" => $hotel['description'],
            "hotel_facilities" => @$hotel['facilities'],
            "hotel_geolocation" => $hotel['geolocation'],
            "hotel_code" => $hotel['hotel_code'],
            "hotel_images" => @$hotel['images'],
            "hotel_min_rate" => $hotel['min_rate'],
            "hotel_name" => $hotel['name'],
            "hotel_safe2stay" => @$hotel['safe2stay'],
            "search_id" => $search_id
          ];

          ReservationSearchResult::create($hotel_search_result);
        }
      }
    }
    return response()->json($final_result);
  }

  public function HotelReservationSearchResult(Request $request, $reservation_search_log_id)
  {
    // fetch search params
    $reservation_search_log = ReservationSearchLog::find($reservation_search_log_id);
    $search_params = unserialize($reservation_search_log->params);

    $location_type = explode("!", $search_params['location']);

    switch ($location_type[0]) {
      case 'C':
        $city = GnrCity::where('city_code', $search_params['location'])->first();
        $location_details = $city->city_name . ", " . Cache::get($city->country_code);
        break;
      case 'G':
        $area = GnrArea::where('area_code', $search_params['location'])->first();
        $location_details = $area->area_name . ", " . Cache::get($area->country_code);
        break;
      case 'H':
        $hotel = GnrHotel::where('hotel_code', $search_params['location'])->first();
        $location_details = $hotel->hotel_name . ", " . Cache::get($hotel->country_code);
        break;

      default:
        # code...
        break;
    }

    $search_result = ReservationSearchResult::where('search_id', $reservation_search_log_id);

    // sort type ASC or DESC
    if ($request->sort) {
      $order_by = explode(",", $request->sort);
      $search_result = $search_result->orderBy($order_by[0], $order_by[1]);
    }

    $search_result = $search_result->paginate(50);

    return view("B2C.hotel_reservation.hotel_lists", [
      'searchID' => $reservation_search_log->id,
      'location_details' => $location_details,
      'search_params' => $search_params,
      'search_result' => $search_result
    ]);
  }

  // show hotel page
  public function showHotel(Request $request, $hotel_id, $searchID, $search_resp_id)
  {
    $data = $request->all();
    $data['hotel_id'] = $hotel_id;

    $hotel = GnrHotel::where('hotel_code', $hotel_id)->first();

    // fetch search params
    $reservation_search_log = ReservationSearchLog::find($searchID);
    $search_params = unserialize($reservation_search_log->params);

    $search_resp = ReservationSearchResult::find($search_resp_id);

    $hotel_images = App('App\Http\Controllers\B2B\GnrController')->GetHotelImages($hotel_id);

    $hotels = App('App\Http\Controllers\B2B\GnrController')->RefetchAvailabilityForSingleHotel($search_resp->hotel_search_id, $hotel_id, true, $reservation_search_log->id);

    //delete prev rates
    $prev_rooms_search = ReservationRoomsSearchResult::where('search_id', $hotels['search_id'])->delete();

    //if search result expired
    if (isset($hotels['errors'])) {
      return view("B2C.hotel_reservation.show_hotel", [
        'hotels' => $hotels
      ]);
    }

    //save new rates
    foreach ($hotels['hotel']['rates'] as $rate) {
      $data = ['search_id' => $hotels['search_id'], 'rate' => $rate, 'hotel' => $hotels];
      $newRate = ReservationRoomsSearchResult::create($data);
    }


    $hotel_rates = ReservationRoomsSearchResult::where("search_id", $hotels['search_id'])->get();

    return view("B2C.hotel_reservation.show_hotel", [
      'hotels' => $hotels, 'search_params' => $search_params, 'hotel_rates' => $hotel_rates,
      'searchID' => $searchID, 'search_resp' => $search_resp, 'search_resp_id' => $search_resp_id, 'hotel' => $hotel,
      'hotel_images' => $hotel_images, 'reservation_search_log_id' => $reservation_search_log->id
    ]);
  }

  // show price and add passenger details
  public function AddDetailForBookHotel(Request $request, $search_id, $book_search_id)
  {
    $reservation_search_log = ReservationSearchLog::find($search_id);
    $search_params = unserialize($reservation_search_log->params);

    $reservation_selected_room = ReservationRoomsSearchResult::find($request->selected_room_id);

    $hotel_detail = GnrHotel::where('hotel_code', $request->hotel_code)->first();
    $RefetchAvailability = App('App\Http\Controllers\B2B\GnrController')->RefetchAvailabilityForSingleHotel($book_search_id, $request->hotel_code, true, $reservation_search_log->id);

    if (isset($RefetchAvailability['errors'])) {
      return Redirect::back()->withWarning($RefetchAvailability['errors'][0]['messages'][0]);
    }

    $reservation_selected_room->refetch_availability = $RefetchAvailability;
    $reservation_selected_room->reservation_search_log_id = $reservation_search_log->id;
    $reservation_selected_room->save();

    return view("B2C.hotel_reservation.book_details", [
      'hotel_detail' => $hotel_detail, 'search_id' => $search_id, 'refetch_availability' => $RefetchAvailability,
      'search_params' => $search_params, 'reservation_selected_room' => $reservation_selected_room
    ]);
  }
}
