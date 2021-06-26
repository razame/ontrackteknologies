<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;


class GnrArea extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_area';
}
