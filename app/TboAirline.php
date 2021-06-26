<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class TboAirline extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'tbo_airline';
}
