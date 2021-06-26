<?php

namespace App\Http\Controllers\B2B;

use App\AffiliateDeposits;
use App\B2CPlansTransactions;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Bavix\Wallet\Models\Transaction;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PDF;
use Redirect;

class FinancialReportsController extends Controller
{

  // all homepage b2c transactions
  public function B2CPlansTransactionReports(Request $request)
  {
    $reports = new B2CPlansTransactions;
    switch ($request->status) {
      case 'success':
        $reports = $reports->orWhere('payment_status_code', "00")->orWhere('payment_status_code', "SUCCESS");
        break;
      case 'pending':
        $reports = $reports->orWhere('payment_status_code', "pending")->orwhereNull('payment_status_code');
        break;
      case 'rejected':
        $reports = $reports->where('payment_status_code', '!=', "pending")
          ->whereNotNull('payment_status_code')
          ->where('payment_status_code', "!=", "00")
          ->where('payment_status_code', "!=", "SUCCESS");
        break;
      default:
        $reports = $reports; // all
        break;
    }
    $reports = $reports->orderBy("created_at", "DESC")->paginate(20);
    return view("B2B.financial_reports.b2c_plan_transactions", ['reports' => $reports]);
  }

  // update b2c transactions with gtpay
  public function UpdateB2CPlansTransactionReportsStatus($id)
  {
    $report = B2CPlansTransactions::find($id);

    $mertid = "14081";
    $GTPayKEY = strtoupper("7ae5cdfd935a278d11e9e838605abc161d51e38c70fa615512fdf2eac8357f621fc5cf1789b20aec942b0e7a0f3bf54a4079773485bb38046baf5cdd76f0f4b7");
    $hashkey = hash('sha512', $mertid . $report->reference_number . $GTPayKEY);
    $response = Http::get("https://ibank.gtbank.com/GTPayService/gettransactionstatus.xml?mertid=$mertid&tranxid=$report->reference_number&hash=$hashkey");
    $resp = simplexml_load_string($response->getBody());

    $report->payment_status_code = $resp->ResponseCode;
    $report->payment_status_message = $resp->ResponseDescription;
    $report->save();

    return Redirect::back()->withSuccess("Reference Number : " . $report->reference_number . " Updated.");
  }

  //Affiliate Deposit
  public function AffiliateDeposit(Request $request)
  {
    $agents = User::where('user_type', 'Agent')->orWhere('user_type', 'SuperAdmin')->orderBy('name')->pluck('name', 'id')->all();

    if (isset($request->CashDeposit)) {
      return view('B2B.affiliate_deposit.affiliatedeposit_cd', ['agents' => $agents, 'user' => Auth::user()]);

    } else {
      return view('B2B.affiliate_deposit.affiliatedeposit', ['agents' => $agents, 'user' => Auth::user()]);

    }
  }

  public function AffiliateDepositStore(Request $request)
  {
    request()->validate([
      'user_id' => ['required', 'string', 'max:255'],
      'amount' => ['required', 'string', 'max:255'],
      'bank_name' => ['max:255'],
      'transaction_id' => ['max:255'],
      'date_of_transaction' => ['max:255'],
      'bank_receipt' => 'mimes:jpg,png,jpeg,pdf,zip,rar|max:204800',
    ]);

    $data = $request->all();
    $data['reference_number'] = $data['transaction_id'];
    $data['created_by'] = Auth::user()->id;
    $data['status'] = "NotApproved";
    if (isset($request->bank_receipt)) {
      $fileName = time() . '.' . $request->bank_receipt->extension();
      $fileName_ = $fileName;
      $request->bank_receipt->move(public_path('uploads'), $fileName);
      $data['bank_receipt'] = $fileName_;
    }

    //add amount to user balance but it need to confirm
    $to_user = User::find($request->user_id);

    $desc = [
      'Section' => "AffiliateDeposit", "Amount" => $request->amount, "UserID" => Auth::user()->id, "UserName" => Auth::user()->name,
      "ForUserID" => $to_user->id, "ForUserName" => $to_user->name, "Action" => "deposit - unconfirmed", "description" => "Auth::user()->name (Auth::user()->id) $request->status AffiliateDeposit for $to_user->name ($to_user->id)  - unconfirmed"
    ];

    $transaction = $to_user->deposit($request->amount, $desc, false); // not confirm

    $data['wallet_transaction_id'] = $transaction->id;
    $data['user_id'] = $request->user_id;

    if (isset($data['date_of_transaction'])) {
      $dtime = DateTime::createFromFormat('F, j, Y', $data['date_of_transaction']);
      $timestamp = $dtime->getTimestamp();

      $data['date_of_transaction'] = $timestamp;
    } else {
      $data['date_of_transaction'] = time();
    }

    if ($request->action == 'cach_deposit') {
      $data['type'] = "CachDeposit";
      AffiliateDeposits::create($data);
      return Redirect::to("Affiliate-Deposit-Reports")->withSuccess('Affiliate Deposit saved.');
    } else {
      $data['type'] = "PayOnline";
      $data['payment_status'] = "Pending";
      $affiliate_deposit = AffiliateDeposits::create($data);
      return Redirect::to("Affiliate-Deposit-PayOnline/" . $affiliate_deposit->id);
    }
  }

  public function AffiliateDepositPayOnline($id)
  {
    $affiliate_deposit = AffiliateDeposits::findOrFail($id);
    $user = User::findOrFail($affiliate_deposit->user_id);
    $reference_number = $affiliate_deposit->reference_number;
    $amount = $affiliate_deposit->amount;

    // ------ MasterCard
    $orderid = $reference_number;
    $merchant = $this->MigsMerchantID;
    $apipassword = $this->MigsApiPassword;


    $returnUrl = route('BankCallbackFromMigs', ['id' => $id]);


    $currency = "USD";

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

    $sessionid = explode("=", explode("&", $result)[2]);
    $master_card_session_id = $sessionid[1];
    // ------ MasterCard


    return view("B2B.affiliate_deposit.affiliatedeposit_payonline", [
      'user' => $user,
      'reference_number' => $reference_number,
      'amount' => $affiliate_deposit->amount,
      'affiliate_deposit' => $affiliate_deposit,
      'master_card_session_id' => $master_card_session_id,
      'orderid' => $orderid
    ]);
  }

  // callback from MIGS
  public function BankCallbackFromMigs(Request $request, $id)
  {
    $affiliate_deposit = AffiliateDeposits::find($id);


    $orderid = $affiliate_deposit->reference_number;
    $merchant = $this->MigsMerchantID;
    $apipassword = $this->MigsApiPassword;


    // retrive transaction details
    $response = Http::withBasicAuth("merchant.$merchant", $apipassword)
      ->get("https://eu-gateway.mastercard.com/api/rest/version/57/merchant/$merchant/order/$orderid");

    $resp = $response->json();

    $user = null;
    $resp['result'] = 'SUCCESS';
    if ($resp['result'] == "ERROR") {

    } else {
      $affiliate_deposit->payment_status = $resp['result'];
      $affiliate_deposit->payment_resp = serialize($resp);
      $affiliate_deposit->payment_gateway = "MIGS";
      $affiliate_deposit->save();

      $user = User::find($affiliate_deposit->user_id);

    }

    return view('B2B.affiliate_deposit.affiliatedeposit_payonline_receipt', ['affiliate_deposit' => $affiliate_deposit, 'resp' => $resp, 'user' => $user]);
  }


  public function CreatePdfForBankReceipt($id)
  {
    $affiliate_deposit = AffiliateDeposits::find($id);
    $user = User::find($affiliate_deposit->user_id);
    $resp = unserialize($affiliate_deposit->payment_resp);
    $data = ['affiliate_deposit' => $affiliate_deposit, 'resp' => $resp, 'user' => $user];

    $pdf = PDF::loadView('B2B.affiliate_deposit.affiliatedeposit_payonline_receipt_pdf', $data);

    return $pdf->download($affiliate_deposit->id . '.pdf');
  }

  public function CreatePdfForApprovedBankReceipt($id)
  {
    $affiliate_deposit = AffiliateDeposits::find($id);
    $pdf = PDF::loadView('B2B.affiliate_deposit.pdf_for_approved_bank_receipt',['affiliate_deposit'=>$affiliate_deposit]);

    return $pdf->download('ApprovedBankReceipt-'.$id. '.pdf');
  }

  public function savecardnumber(Request $request){
    $affiliate_deposit = AffiliateDeposits::find($request->id);
    $affiliate_deposit->card_number = $request->card_number;
    $affiliate_deposit->save();
    return Redirect::back()->withSuccess('Affiliate Deposit card number chenanged.');
  }
  public function AffiliateDepositPayOnline_______GTBANK($id)
  {
    $affiliate_deposit = AffiliateDeposits::findOrFail($id);
    $user = User::findOrFail($affiliate_deposit->user_id);

    //GT Bank Details
    $merchant_id = "14081";
    $gtpay_tranx_id = $affiliate_deposit->reference_number;
    // $changed_curr = Http::get("http://api.currencylayer.com/live?access_key=db8d3926c96d2d6fafb306d6e22f4314&currencies=USD,NGN&format=1");
    // $changed_curr = $changed_curr->json();
    // $changed_curr = $changed_curr['quotes']['USDNGN'];
    $changed_curr = 200000;
    $gtpay_tranx_amt = round(($affiliate_deposit->amount) * $changed_curr) . "00";
    $gtpay_tranx_curr = "566";
    $gtpay_cust_id = $affiliate_deposit->user_id;
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
    $gtpay_redirect_url = $actual_link . "/callback/" . $affiliate_deposit->id;
    $GTPayKEY = strtoupper("7ae5cdfd935a278d11e9e838605abc161d51e38c70fa615512fdf2eac8357f621fc5cf1789b20aec942b0e7a0f3bf54a4079773485bb38046baf5cdd76f0f4b7");

    $hash_string = "$merchant_id$gtpay_tranx_id$gtpay_tranx_amt$gtpay_tranx_curr$gtpay_cust_id$gtpay_redirect_url$GTPayKEY";
    $hashkey = hash('sha512', $hash_string);

    return view("B2B.affiliate_deposit.affiliatedeposit_payonline", [
      'user' => $user, 'hash' => $hashkey,
      'merchant_id' => $merchant_id,
      'gtpay_tranx_id' => $gtpay_tranx_id, 'gtpay_tranx_amt' => $gtpay_tranx_amt,
      'gtpay_tranx_curr' => $gtpay_tranx_curr, 'gtpay_cust_id' => $gtpay_cust_id,
      'gtpay_redirect_url' => $gtpay_redirect_url, 'GTPayKEY' => $GTPayKEY, 'affiliate_deposit' => $affiliate_deposit
    ]);
  }

  public function AffiliateDepositReports(Request $request)
  {
    $q_user_id = $request->user_id;
    $q_status = $request->status;
    $affiliate_deposits = new AffiliateDeposits();
    if (isset($request->user_id) and $request->user_id != 'All') {
      $affiliate_deposits = $affiliate_deposits->where('user_id', $request->user_id);
    }

    if (isset($request->status) and $request->status != 'All') {
      $affiliate_deposits = $affiliate_deposits->where('status', $request->status);
    }

    $to_date = null;
    $from_date = null;
    if (isset($request->from_date)) {

      $dtime = DateTime::createFromFormat('F, j, Y', $request->from_date);
      $from_date = $dtime->getTimestamp();

      $affiliate_deposits = $affiliate_deposits->where('date_of_transaction', '>=', $from_date);
      $from_date = $request->from_date;
    }

    if (isset($request->to_date)) {
      $dtime = DateTime::createFromFormat('F, j, Y', $request->to_date);
      $to_date = $dtime->getTimestamp();

      $affiliate_deposits = $affiliate_deposits->where('date_of_transaction', '<=', $to_date);
      $to_date = $request->to_date;
    }

    $affiliate_deposits = $affiliate_deposits->where('status', '!=', 'Pending');

    $user = User::find(Auth::user()->id);

    if ($user->hasRole("SuperAdmin")) {

    } else {
      $affiliate_deposits = $affiliate_deposits->where('user_id', Auth::user()->id);

    }
    $affiliate_deposits = $affiliate_deposits->orderBy("date_of_transaction", "DESC")->paginate(30);
    $agents = User::where('user_type', 'Agent')->orderBy('name')->pluck('name', 'id')->all();

    return view(
      'B2B.affiliate_deposit.affiliate_deposit_reports',
      [
        'affiliate_deposits' => $affiliate_deposits, 'agents' => $agents, 'q_user_id' => $q_user_id,
        'q_status' => $q_status, 'from_date' => $from_date, 'to_date' => $to_date
      ]
    );
  }

  public function AffiliateDepositChangeStatus(Request $request, $id)
  {
    $affiliate_deposit = AffiliateDeposits::find($id);
    if ($request->status == 'Approved') {
      // confirm transaction
      $transaction = Transaction::where('id', $affiliate_deposit->wallet_transaction_id)->first();
      $user = User::find($affiliate_deposit->user_id);
      $user->confirm($transaction);
    }
    $prev_status = $affiliate_deposit->status;
    $affiliate_deposit->status = $request->status;
    $affiliate_deposit->status_remark = $request->status_remark;
    $affiliate_deposit->save();

    return Redirect::back()->withSuccess('Affiliate Deposit status chenanged.');
  }

  public function AffiliateFundAllocation()
  {
    $agents = User::where('user_type', 'Agent')->orderBy('name')->get();
    $user = Auth::user();
    if (!empty($agents)) {
      foreach ($agents as $key => $agent) {
        $agents[$key]['balance'] = User::find($agent->id)->balance;
      }
    }


    return view("B2B.affiliate_deposit.affiliate_fund_allocation", ['agents' => $agents, 'user' => $user]);
  }


  // ajax request for fetch branches
  public function AffiliateFundAllocationLoadBranches(Request $request)
  {
    $branches = User::where('parent_id', $request->branch_id)->orderBy('name')->get();
    if (!empty($branches)) {
      foreach ($branches as $key => $branch) {
        $branches[$key]['balance'] = User::find($branch->id)->balance;
      }
    }

    return response()->json($branches);
  }

  public function AffiliateFundAllocationStore(Request $request)
  {
    request()->validate([
      'agent_id' => ['required', 'string', 'max:255'],
      'branch_id' => ['required', 'string', 'max:255'],
      'amount' => ['required', 'max:255']
    ]);

    $data = $request->all();

    $agent_balance = User::find($request->agent_id);
    $branch_balance = User::find($request->branch_id);
    if ($agent_balance->balance > $request->amount) {
      $transaction = $agent_balance->transfer($branch_balance, $request->amount, [
        'Section' => "AffiliateFundAllocation",
        "Amount" => $request->amount, "UserID" => Auth::user()->id,
        "UserName" => Auth::user()->name, "ForUserID" => $request->branch_id,
        "ForUserName" => $branch_balance->name, "Action" => "withdraw",
        "description" => "Auth::user()->name (Auth::user()->id) Transfered $request->amount in AffiliateFundAllocation to $branch_balance->name ($branch_balance->id) "
      ]);


      $data['user_id'] = $agent_balance->id;
      $data['amount'] = $request->amount;
      $data['to_user'] = $request->branch_id;
      $data['reference_number'] = "OTB2B-FA-" . rand(1000, 99999999);
      $data['created_by'] = Auth::user()->id;
      $data['status'] = "Approved";
      $data['wallet_transaction_id'] = $transaction->id;
      $data['date_of_transaction'] = time();
      $data['type'] = "Transfer";
      AffiliateDeposits::create($data);

      return Redirect::to("/Affiliate-Fund-Allocation-Reports")->withSuccess('Transfered');
    } else {
      return Redirect::back()->withError('Not Enough Balance');
    }
  }

  public function AffiliateFundAllocationReports(Request $request)
  {

    $q_user_id = $request->user_id;
    $q_status = $request->status;
    $affiliate_deposits_reports = AffiliateDeposits::where('Type', 'Transfer');
    if (isset($request->user_id) and $request->user_id != 'All') {
      $affiliate_deposits_reports = $affiliate_deposits_reports->where('user_id', $request->user_id);
    }

    if (isset($request->status) and $request->status != 'All') {
      $affiliate_deposits_reports = $affiliate_deposits_reports->where('status', $request->status);
    }

    $to_date = null;
    $from_date = null;
    if (isset($request->from_date)) {

      $dtime = DateTime::createFromFormat('F, j, Y', $request->from_date);
      $from_date = $dtime->getTimestamp();

      $affiliate_deposits_reports = $affiliate_deposits_reports->where('date_of_transaction', '>=', $from_date);
      $from_date = $request->from_date;
    }

    if (isset($request->to_date)) {
      $dtime = DateTime::createFromFormat('F, j, Y', $request->to_date);
      $to_date = $dtime->getTimestamp();

      $affiliate_deposits_reports = $affiliate_deposits_reports->where('date_of_transaction', '<=', $to_date);
      $to_date = $request->to_date;
    }

    $affiliate_deposits_reports = $affiliate_deposits_reports->orderBy("created_at", "DESC")->paginate(30);
    $agents = User::where('user_type', 'Agent')->orderBy('name')->pluck('name', 'id')->all();

    return view(
      'B2B.affiliate_deposit.affiliate_fund_allocation_reports',
      [
        'affiliate_deposits_reports' => $affiliate_deposits_reports, 'agents' => $agents, 'q_user_id' => $q_user_id,
        'q_status' => $q_status, 'from_date' => $from_date, 'to_date' => $to_date
      ]
    );
  }
}
