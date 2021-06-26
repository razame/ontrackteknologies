<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class GnrHotelImages extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_hotel_image_map';
}
