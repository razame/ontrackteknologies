<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservationSearchLog extends Model
{
  protected $fillable = [
    'params', 'user_id', 'search_id', 'response_summary'
  ];
}
