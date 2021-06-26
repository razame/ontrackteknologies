<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class GnrCountry extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_country';
}
