<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class GnrHotelContactDetails extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_hotel_contact_details';
}
