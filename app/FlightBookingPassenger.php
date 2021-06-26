<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class FlightBookingPassenger extends Model
{
  protected $connection = 'mongodb';
  protected $fillable = [
    'type', 'fare','title','name','lastname','date_of_birth','email','country_code',
    'contact_number','passport_no','passport_expiry','flight_id','user_id'
  ];
}
