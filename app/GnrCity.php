<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class GnrCity extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_city_master';
}
