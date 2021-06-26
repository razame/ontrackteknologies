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
          Affiliate Fund Allocation
        </h5>
        <div class="card-body">
          @if(session('error'))
            <div class='alert alert-danger'>{{session('error')}}</div>
          @endif
          <div class="row">
            <div class="col-xl-7 col-lg-7">
              <form action="/Affiliate-Fund-Allocation-Store" method="post" class="">
                @csrf

                <div class="media mb-2">
                  <div class="media-header">Agency Name</div>
                  <div class="media-body">

                    <select name="agent_id" class="form-control" id="agent_id" required>
                      <option value="" data-balance="0">Select Agent</option>
                      @role("Agent")
                      <option value="{{$user->id}}" onChange="showBalance()"
                              data-balance="${{$user->balance}}">{{$user->name}}</option>
                      @endrole
                      @role("SuperAdmin")
                      @foreach ($agents as $agent)
                        <option value="{{$agent->id}}" onChange="showBalance()"
                                data-balance="${{$agent->balance}}">{{$agent->name}}</option>
                      @endforeach
                      @endrole


                    </select>
                  </div>
                </div>
                <div class="media mb-2">
                  <div class="media-header">Select Branch</div>
                  <div class="media-body">
                    <select name="branch_id" class="form-control" id="branch_id" required>
                      <option value="">Select Branch</option>
                    </select>
                  </div>
                </div>
                <div class="media mb-2">
                  <div class="media-header">Transfer Amount</div>
                  <div class="media-body">
                    <input type="text" value="" required name="amount" class="form-control">

                  </div>
                </div>
                <div class="text-left mt-5 mb-2">
                  <button class="btn btn--blue">Allocate Funds</button>
                </div>
              </form>
            </div>

            <div class="col-xl-5 col-lg-5">
              <ul class="list-group">
                <li class="list-group-item bg--blue">Agency Balance Detail</li>
                <li class="list-group-item">Agency Current Balance:
                  <stong id="agent_balance"></strong>
                </li>
                <li class="list-group-item bg--blue">Branch Balance Detail</li>
                <li class="list-group-item">Branch Current Balance:
                  <stong id="branch_balance"></strong>
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
  <script>


    $("#agent_id").change(function () {

      $("#agent_balance").text($(this).find(':selected').data('balance'));

      $.ajax
      ({
        url: '/Affiliate-Fund-Allocation-Load-Branches',
        data: {
          branch_id: this.value, "_token": "{{ csrf_token() }}"
        },
        type: 'post',
        success: function (result) {
          console.log(result)
          let options = "<option value='' data-balance='$0'>Select Branch</option>";
          if (result.length > 0) {
            result.forEach(function (branch) {
              options = options + "<option value='" + branch.id + "' data-balance='$" + branch.balance + "'>" + branch.name + "</option>";
            })
          }
          $("#branch_id").html(options)
        }
      });
    });

    $("#branch_id").change(function () {

      $("#branch_balance").text($(this).find(':selected').data('balance'));
    });
  </script>
@endsection

