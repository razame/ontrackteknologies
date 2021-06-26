<?php

namespace App\Http\Controllers\B2B;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Redirect;

class UserWalletController extends Controller
{

  public function MakeADeposit()
  {
    $agents = User::get();
    return view("B2B.wallet.add", ['agents' => $agents]);
  }

  public function SaveMakeADeposit(Request $request)
  {
    $user = User::find($request->user_id);
    $user->deposit($request->deposit, ['description' => $request->description]);
    return Redirect::to("/B2B-wallet/make-a-deposit")->withSuccess('Great! ' . $request->deposit . 'USD added to ' . $user->name . ' wallet.');
  }
}
