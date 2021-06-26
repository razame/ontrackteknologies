<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booking Confirmation - {{$voucher['booking_name']}}</title>

</head>

<style>
  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 13px;
  }

  .container {
    width: 100%;
    margin-right: auto;
    margin-left: auto;
  }

  .container {
    max-width: 800px
  }

  h1 {
    margin: 0;
  }

  .booking {
    border: 1px solid black;
    padding: 10px;
  }

  .booking-head {
    text-align: right;
    width: 85%;
    display: inline-block;
  }

  .booking-header-wrapper {
    margin-bottom: 10px;
  }

  .booking-header-title {
    font-size: 30px;
  }

  .booking-header-title span {
    color: red;
  }

  .booking-logo {
    font-size: 25px;
    display: inline-block;
    width: 100px;
  }

  .divider {
    background: #ddd;
    padding: 5px;
  }

  .divider b {
    font-weight: bold;
  }

  .booking-body {
    margin-top: 10px;
  }

  .booking-item {
    margin-bottom: 5px;
  }

  .room-info {
    background-color: #f4f4f4;
  }

  .bold {
    font-weight: bold;
  }

  .cancelation,
  .benefits {
    margin: 5px 0;
  }

  .arrival,
  .departure {
    display: inline-block;
    width: 49%;
  }

  .arrival .divider,
  .departure .divider {
    width: 55%;
    margin: 6px auto;
    font-weight: bold;
    text-align: center;
    display: inline-block;
  }

  .payment-details {
    margin: 10px 0;
  }

  .hotel-information {
    border: 1px solid #ddd;
    padding: 10px;
    margin: 10px 0;
  }

  .payment-details-title,
  .booked-title {
    display: block;
    margin-bottom: 5px;
  }

  .payment-details .divider {
    width: 25%;
    display: inline-block;
  }

  .booked .divider {
    line-height: 20px;
  }

  .remarks {
    margin-bottom: 20px;
  }

  .notes {
    border: 1px solid #ddd;
    padding: 15px;
  }

  .notes ul {
    margin: 0;
    padding-left: 15px;
  }

  .notes ul li B {
    color: red;
  }

  .more {
    margin: 15px 0;
    text-align: right;
  }

  table {
    border: 1px solid black;
    width: 100%;
    margin-bottom: 5px;
  }

  table {
    padding: 5px;
  }

  .w-50 {
    width: 40% !important;
  }
</style>

<body>
@php
  $no_of_rooms = 0;
  $no_of_adults = 0;
  $no_of_children = 0;


foreach($voucher['hotel']['booking_items'][0]['rooms'] as $room){
      $no_of_rooms += $room['no_of_rooms'];
  $no_of_adults += $room['no_of_adults'];
  $no_of_children += $room['no_of_children'];
}
@endphp
<div class="container">
  <div class="booking">
    <div class="booking-header-wrapper">
      <div class="booking-logo">Tripser</div>
      <div class="booking-head">
        <h1 class="booking-header-title">Booking <span>Confirmation</span></h1>
        <div class="booking-header-subtitle">please present either an electronic or paper copy of your booking
          confirmation upon check-in.
        </div>
      </div>
    </div>
    <div class="booking-body">
      <div class="booking-information">
        <table>
          <tr>
            <td>Clinet:</td>
            <td>
              <B>{{$voucher['holder']['title']}} {{$voucher['holder']['name']}} {{$voucher['holder']['surname']}}</B>
            </td>

            <td>Number of Rooms:</td>
            <td>
              <B>{{$no_of_rooms}}</B>
            </td>
          </tr>
          <tr>
            <td>Booking ID:</td>
            <td>
              <B>{{$voucher['booking_name']}}</B>
            </td>
            <td>Number of Extra Beds:</td>
            <td>
              <B>0</B>
            </td>
          </tr>
          <tr>
            <td>Booking Date:</td>
            <td>
              <B>{{$voucher['booking_date']}}</B>
            </td>
            <td>Number of Adults:</td>
            <td>
              <B>{{$no_of_adults}}</B>
            </td>
          </tr>

          <tr>
            <td>Country of Residence:</td>
            <td>
              <B>{{Cache::get($voucher['hotel']['country_code'])}}</B>
            </td>
            <td>Number of Children:</td>
            <td>
              <B>{{$no_of_children}}</B>
            </td>
          </tr>

          <tr>
            <td>Property:</td>
            <td>
              <B>{{$voucher['hotel']['name']}}</B>
            </td>
            <td>Promotion:</td>
            <td>
              <B>-</B>
            </td>
          </tr>
          <tr>
            <td>Address:</td>
            <td>
              <B>{{$voucher['hotel']['address']}}</B>
            </td>
          </tr>
          <tr>
            <td>Property Contact Number:</td>
            <td>
              <B>{{$voucher['hotel']['phone_number']}}</B>
            </td>
          </tr>
        </table>
      </div>

    {{--      <div class="cancelation divider">--}}
    {{--        <b>Cancelation Policy:</b> This booking is Non-Reundable and cannot be amended or modifided, Failure to aarice at your hotel or property will be treated as a No Show and no refund will be given(Property Policy).--}}
    {{--      </div>--}}
    <!--  -->
      <div class="benefits divider">
        <b>Benefits included:</b>
        @if(count($voucher['hotel']['booking_items'][0]['boarding_details']) > 0)
          {{implode(",", $voucher['hotel']['booking_items'][0]['boarding_details'])}}
        @endif
      </div>
      <!--  -->
      <div class="hotel-information">
        <div class="wrapper">
          <div class="arrival">
            <B>Arrival</B>:
            <div class="divider">{{DateTime::createFromFormat('Y-m-d', $voucher['checkin'])->format('M d,Y')}}</div>
          </div>
          <div class="departure">
            <B>Departure</B>:
            <div class="divider">{{DateTime::createFromFormat('Y-m-d', $voucher['checkout'])->format('M d,Y')}}</div>
          </div>
        </div>
        <!--  -->

      </div>
      <div class="hotel-information">
        <div class="booked">
          <div class="booked-title">
            <B>Important Note:</B>
          </div>
          <div>
            @foreach($voucher['hotel']['booking_items'][0]['rate_comments'] as $key =>$comment)
              @if(strlen($comment)> 2)
                <div>
                  <li><i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                    : {!! $comment !!}</li>
                </div>
              @endif
            @endforeach
          </div>
        </div>
      </div>
      <!--  -->
      <div class="hotel-information">
        <div class="remarks">
          <B>Additional Info:</B>
          @foreach($voucher['additional_info'] as $key =>$comment)

            @if(strlen($comment)> 2)

              <div>
                <li>&nbsp;&nbsp;&nbsp;<i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                  : {!! $comment !!}

              </div>

            @endif

          @endforeach

        </div>
        <!--  -->

      </div>
    </div>
  </div>
</div>
</body>


</html>
