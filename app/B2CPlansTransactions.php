<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class B2CPlansTransactions extends Model
{
  protected $table = 'b2c_plans_transactions';

  protected $fillable = [
    'user_id', 'plan', 'amount', 'factor_id', 'plan_name', 'payment_status_message',
    'payment_status_code', 'resp', 'ngn', 'how_many_month'
  ];
}
