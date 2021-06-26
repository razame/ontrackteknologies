<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class TboAirport extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'tbo_airport_information';
}
