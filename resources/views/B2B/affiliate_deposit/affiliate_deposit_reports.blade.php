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
          Transaction Report
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
                    {!! Form::select('status', ['All'=>"All"] + ['Reject'=>'Reject','Approved'=>'Approved','NotApproved'=>'Not Approved'],$q_status, ['class' => 'form-control']) !!}
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
                    <td>Agancy Name</td>
                    <td>AMOUNT</td>
{{--                    <td>Bank Name</td>--}}
                    <td>Transaction ID</td>
{{--                    <td>Type</td>--}}
                    <td>
                      <div class="w-105px"> Date</div>
                    </td>
                    <td>
                      <div class="w-105px">STATUS</div>
                    </td>
                    <td>
                      <div class="w-105px">ACTION</div>
                    </td>
                  </tr>

                  @foreach($affiliate_deposits as $affiliate_deposit)
                    <tr>
                      <td>{{@User::find($affiliate_deposit->user_id)->name}}</td>
                      <td>{{$affiliate_deposit->amount}}</td>
{{--                      <td>{{$affiliate_deposit->bank_name}}</td>--}}
                      <td>{{$affiliate_deposit->transaction_id}}</td>
{{--                      <td>{{$affiliate_deposit->type}}</td>--}}
                      <td>
                        <div class="w-105px">{{date('Y-M-d', $affiliate_deposit->date_of_transaction)}}</div>
                      </td>
{{--                      <td>--}}
{{--                        <div class="w-105px">{{$affiliate_deposit->card_number}}</div>--}}
{{--                      </td>--}}
{{--                      <td>--}}
{{--                        <form action="{{route('savecardnumber')}}" method="post">--}}
{{--                          @csrf--}}
{{--                          <input type="hidden" name="id" value="{{$affiliate_deposit->id}}">--}}
{{--                          <input type="text" name="card_number" value="{{$affiliate_deposit->card_number}}"/>--}}
{{--                          <button type="submit" name="SAVE" value="SAVE" >Save</button>--}}
{{--                        </form>--}}
{{--                      </td>--}}
                      <td>
                        @if($affiliate_deposit->status =='Reject')
                          <div class="chip chip-danger">
                            <div class="chip-body">
                              <div class="chip-text">Reject</div>
                            </div>
                          </div>
                        @elseif($affiliate_deposit->status == 'NotApproved')
                          <div class="chip chip-warning">
                            <div class="chip-body">
                              <div class="chip-text">Not Approved</div>
                            </div>
                          </div>
                        @else
                          <div class="chip chip-success">
                            <div class="chip-body">
                              <div class="chip-text">Approved</div>
                            </div>
                          </div>
                        @endif

                      </td>
                      <td>
                        @if($affiliate_deposit->status == 'Approved' OR $affiliate_deposit->status == 'Reject' )
                          @if($affiliate_deposit->status == 'Approved')
                            <a href="{{route('CreatePdfForApprovedBankReceipt',['id'=>$affiliate_deposit->id])}}">Receipt</a>
                          @endif


                        @else
                          @role("SuperAdmin")
                          <button class="btn btn-light-blue" data-toggle="modal"
                                  data-target="#inlineForm_{{$affiliate_deposit->id}}">Update
                          </button>
                          @else
                            Wating for SuperAdmin
                            @endrole
                          @endif

                      </td>
                      <div class="modal fade text-left" id="inlineForm_{{$affiliate_deposit->id}}" tabindex="-1"
                           role="dialog"
                           aria-labelledby="myModalLabel33" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel33">
                                Agent: {{@User::find($affiliate_deposit->user_id)->name}} </h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            {{ Form::model($affiliate_deposit,
                            array('url' => array('/Affiliate-Deposit-Change-Status/'.$affiliate_deposit->id ), 'method' => 'POST')) }}
                            <div class="modal-body">
                              <label>Status: </label>
                              <div class="form-group">
                                {!! Form::select('status',
                                    ["Reject"=>"Reject","Approved"=>"Approved"],
                                         null, ['class' => 'form-control']) !!}
                              </div>
                              <label>Remark: </label>
                              <div class="form-group">
                                <textarea name="status_remark" id="remark" rows="6" cols="4"
                                          class="form-control">{{$affiliate_deposit->status_remark}}</textarea>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-success">Update</button>
                              <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
                {{ $affiliate_deposits->links() }}
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



