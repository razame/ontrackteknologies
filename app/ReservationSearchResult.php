<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ReservationSearchResult extends Model
{
  protected $connection = 'mongodb';

  protected $fillable = [
    "checkin", "checkout", "no_of_adults", "no_of_nights", "no_of_rooms",
    "hotel_search_id", "hotel_address", "hotel_category", "hotel_city_code",
    "hotel_country", "hotel_description", "hotel_facilities", "hotel_geolocation",
    "hotel_code", "hotel_images", "hotel_min_rate", 'hotel_min_price', "hotel_name",
    "hotel_recommended", "hotel_safe2stay", "search_id",
  ];
}
