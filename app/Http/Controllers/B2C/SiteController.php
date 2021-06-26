<?php

namespace App\Http\Controllers\B2C;

use App\Http\Controllers\Controller;

class SiteController extends Controller
{
  // B2C HomePage
  public function index()
  {
    return view('B2C.index');
  }


}
