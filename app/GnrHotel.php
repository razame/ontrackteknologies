<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class GnrHotel extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_hotel_master';
}
