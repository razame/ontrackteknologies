<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class TboCountry extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'tbo_country';
}
