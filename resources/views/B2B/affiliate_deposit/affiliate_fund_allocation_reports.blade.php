<?php

use App\User;

?>
@extends('layouts/contentLayoutMaster')

@section('title', 'Branches')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection
@section('page-style')

@endsection

@section('content')
  <div class="row">
    <div class="col-lg-12 transaction-report">
      <div class="card">

        <h5 class="card-header mb-2">
          Affiliate Transaction Report
        </h5>
        <div class="card-body">
          @if(session('success'))
            <div class='alert alert-success'>{{session('success')}}</div>
          @endif
          <div class="row">

            @role("SuperAdmin")
            <div class="col-lg-5 col-md-6 mx-auto">
              <form action="" method="GET" class="">
                <div class="media mb-2">
                  <div class="media-header">Agency Name</div>
                  <div class="media-body">
                    {!! Form::select('user_id', ['All'=>"All"] + $agents,$q_user_id, ['class' => 'form-control']) !!}
                  </div>
                </div>
                <div class="media mb-2">
                  <div class="media-header">Status</div>
                  <div class="media-body">
                    {!! Form::select('status', ['All'=>"All"],$q_status, ['class' => 'form-control']) !!}
                  </div>
                </div>


            </div>
            <div class="col-lg-5 col-md-6 mx-auto">
              <div class="media mb-2">
                <div class="media-header">From date</div>
                <div class="media-body position-relative">
                  {!! Form::text('from_date', $from_date, ['class' => 'form-control  format-picker']) !!}
                </div>
              </div>
              <div class="media mb-2">
                <div class="media-header">To date</div>
                <div class="media-body position-relative">
                  {!! Form::text('to_date', $to_date, ['class' => 'form-control  format-picker']) !!}
                </div>
              </div>


              <div class="text-right mt-2">
                <button type="submit" class="btn btn--blue">Search</button>
              </div>

              </form>
            </div>
            @endrole
            <div class="col-lg-12 mt-3">
              <div class="table-responsive">
                <table class="table table-hover deposit-report-table">
                  <tbody>
                  <tr class="bg--blue">
                    <td>From</td>
                    <td>To</td>
                    <td>Amount</td>
                    <td>Transaction ID</td>
                    <td>
                      <div class="w-105px"> Date</div>
                    </td>

                  </tr>

                  @foreach($affiliate_deposits_reports as $affiliate_deposit)
                    <tr>
                      <td>{{User::find($affiliate_deposit->user_id)->name}}</td>
                      <td>{{User::find($affiliate_deposit->to_user)->name}}</td>
                      <td>{{$affiliate_deposit->amount}}</td>
                      <td>{{$affiliate_deposit->reference_number}}</td>
                      <td>
                        <div class="w-105px">{{date('F , j, Y',$affiliate_deposit->date_of_transaction)}}</div>
                      </td>


                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $affiliate_deposits_reports->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/pickers/dateTime/pick-a-datetime.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>
@endsection



