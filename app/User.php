<?php

namespace App;

use Bavix\Wallet\Interfaces\Confirmable;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\HasWallet;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements Wallet, Confirmable
{
  use HasApiTokens, Notifiable, HasRoles;
  use HasWallet, CanConfirm;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email', 'password',
    'contact_person', 'website',
    'phone_number_1', 'phone_number_2', 'mobile',
    'fax_number', 'pan', 'tax',
    'address1', 'address2', 'country',
    'state', 'city', 'currency', 'pincode', 'approved',
    'secondary_email', 'logo', 'created_by', 'updated_by', 'user_type',
    'email_signature', 'e_ticket', 'voucher', 'hotel_price_display', 'parent_id',
    'enable_user_arkup', 'show_user_markup', 'agency_markup_on_air_non_air_search_result',
    'quick_search_result', 'agency_hotel_markup_type', 'agency_hotel_markup_value',
    'signed_contract', 'user_role', 'commission', 'registration_form_for_agent'
  ];
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
}
