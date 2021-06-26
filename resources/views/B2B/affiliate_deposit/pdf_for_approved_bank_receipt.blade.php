<?php
use App\User;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<style>
  body {
    direction: ltr;
    text-align: left;
    font-size: 13.5px;
    font-family: tahoma;
  }

  table {
    width: 100%;
    display: table;
    border-spacing: 2px;
    border-collapse: collapse;
  }

  table td,
  table th {
    padding: 5px;
  }

  .table-1 {
    line-height: 19px;
    margin-top: 50px;
  }

  .table-2,
  .table-3 {
    line-height: 21px;
    text-align: left;
  }

  .table-1 table {
    vertical-align: middle;
  }

  .bold {
    font-weight: bold;
  }

  .logo {
    color: #0984e2;
    font-size: 40px;
    font-weight: bold;
  }

  .logo img {
    width: 150px;
    margin-right: 10px;
  }
  .header-address {
    margin-right: 10px;
  }

  .invoice-header {
    font-size: 27px;
    font-weight: bold;
    border-bottom: 4px solid #035bc5;
    text-align: right;
    padding-bottom: 8px;
    margin-bottom: 3px;
    text-transform: uppercase;
    margin-top: 30px;
  }

  .header-bottom {
    text-align: right;
    margin-bottom: 60px;
    font-weight: bold;
  }

  .right-table div:nth-child(2n) {
    text-align: right;
  }

  .table-3 {
    margin-top: 50px;
    font-weight: bold;
  }

  .table-3 tr td {
    vertical-align: sub;
  }

  .total {
    text-align: right;
    margin-top: 50px;
  }

  .total-title {
    font-size: 19px;
    font-weight: bold;
    margin-bottom: 5px;
  }

  .total-price {
    font-size: 20px;
    font-weight: bold;
    color: #0059c4;
    margin-bottom: 10px;
  }

  .total-sm {
    font-size: 12px;
    font-weight: bold;
  }

  .footer {
    width: 50%;
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 100px;
  }

  tbody {
    display: table-row-group;
    vertical-align: middle;
    border-color: inherit;
  }

  tr {
    display: table-row;
    vertical-align: inherit;
    border-color: inherit;
  }
</style>

<body>

<div id="wrapper">
  <div class="table-1">
    <table class="table">
      <tr>
        <td>
          <div class="logo"><img src="http://tripserb2b.com/agent/img/logo.png"></div>
        </td>
        <td>
          <div class="bold">Turkey Address:</div>
          <div class="header-address">HOBYAR MAH. VAKIF HANI SK. NO: 1 <br/>IÇ KAPI NO: 10- Fatih/ Istanbul, Turkey
          </div>
          <div>
            <span class="bold">IBAN:</span>
          </div>
          <div>TR540020500009426459500003 (TL)</div>
          <div>TR160020500009426459500105 (USD)</div>
          <div>
            <span class="bold"> <br/></span>
          </div>
        </td>
        <td>
          <div class="bold">Nigeria Address:</div>
          <div class="header-address">17, Odewale Street, Alausa-Ikeja Lagos-Nigeria</div>

          <div>
            <span class="bold">Routine number /sort code:</span> 058-152023
          </div>
          <div>
            <span class="bold">Swift code:</span> GTBINGLA
          </div>
          <div>
            <span class="bold">Acc No:</span> 0567634839 (USD)
          </div>

        </td>
      </tr>
    </table>
  </div>
  <!--  -->
  <h1 class="invoice-header">invoice</h1>
  <div class="header-bottom">Number: {{$affiliate_deposit->reference_number	}}</div>
  <!--  -->
  <div class="table-2">
    <table class="table">
      <tr>
        <td>
          <div style="font-size: 23px;text-transform: uppercase;margin-bottom: 5px;">Customer:</div>
          <div class="bold">
            <div style="text-transform: uppercase;">{{User::find($affiliate_deposit->user_id)->name}}</div>
            <div>{{User::find($affiliate_deposit->user_id)->address1}} </div>
            <div>{{User::find($affiliate_deposit->user_id)->address2}} ,{{User::find($affiliate_deposit->user_id)->country}}</div>
            <div>Tax no: <span style="font-weight: normal;">{{User::find($affiliate_deposit->user_id)->tax}}</span></div>
          </div>
        </td>
        <td class="right-table">
          <table>
            <tr>
              <td style="text-align: right">Payment Method:</td>
              <td style="text-align: right"><span class="bold">Credit Card</span></td>
            </tr>
            <tr>
              <td style="text-align: right">Card Number:</td>
              <td style="text-align: right"><span class="bold">{{$affiliate_deposit->card_number}}</span></td>
            </tr>
            <tr>
              <td style="text-align: right">Completion date :</td>
              <td style="text-align: right"><span class="bold">{{date('Y-m-d', $affiliate_deposit->date_of_transaction)}}</span></td>
            </tr>
            <tr>
              <td style="text-align: right">Issue date: </td>
              <td style="text-align: right"><span class="bold">{{date('Y-m-d', $affiliate_deposit->date_of_transaction)}}</span></td>
            </tr>
            <tr style="background: #0059c4;color: white">
              <td style="text-align: right">Due date:</td>
              <td style="text-align: right"><span class="bold">{{date('Y-m-d', $affiliate_deposit->date_of_transaction)}}</span></td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
  </div>
  <!--  -->
  <div class="table-3">
    <table class="table">
      <thead>
      <th style="text-align: left !important;">Description</th>
      <th>Qty.</th>
      <th>Unit price</th>
      <th>Net price</th>
      <th>VAT</th>
      <th>VaT value</th>
      <th>Gross price</th>
      </thead>
      <tbody>
      <tr style="background: rgb(223, 222, 222);">
        <td>
          <div>{{User::find($affiliate_deposit->user_id)->name}}</div>
          <div style="font-size: 13px;text-transform: uppercase;">{{User::find($affiliate_deposit->user_id)->contact_person}}</div>
        </td>
        <td>1 db</td>
        <td>{{number_format($affiliate_deposit->amount, 2)}}</td>
        <td>{{number_format($affiliate_deposit->amount, 2)}}</td>
        <td>0%</td>
        <td style="text-align: right;">0</td>
        <td style="text-align: right;">{{number_format($affiliate_deposit->amount, 2)}}</td>
      </tr>
      <tr>
        <td colspan="3"><span class="bold">Total</span></td>
        <td><span class="bold">{{number_format($affiliate_deposit->amount, 2)}}</span></td>
        <td colspan="2" style="text-align: right;">
          <div class="bold">0</div>
          <div style="color: #747474">VAT 0%: 0</div>
        </td>
        <td style="text-align: right;"><span class="bold">{{number_format($affiliate_deposit->amount, 2)}}</span></td>
      </tr>
      </tbody>
    </table>
  </div>
  <!--  -->
  <div class="total">
    <div class="total-title">Total:</div>
    <div class="total-price">{{number_format($affiliate_deposit->amount, 2)}} USD</div>
    <div class="total-sm">

      <div style="margin-top: 10px;">the invoice is valid without a signature or stamp!</div>
    </div>
  </div>
</div>

</body>

</html>
