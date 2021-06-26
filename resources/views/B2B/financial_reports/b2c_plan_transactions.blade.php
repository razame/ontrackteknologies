<?php

use App\User;

?>
@extends('layouts/contentLayoutMaster')

@section('title', 'B2C Plans Transaction Reports')

@section('content')
  <div class="row">
    <div class="col-lg-12 transaction-report">
      <div class="card">
        <h5 class="card-header">
          B2C Plans Transactions
        </h5>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12 mt-1">
              <div class="table-responsive">
                <table class="table">
                  <tbody>
                  <tr class="bg--blue">
                    <td>
                      <div class="w-105px">Full Name</div>
                    </td>
                    <td>ORDER ID</td>
                    <td>AMOUNT</td>
                    <td>Plan</td>
                    <td>How Many Month</td>
                    <td>Payment Gateway</td>
                    <td>Payment Description</td>
                    <td>
                      <div class="w-100px">Create Date</div>
                    </td>
                    <td>Action</td>
                  </tr>
                  @foreach($reports as $report)
                    <tr>
                      <td>{{@User::find($report->user_id)->name}}</td>
                      <td>{{$report->reference_number}}</td>
                      <td>{{$report->amount}}</td>
                      <td>{{$report->plan_name}}</td>
                      <td>{{$report->how_many_month}}</td>
                      <td>{{$report->payment_gateway}}</td>
                      <td>
                        {{$report->payment_status_message}}(CODE: {{$report->payment_status_code}})
                      </td>
                      <td>{{$report->updated_at}}</td>
                      <td>
                        @if($report->payment_gateway == 'MIGS')
                          Updated
                        @else
                          <a href="/B2C-Plans-Reports-update/{{$report->id}}" class="btn btn--blue">Update</a>
                        @endif

                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          {{ $reports->links() }}
        </div>

      </div>

    </div>
  </div>
@endsection
