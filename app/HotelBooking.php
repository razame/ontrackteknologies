<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
  protected $fillable = [
    'hotel_code', 'user_id', 'booking_data', 'booking_details_req', 'payment_status',
    'booking_status', 'booking_details_res', 'booking_reference', 'booking_name', 'reservation_search_log_id',
    'cancellation_req', 'cancellation_res', 'cancellation_status','voucher'
  ];
}
