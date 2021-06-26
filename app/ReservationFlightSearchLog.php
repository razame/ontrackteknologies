<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class ReservationFlightSearchLog extends Model
{
  protected $connection = 'mongodb';
  protected $fillable = [
    'advance', 'from', 'to', 'departure_date', 'return_date', 'adult_count',
    'child_count', 'infant_count', 'user_id', "TrackingId", "IsDomestic"
  ];
}
