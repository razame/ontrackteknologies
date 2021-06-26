<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ReservationRoomsSearchResult extends Model
{
  protected $connection = 'mongodb';

  protected $fillable = [
    "search_id", "rate", "hotel", 'refetch_availability', 'reservation_search_log_id'
  ];
}
