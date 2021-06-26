@extends('layouts/contentLayoutMaster')

@section('title', 'Cancellation')

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
          Cancellation : {{$booking->booking_name}}
        </h5>
        <div class="card-body">
          @if($errors->any())
            {!! implode('', $errors->all("<div class='alert alert-warning'>:message</div>")) !!}
          @endif
          <div class="row">
            <div class="col-xl-7 col-lg-7">
              <form action="/B2B-hotels/cancellation/{{$booking->id}}/{{$booking->booking_name}}" method="post" class=""
                    enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="" class="text-bold-600">Reason</label>
                  {!! Form::select('reason', [
                      "1"=>"Found lower price on the Internet",
                      "2"=>"Found lower price through a local agent",
                      "3"=>"Did not like cancellation terms",
                      "4"=>"Did not like payment terms",
                      "5"=>"Will book a different hotel through your site",
                      "6"=>"Will book with hotel directly",
                      "7"=>"Decided on a different hotel not offered by your site",
                      "8"=>"Booking was not confirmed quickly enough",
                      "9"=>"Concerns about reliability / trustworthiness",
                      "10"=>"Concerns about safety at the hotel's location",
                      "11"=>"Forced to cancel or postpone trip",
                      "12"=>"Natural Disaster",
                      "13"=>"Others",
                      ], null, ['class' => 'form-control']) !!}
                </div>


                <div class="form-group">
                  <label for="" class="text-bold-600">Comment</label>

                  <textarea name="comments" class="form-control"></textarea>
                </div>

                <div class="d-flex">
                  <button type="submit" class="btn btn--blue mr-2" name="action" value="cancel">Send [CANCEL REQUEST]
                  </button>
                </div>
              </form>
            </div>

            <div class="col-xl-5 col-lg-5">
              <ul class="list-group">
                <li class="list-group-item bg--blue text-bold-600">Note!</li>
                <li class="list-group-item">
                  <ul class="p-1">

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

