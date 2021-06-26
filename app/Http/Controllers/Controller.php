<?php

namespace App\Http\Controllers;

use App\Setting;
use Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  var $MigsMerchantID;
  var $MigsApiPassword;
  var $MigsEndpoint;
  var $MigsStatus;

  public function __construct()
  {
    //todo : add gtbank varibles
    $migs_settings = Setting::where("name", "migs_merchant_id")->orWhere("name", "migs_api_password")->orWhere("name", "migs_endpoint")->orWhere("name", "migs_status")->get();
    foreach ($migs_settings as $setting) {
      if ($setting->name == 'migs_merchant_id') {
        $this->MigsMerchantID = $setting->value;
      }
      if ($setting->name == 'migs_api_password') {
        $this->MigsApiPassword = $setting->value;
      }
      if ($setting->name == 'migs_endpoint') {
        $this->MigsEndpoint = $setting->value;
      }
      if ($setting->name == 'migs_status') {
        $this->MigsStatus = $setting->value;
        View::share('MigsStatus', $this->MigsStatus);
      }
    }


  }
}
