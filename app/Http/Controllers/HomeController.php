<?php

namespace App\Http\Controllers;

use App;
use App\B2CPlansTransactions;
use App\ContactUs;
use App\SiteSettings;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Ixudra\Curl\Facades\Curl;
use Mail;
use Redirect;

class HomeController extends Controller
{
  public function index()
  {

    return view("homepage.index");
  }

  public function page_3dSecure()
  {
    $data = SiteSettings::find(8);
    return view("homepage.3d_secure", ['data' => unserialize($data['value'])]);
  }

  public function page_about()
  {
    $about_us = SiteSettings::find(5);
    return view("homepage.about", ['about_us' => unserialize($about_us['value'])]);
  }

  public function page_contacts()
  {
    return view("homepage.contacts");
  }

  public function page_ontrack_contacts()
  {
    return view("homepage.ontrack_contacts");
  }


  public function page_contacts_save_message(Request $request)
  {
    $data = $request->all();
    unset($data['_token']);
    $contact_us = ContactUs::create($data);
    return Redirect::back()->with('success', 'Your message has been successfully sent. We will contact you very soon! Thank you for contacting us');
  }

  public function page_legal_information()
  {
    $data = SiteSettings::find(7);
    return view("homepage.legal_information", ['data' => unserialize($data['value'])]);

  }

  public function page_privacy_policy()
  {
    $data = SiteSettings::find(6);
    return view("homepage.privacy_policy", ['data' => unserialize($data['value'])]);
  }

  public function b2c_travel_portal()
  {
    return view("homepage.b2c_travel_portal");
  }

  public function page_refund_policy()
  {
    $data = SiteSettings::find(11);
    return view("homepage.refund_policy", ['data' => unserialize($data['value'])]);

  }

  public function Buy(Request $request)
  {
    $plan = $request->plan;
    switch ($plan) {
      case 'Standard':
        $price = "250";
        break;
      case 'Corporate':
        $price = "400";
        break;
      case 'Basic':
        $price = "150";
        break;
      default:
        $price = "250";
        break;
    }

    return view("homepage.buy", ['plan' => $plan, "price" => $price]);
  }

  // save user data -
  public function checkout(Request $request)
  {

    request()->validate([
      'name' => ['required', 'string', 'max:255'],
      'first_name' => ['max:255'],
      'last_name' => ['max:255'],
      'phone_number_1' => ['string', 'max:255'],
      // 'address1' => ['max:255'],
      // 'country' => ['max:255'],
      // 'city' => ['max:255'],
      'how_many_month' => ['max:255'],
      // 'pincode' => ['max:255'],
      'email' => ['required', 'string', 'email', 'max:255'],
    ]);

    $data = $request->all();
    $data['password'] = Hash::make("tripserb2b!@@!");
    $data['user_type'] = "B2C";
    $data['approved'] = 0;
    $data['contact_person'] = $data['first_name'] . " " . $data['last_name'];

    $user = User::where("email", $data['email'])->first();
    if (is_null($user)) {
      // create user
      $user = User::create($data);
    } elseif ($user->approved == 0) {
      // remove if user registered but not actived
      $user->email = $user->email . rand(0, 20);
      $user->save();
    } else {
      // if user exist and approved before
      return Redirect::back()->withErrors(['Email Address is Already Registred.']);
    }

    $plan = $request->plan;
    switch ($plan) {
      case 'Standard':
        $price = "250";
        break;
      case 'Corporate':
        $price = "400";
        break;
      case 'Basic':
        $price = "150";
        break;
      default:
        $price = "250";
        break;
    }


    //todo : maybe refrence number will duplicate
    $plan = B2CPlansTransactions::create(['user_id' => $user->id, "plan_name" => $plan,
      "amount" => $price, 'reference_number' => "OTB2C-S-" . rand(10000, 99999999),
      'how_many_month' => $request->how_many_month]);

    return Redirect::to("/order-review/" . $plan->id);
  }

  function _generateRandomString($length = 10)
  {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  public function OrderReview($order_id)
  {
    $plan = B2CPlansTransactions::find($order_id);
    $plan->reference_number = "OTB2C-S-" . rand(10000, 99999999);
    $plan->payment_status_code = "pending";
    $plan->save();
    $user = User::find($plan->user_id);
    if ($user == null) {
      return Redirect::to("/b2c_travel_portal");
    }
    // ------ GT Bank Details
    $merchant_id = "14081";
    $gtpay_tranx_id = $plan->reference_number;
    // $changed_curr = Http::get("http://api.currencylayer.com/live?access_key=db8d3926c96d2d6fafb306d6e22f4314&currencies=USD,NGN&format=1");
    // $changed_curr = $changed_curr->json();
    // $changed_curr = $changed_curr['quotes']['USDNGN'];
    $changed_curr = 13.57;
    $gtpay_tranx_amt = round(($plan->amount * $plan->how_many_month) * $changed_curr) . "00";
    $plan->ngn = $gtpay_tranx_amt;
    $plan->save();

    $gtpay_tranx_curr = "566";
    $gtpay_cust_id = $plan->user_id;
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $gtpay_redirect_url = $actual_link . "/callback/" . $plan->id;
    $GTPayKEY = strtoupper("7ae5cdfd935a278d11e9e838605abc161d51e38c70fa615512fdf2eac8357f621fc5cf1789b20aec942b0e7a0f3bf54a4079773485bb38046baf5cdd76f0f4b7");

    $hash_string = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_tranx_curr$gtpay_cust_id$gtpay_redirect_url$GTPayKEY";

    $hashkey = hash('sha512', $hash_string);
    // ------ GT Bank Details

    // ------ MasterCard
    $orderid = $plan->reference_number;
    $merchant = $this->MigsMerchantID;
    $apipassword = $this->MigsApiPassword;
    $amount = round($plan->amount * $plan->how_many_month);
    $amount = $gtpay_tranx_amt ;
    
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $returnUrl = $actual_link . "/callback-from-migs/" . $plan->id;
    $currency = "ZAR";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->MigsEndpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "apiOperation=CREATE_CHECKOUT_SESSION&apiPassword=$apipassword&interaction.returnUrl=$returnUrl&apiUsername=merchant.$merchant&merchant=$merchant&order.id=$orderid&order.amount=$amount&order.currency=$currency");

    $headers = [];
    $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);

    if (curl_errno($ch)) {
      echo 'ERROR : ' . curl_error($ch);
    }
    curl_close($ch);
// dd($result);
    $sessionid = explode("=", explode("&", $result)[2]);
    $master_card_session_id = $sessionid[1];
    // ------ MasterCard

    return view("homepage.order_review", ['user' => $user, 'hash' => $hashkey, 'merchant_id' => $merchant_id,
      'gtpay_tranx_id' => $gtpay_tranx_id, 'gtpay_tranx_amt' => $gtpay_tranx_amt,
      'gtpay_tranx_curr' => $gtpay_tranx_curr, 'gtpay_cust_id' => $gtpay_cust_id,
      'gtpay_redirect_url' => $gtpay_redirect_url, 'GTPayKEY' => $GTPayKEY, 'plan' => $plan,
      'master_card_session_id' => $master_card_session_id, 'amount' => $amount]);
  }

  public function BankCallback(Request $request, $plan_id)
  {
    $plan = B2CPlansTransactions::find($plan_id);

    if (isset($request->GATEWAY) && $request->GATEWAY == 'migs') {
    //   echo "BROTHER PLEASE DONT CLOSE THIS PAGE";
      dd($request);
    } else {
      // gtbank
      $mertid = "14081";
      $amount = round($plan->amount);
      $GTPayKEY = strtoupper("7ae5cdfd935a278d11e9e838605abc161d51e38c70fa615512fdf2eac8357f621fc5cf1789b20aec942b0e7a0f3bf54a4079773485bb38046baf5cdd76f0f4b7");
      $hashkey = hash('sha512', $mertid . $plan->reference_number . $GTPayKEY);

      $response = Http::get("https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml?mertid=$mertid&tranxid=$plan->reference_number&hash=$hashkey");
      $resp = simplexml_load_string($response->getBody());
      $plan->payment_status_code = $resp->ResponseCode;
      $plan->payment_status_message = $resp->ResponseDescription;
      $plan->payment_gateway = "GTBank";
      // $plan->resp = serialize($request);
      $plan->save();
      $user = User::find($plan->user_id);

      if ($resp->ResponseCode == '00') {
        $to_name = $user->name;
        $to_email = $user->email;
        $data = ['name' => $user->name, 'domain' => "TRIPSER.AFRICA", 'plan' => $plan->plan_name . "($plan->amount)", 'reference_id' => $plan->reference_number];
        Mail::send('emails.homepage.b2c', $data, function ($message) use ($to_name, $to_email) {
          $message->to($to_email, $to_name)
            ->subject("TRIPSER.AFRICA [PAYMENT]");
          $message->from('support@tripser.africa', 'Tripser.africa');
        });
      }
    }


    return view('homepage.bank_callback', ['plan' => $plan, 'resp' => $resp, 'user' => $user]);
  }

  public function BankCallbackFromMigs(Request $request, $plan_id)
  {
    $plan = B2CPlansTransactions::find($plan_id);

    $orderid = $plan->reference_number;
    $merchant = $this->MigsMerchantID;
    $apipassword = $this->MigsApiPassword;
    // $merchant = "GTB321727C36";
    // $apipassword = "9a9ff9123917def192080bf7acd7d443";
    $amount = round($plan->amount * $plan->how_many_month);

    $currency = "ZAR";
    

    // retrive transaction details
    $response = Http::withBasicAuth("merchant.$merchant", $apipassword)
      ->get("https://ap-gateway.mastercard.com/api/rest/version/49/merchant/$merchant/order/$orderid");

    $resp = $response->json();
    $user = null;
    if ($resp['result'] == "ERROR") {

    } else {
      $plan->payment_status_code = $resp['result'];
      $plan->payment_status_message = $resp['result'];
      $plan->resp = serialize($resp);
      $plan->payment_gateway = "MIGS";
      $plan->save();

      $user = User::find($plan->user_id);

    }

    return view('homepage.bank_callback_for_migs', ['plan' => $plan, 'resp' => $resp, 'user' => $user]);
  }

}
