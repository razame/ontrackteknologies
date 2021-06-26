<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class GnrLog extends Model
{
  protected $connection = 'mongodb';
  protected $table = 'grn_logs';
  protected $fillable = [
    'search_log_id', 'function', 'availability', 'request', 'response', 'user_id'
  ];
}
