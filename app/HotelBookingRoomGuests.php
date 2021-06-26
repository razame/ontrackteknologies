<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelBookingRoomGuests extends Model
{
  protected $fillable = [
    'rooms', 'book_hotel_id'
  ];
}
