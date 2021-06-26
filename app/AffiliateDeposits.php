<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AffiliateDeposits extends Model
{
  protected $fillable = [
    'user_id', 'amount', 'bank_name', 'transaction_id',
    'date_of_transaction', 'created_by', 'status', 'status_remark',
    'type', 'reference_number', 'to_user', 'wallet_transaction_id', 'payment_gateway',
    'payment_status', 'payment_resp', 'bank_receipt'
  ];
}
