@extends('layouts/contentLayoutMaster')


@section('title', 'Show Invoice')



@section('content')




  <!-- ////_______ booking information _______/////// -->
  <div class="invoice-header">
    <div class="invoice-header-logo">
      <img src="/images/logo/logo.png" class="img-fluid" alt="" width="80px"/> <b>ViVa Aagent</b>
    </div>
    <div class="invoice-header-text">
      <h1 class="invoice-header-text-title">Booking <span>Confirmation</span></h1>
      <div class="invoice-header-subtitle">
        please present either electronic or paper copy of your confirmation upon check-in.
      </div>
    </div>
  </div>

  <div class="booking-wrapper">
    <div class="row">
      <div class="col-xl-6">
        <div class="card">
          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Booking Name:</div>
            <div class="booking-wrapper-row-value"> {{$booking['booking_name']}} </div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Booking Reference No:</div>
            <div class="booking-wrapper-row-value">{{$booking['booking_reference']}} </div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Client:</div>
            <div class="booking-wrapper-row-value">
              {{$booking['holder']['title']}}. {{$booking['holder']['name']}}   {{$booking['holder']['surname']}}
            </div>
          </div>


          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Country Of Residence:</div>
            <div class="booking-wrapper-row-value">{{$booking['hotel']['country_code']}} </div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Property:</div>
            <div class="booking-wrapper-row-value">{{$booking['hotel']['name']}}</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Address:</div>
            <div class="booking-wrapper-row-value">{{$booking['hotel']['address']}}</div>
          </div>
          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Property Contact Number:</div>
            <div class="booking-wrapper-row-value">{{$booking['hotel']['phone_number']}}</div>
          </div>
        </div>
      </div>
      <div class="col-xl-6">
        <div class="card">
          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Number Of Rooms:</div>
            <div class="booking-wrapper-row-value">1</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Number of Extra Beds:</div>
            <div class="booking-wrapper-row-value">0</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Nymber Of Adults:</div>
            <div class="booking-wrapper-row-value">2</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Number Of Children:</div>
            <div class="booking-wrapper-row-value">0</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Room Type:</div>
            <div class="booking-wrapper-row-value">AVANI ROOM</div>
          </div>

          <div class="booking-wrapper-row">
            <div class="booking-wrapper-row-title">Promotion:</div>
            <div class="booking-wrapper-row-value">Limited Time Offer</div>
          </div>

          <div>For Full Promotion details and conditions see confirmation email</div>
        </div>
      </div>
    </div>

    <div class="col-12">
      <div class="row">
        <div class="card card-gray">
          <b>Cancellation Policy:</b> Non-Refundable
        </div>

        <div class="card card-gray">
          <b>Benefites Included:</b> @if(isset($booking['hotel']['booking_items'][0]['other_inclusions']))
            {{implode(',',$booking['hotel']['booking_items'][0]['other_inclusions'])}}
          @endif
        </div>
      </div>
    </div>

    <div class="col-xl-12 arrival-departure">
      <div class="row">
        <div class="card card-gray">
          <div class="arrival-departure-bg">
            <div class="booking-wrapper-row">
              <div class="booking-wrapper-row-title">Arrival:</div>
              <div class="booking-wrapper-row-value">{{$booking['checkin']}}</div>
            </div>
            <div class="booking-wrapper-row">
              <div class="booking-wrapper-row-title">Departure:</div>
              <div class="booking-wrapper-row-value">{{$booking['checkout']}}</div>
            </div>
          </div>
        </div>

        <div class="card card-gray">
          <b>Remarks:</b>
          @foreach($booking['additional_info'] as $key =>$comment)

            @if(strlen($comment)> 2)

              <div>


                <li><b>{{ucwords(str_replace("_"," ",$key))}}</b> : {!! $comment !!}</li>

              </div>

            @endif

          @endforeach
        </div>

        <div class="card card-notes">
          <b class="mb-2">Notes:</b>
          <ul>
            @foreach($booking['hotel']['booking_items'][0]['rate_comments'] as $key =>$comment)
              @if(strlen($comment)> 2)
                <div>
                  <li><b>{{ucwords(str_replace("_"," ",$key))}}</b> : {!! $comment !!}</li>
                </div>
              @endif
            @endforeach
          </ul>
        </div>

      </div>
    </div>
  </div>
@endsection
