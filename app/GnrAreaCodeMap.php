<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class GnrAreaCodeMap extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_area_code_map';
}
