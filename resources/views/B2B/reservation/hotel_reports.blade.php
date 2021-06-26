@php
  use App\User
@endphp
@extends('layouts/contentLayoutMaster')

@section('title', 'hotel Reports')

@section('content')
  <div class="content-body">
    <div class="row">
      <div class="col-lg-12 invoices">

        <div class="card">

          <h4 class='card-header'>Agent invoices @if(isset($status)) <span
              style="color:darkslateblue"><b>{{strtoupper($status)}}</b></span> @endif</h4>
          @if(session('success'))
            <div class='alert alert-success'>{{session('success')}}</div>
          @endif
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <tbody>
                <tr class="table-dark">
{{--                  <td>Date</td>--}}
                  <td>Agent</td>
{{--                  <td>CheckIn</td>--}}
{{--                  <td>CheckOut</td>--}}
                  <td>Holder</td>
{{--                  <td>Pax</td>--}}
                  <td>Price</td>
                  <td>Status</td>


                  <td></td>
                </tr>
                @foreach ($hotel_booking as $book)
                  <tr>

                    @php
                      $book['response'] = unserialize($book['booking_details_res'])
                    @endphp

{{--                    <td>{{$book['response']['booking_date'] }}</td>--}}
                    <td>{{User::find($book->user_id)->name}}</td>
{{--                    <td>{{$book['response']['checkin'] }}</td>--}}
{{--                    <td>{{$book['response']['checkout'] }}</td>--}}
                    <td>{{$book['response']['holder']['name'] }} {{$book['response']['holder']['surname'] }}</td>
{{--                    <td>{{$book['response']['checkout'] }}</td>--}}
                    <td>{{$book['response']['price']['total'] }} USD</td>
                    <td>
                      @if(strlen($book['cancellation_status']) == 0)

                        {{$book['response']['status'] }}

                      @else
                        <span style="color:red">CANCELD({{$book['cancellation_status'] }})</span>
                      @endif
                    </td>
                    <td>
                      <div class="btn-group mb-1">
                        <div class="dropdown">
                          <button class="btn btn-primary dropdown-toggle mr-1" type="button" id="dropdownMenuButton"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Actions
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if(strlen($book['cancellation_status']) == 0)
                              <a class="dropdown-item" href="/B2B-reservation/show-invoice/{{$book->booking_name}}">Voucher</a>
                              <a class="dropdown-item" href="/B2B-hotels/cancel/{{$book->id}}/{{$book->booking_name}}">Cancel
                                Booking</a>
                            @endif
                            @role("SuperAdmin")
                            <a class="dropdown-item" href="/B2B-hotels/show-booked-hotel-logs/{{$book->id}}">Show
                              Logs</a>
                            @endrole
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach


                </tbody>
              </table>

              {{$hotel_booking->links()}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
