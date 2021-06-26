
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>

<style>
  * {
    box-sizing: border-box;
    font-family: sans-serif !important;
  }
  body {
    direction: ltr;
    text-align: left;
    font-size: 12.5px;
    font-family: "Helvetica Neue";
  }

  #wrapper {
    padding: 15px;
    margin: 0 auto;
  }

  table {
    width: 100%;
    border-collapse: collapse;
    line-height: 19px;
    margin-bottom: 20px;
    display: table;
    border-spacing: 2px;
  }

  table td,
  table th {
    padding: 12px 10px;
    border: 1px solid rgb(233, 232, 232);
  }

  .bold {
    font-weight: bold;
  }

  .header {
    margin-bottom: 30px;
  }

  .header h1 {
    font-weight: normal;
    font-size: 20px;
    text-transform: capitalize;
    display: inline-block;
  }

  .logo {
    color: #0984e2;
    font-size: 21px;
    font-weight: bold;
    float: right;
    margin-top: 0px;
  }
  .logo img {
    width: 150px;
  }
  .bold-sm {
    font-size: 13px;
    font-weight: bold;
    text-transform: capitalize;
  }

  table thead {
    background: #0984df;
    color: white;
    font-size: 17px;
    text-transform: capitalize;
  }

  table thead th {
    border-top: none;
    text-align: left !important;
  }

  .tbl-sm-bold {
    font-weight: bold;
    text-transform: capitalize;
    font-size: 13.5px;
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
  .page-break {
    page-break-after: always;
  }
  table img {
    width: 150px;
    margin: 0 auto;
  }
</style>

<body>

<div id="wrapper">
  <div class="header">
    <h1 class="bold" style="font-weight: bolder" >BOOKING CONFIRMATION</h1>
    <span class="logo"><img src="http://tripserb2b.com/agent/img/logo.png"></span>
  </div>

  <table>
    <thead>
    <th colspan="12">{{$booking['hotel']['name']}}</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="4"><img src="{{$booking['hotel']['url']}}" alt=""></td>
      <td colspan="4">
        <div class="bold" style="margin-bottom: 15px;">{{$booking['hotel']['name']}}</div>
        <div style="margin-bottom: 15px;">{{$booking['hotel']['address']}}</div>
        <div><span class="bold">Email:</span>{{@$booking['hotel']['email']}}</div>
      </td>
      <td colspan="4">
        <div style="margin-bottom: 15px;"><span class="bold">Phone Number:</span> {{@$booking['hotel']['phone_number']}}</div>
{{--        <div><span class="bold">fax:</span> +97142659777</div>--}}
      </td>
    </tr>
    </tbody>
  </table>
  <!--  -->

  <table class="table">

    <tr>
      <td colspan="12" style="text-align: justify">
        {!! $booking['hotel']['description'] !!}
      </td>
    </tr>

    <tr>
      <td colspan="6">Check In:</td>
      <td colspan="6">{{$booking['checkin']}}</td>
    </tr>
    <tr>
      <td colspan="6">Check Out:</td>
      <td colspan="6">{{$booking['checkout']}}</td>
    </tr>

  </table>
  <!--  -->
  <table>
    <thead>
    <th colspan="12">Confirmation Details</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="2"><span class="tbl-sm-bold">Room Type</span></td>
      <td colspan="4"><span class="tbl-sm-bold">Description</span></td>
      <td colspan="2"><span class="tbl-sm-bold">No. of Rooms</span></td>
      <td colspan="2"><span class="tbl-sm-bold">Adults</span></td>
      <td colspan="2"><span class="tbl-sm-bold">Children</span></td>
    </tr>
    @foreach($booking['hotel']['booking_items'][0]['rooms'] as $room)
      <tr>
        <td colspan="2">{{$room['room_type']}}</td>
        <td colspan="4">{{$room['description']}}</td>
{{--        <td colspan="2">{{$room['no_of_rooms']}}</td>--}}
        <td colspan="2">{{round($room['no_of_adults']/2,0)}}</td>

        <td colspan="2">{{$room['no_of_adults']}}</td>
        <td colspan="2">{{$room['no_of_children']}}</td>
      </tr>

    @endforeach
    <tr>
      <td colspan="2"><span style="font-weight: bold;font-size: 16px;">Other inclusions</span></td>
      <td colspan="10">
        @if(isset($booking['hotel']['booking_items'][0]['other_inclusions']))
          {{implode(',',$booking['hotel']['booking_items'][0]['other_inclusions'])}}
        @endif
      </td>
    </tr>
    </tbody>
  </table>
  <!--  -->
  <table>
    <thead>
    <th colspan="12">Booking Information</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="6">Status</td>
      <td colspan="6">{{$booking['booking_status']}}</td>
    </tr>
    <tr>
      <td colspan="6">Nationality</td>
      <td colspan="6"> {{$booking['nationality']}} </td>
    </tr>
    <tr>
      <td colspan="6">Agent Reference</td>
      <td colspan="6">{{$booking['agent_reference']}} </td>
    </tr>
    <tr>
      <td colspan="6">Total Price</td>

      <td colspan="6">{{$price['price']['total']}} USD </td>
    </tr>
    <tr>
      <td colspan="6">Booking Date</td>
      <td colspan="6">{{substr($booking['booking_date'],0,10)}}</td>
    </tr>
    <tr>
      <td colspan="6">Supplier Booking Date</td>
      <td colspan="6">{{substr($booking['voucher_issue_date'],0,10)}}</td>
    </tr>
    <tr>
      <td colspan="6">System Reference No.</td>
      <td colspan="6">{{$booking['booking_name']}}</td>
    </tr>
    <tr>
      <td colspan="6">Supplier Reference No.</td>
      <td colspan="6">{{$booking['booking_reference']}}</td>
    </tr>
    <tr>
      <td colspan="6">Payment Type</td>
      <td colspan="6">{{$booking['payment_type']}}</td>
    </tr>
    </tbody>
  </table>
  <!--  -->
  <table>
    <thead>
    <th colspan="12">Holder Details</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="6"><span class="tbl-sm-bold">Name</span></td>
      <td colspan="6">{{$booking['holder']['title']}} {{$booking['holder']['name']}} {{$booking['holder']['surname']}}</td>
    </tr>
{{--    <tr>--}}
{{--      <td colspan="6"><span class="tbl-sm-bold">Email</span></td>--}}
{{--      <td colspan="6">{{$booking['holder']['email']}}</td>--}}
{{--    </tr>--}}
{{--    <tr>--}}
{{--      <td colspan="6"><span class="tbl-sm-bold">Phone Number</span></td>--}}
{{--      <td colspan="6">{{$booking['holder']['phone_number']}}</td>--}}
{{--    </tr>--}}
    </tbody>
  </table>
  <!--  -->
  <table>
    <thead>
    <th colspan="12">Guest Details</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="4"><span class="tbl-sm-bold">Name</span></td>
      <td colspan="4"><span class="tbl-sm-bold">Type</span></td>
      <td colspan="4"><span class="tbl-sm-bold">Age</span></td>
    </tr>
    @foreach($booking['hotel']['paxes'] as $pax)
    <tr>

      <td colspan="4">{{$pax['title']}} {{$pax['name']}} {{$pax['surname']}}</td>

      <td colspan="4">{{$pax['type']}}</td>

      <td colspan="4">{{@$pax['age']}}</td>

    </tr>
    @endforeach

    </tbody>
  </table>
  <!--  -->
  <table>
    <thead>
    <th colspan="12">Important Note</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="12"><b style="font-weight: bold;">
          @foreach($booking['hotel']['booking_items'][0]['rate_comments'] as $key =>$comment)
            @if(strlen($comment)> 2)
                <li><i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                  : {!! $comment !!}</li>
        @endif

        @endforeach
      </td>
    </tr>
    </tbody>
  </table>
  <!--  -->
  @if(isset($booking['additional_info']))
  <table>
    <thead>
    <th colspan="12">Additional INFO</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="12"><b style="font-weight: bold;">

          @foreach($booking['additional_info'] as $key =>$comment)

            @if(strlen($comment)> 2)
                <li><i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                  : {!! $comment !!}</li>

        @endif

        @endforeach

      </td>
    </tr>
    </tbody>
  </table>
@endif
  <!--  -->
  <div class="page-break"></div>
  <table>
    <thead>
    <th colspan="12">Notes</th>
    </thead>
    <tbody>
    <tr>
      <td colspan="12">- Early check in and late check out is subject to availability. </td>
    </tr>
    <tr>
      <td colspan="12">- Standard Check in time is 14:00 hrs / check out time 12:00 hrs unless specified </td>
    </tr>
    <tr>
      <td colspan="12">- The refund for early check out or unutilized night or service is subject to discretion of the hotel & the supplier, we strongly recommend to get a letter from the hotel favoring no charges for early check out. </td>
    </tr>
    <tr>
      <td colspan="12">- Voucher covers only those taxes which are included in the booking price (if included), all various other applicable taxes needs to be settled directly by guest. </td>
    </tr>
    <tr>
      <td colspan="12">- Any issues which are bought to our notice later than 7 days will not be entertained.</td>
    </tr>

    </tbody>
  </table>

</div>

</body>

</html>
