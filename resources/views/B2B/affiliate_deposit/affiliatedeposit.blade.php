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
        <h5 class="card-header">
          Affiliate Deposit - PAY ONLINE
        </h5>
        <div class="card-body">
          @if($errors->any())
            {!! implode('', $errors->all("<div class='alert alert-warning'>:message</div>")) !!}
          @endif
          <div class="row">
            <div class="col-xl-7 col-lg-7">
              <form action="/Affiliate-Deposit-Store" method="post" class="" enctype="multipart/form-data">
                @csrf
                @hasrole("SuperAdmin")
                <div class="form-group">
                  <label for="" class="text-bold-600">Agency Name</label>
                  {!! Form::select('user_id', $agents, null, ['class' => 'form-control']) !!}
                </div>
                @else
                  <div class="form-group">
                    <label for="" class="text-bold-600">Agency Name</label>
                    {!! Form::select('user_id', [$user->id => $user->name], null, ['class' => 'form-control']) !!}
                  </div>
                  @endrole

                  <div class="form-group">
                    <label for="" class="text-bold-600">Enter Your Amount</label>
                    <input type="text" class="form-control" placeholder="Ex: 5000" required name="amount"
                           value="{{ old('amount') }}">
                  </div>



                  <div class="form-group">
                    <label for="" class="text-bold-600">Transaction Id</label>
                    <input type="text" class="form-control" placeholder="Ex: abc-5000" name="transaction_id"
                           value="OTB2B-APO-<?=rand(19999, 99999999);?>">
                  </div>





                  <div class="d-flex">
                    <button type="submit" class="btn btn--blue mr-2" name="action" value="pay_online">Pay Online
                    </button>


                  </div>
                  <br/>
                  <div><img src="{{ URL::to('/') }}/images/logo/mastercard_visa.png" width="200px"/></div>
              </form>
            </div>

            <div class="col-xl-5 col-lg-5">
              <ul class="list-group">
                <li class="list-group-item bg--blue text-bold-600">Note!</li>
                <li class="list-group-item">
                  <ul class="p-1">
                    <li class="mb-2">Agent's have to use their own credit/debits cards (Proprietors, Directors Or
                      Partners) to the maximum extend.
                    </li>
                    <li class="mb-2">Agent's should avoid using passenger's credit/debit card on our booking website as
                      far as possible.
                    </li>
                    <li class="mb-2">if Agent's use passenger's credit/debit card on our booking website and any charge
                      back arises against the transaction, we will be forced to pull back the updated amount from the
                      agent's account with immediate effect.
                    </li>
                    <li class="mb-2">charges for credit/debit card transaction will be 2.5% of the transaction value.
                    </li>
                  </ul>
                </li>
              </ul>
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
@endsection

