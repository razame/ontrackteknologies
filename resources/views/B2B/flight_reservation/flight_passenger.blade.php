@extends('layouts/contentLayoutMaster')

@section('title', 'Add Passenger information')
@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/forms/validation/form-validation.css')) }}">
@endsection
@section('content')
  <div class="content-body">
    <div class="row">
      <!-- START .col-lg-8 -->
      <div class="col-lg-8">
        <!-- START .card -->
        <div class="card">

          <h4 class="card-header text-bold-600">Flight information</h4>
          <div class="card-body">
            <div class="table-responsive">
              <div class="alert alert-primary mb-2" role="alert">
                <strong>Departure</strong>
              </div>
              <table class="table table-bordered mb-0">
                <thead>
                <tr>
                  <th><h6 class="primary">Flight No.</h6></th>
                  <th><h6 class="primary">Departure</h6></th>
                  <th><h6 class="primary">Arrival</h6></th>
                  <th><h6 class="primary">Duration</h6></th>
                  <th><h6 class="primary">Baggage</h6></th>
                </tr>
                </thead>
                <tbody>
                @foreach($flight['Segments'][0] as $segment)
                <tr>
                  <th>
                    {{$segment['AirlineDetails']['AirlineCode']}} {{$segment['AirlineDetails']['Craft']}}<br>
                    Flight {{$segment['AirlineDetails']['FlightNumber']}}
                  </th>
                  <td>
                    {{$segment['Origin']['AirportCode']}} {{$segment['Origin']['AirportName']}}<br>
                    <strong>{{$segment['DepartureTime']}}</strong>
                  </td>
                  <td>
                    {{$segment['Destination']['AirportCode']}} {{$segment['Destination']['AirportName']}}<br>
                    <strong>{{$segment['ArrivalTime']}}</strong>
                  </td>
                  <td></td>
                  <td>
                    Cabin : {{$segment['CabinBaggage']}}<br>
                    Check-In :
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>

              @if($flight['JourneyType'] == 2)
                <br/>
                <div class="alert alert-primary mb-2" role="alert">
                  <strong>Return</strong>
                </div>
                <table class="table table-bordered mb-0">
                  <thead>
                  <tr>
                    <th><h6 class="primary">Flight No.</h6></th>
                    <th><h6 class="primary">Departure</h6></th>
                    <th><h6 class="primary">Arrival</h6></th>
                    <th><h6 class="primary">Duration</h6></th>
                    <th><h6 class="primary">Baggage</h6></th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($flight['Segments'][1] as $segment)
                    <tr>
                      <th>
                        {{$segment['AirlineDetails']['AirlineCode']}} {{$segment['AirlineDetails']['Craft']}}<br>
                        Flight {{$segment['AirlineDetails']['FlightNumber']}}
                      </th>
                      <td>
                        {{$segment['Origin']['AirportCode']}} {{$segment['Origin']['AirportName']}}<br>
                        <strong>{{$segment['DepartureTime']}}</strong>
                      </td>
                      <td>
                        {{$segment['Destination']['AirportCode']}} {{$segment['Destination']['AirportName']}}<br>
                        <strong>{{$segment['ArrivalTime']}}</strong>
                      </td>
                      <td></td>
                      <td>
                        Cabin : {{$segment['CabinBaggage']}}<br>
                        Check-In :
                      </td>
                    </tr>
                  @endforeach
                  </tbody>
                </table>
              @endif
            </div>
          </div>
          <h4 class="card-header text-bold-600">Passenger Details</h4>
          <div class="card-body">
{{--            <div class="alert alert-info">--}}
{{--              <i class="feather icon-clock fa-fw"></i> Your order is reserved for 00:14:11--}}
{{--            </div>--}}
            <form action="{{route('FlightPassengerStore',['flight_id'=>$flight->id])}}" method="POST">
              @csrf
            @foreach($flight['FareBreakdown'] as $fare_summary)

              @if($fare_summary['PassengerType'] =='1')
                  @for($i = 1; $i <= $fare_summary['PassengerCount']; $i++)

                    <div class="alert alert-blue mb-3">
                      Adult {{$i}}
                      <input type="hidden" name="passengers[adult][{{$i}}][type]" value="{{$fare_summary['PassengerType']}}" >
                      <input type="hidden" name="passengers[adult][{{$i}}][fare]" value="{{serialize($fare_summary)}}" >
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="title"><sup class="required">*</sup> Title</label>
                        <select class="select2 form-control" id="title" name="passengers[adult][{{$i}}][title]">
                          <option value="Mstr">Mstr</option>
                          <option value="Miss">Miss</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="name"><sup class="required">*</sup> Full Name</label>
                        <input type="text" name=passengers[adult][{{$i}}][name]" id="name" class="form-control" placeholder="E.g Alice" required value="Farhad {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="lastname"><sup class="required">*</sup> Last Name</label>
                        <input type="text" name="passengers[adult][{{$i}}][lastname]" id="lastname" class="form-control" placeholder="E.g Wong" required value="Arjmand {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="date_of_birth"><sup class="required">*</sup> Date Of Birth</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[adult][{{$i}}][date_of_birth]" id="date_of_birth" required />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="text" name="passengers[adult][{{$i}}][email]" id="email" class="form-control" placeholder="E.g yourname@company.com">
                      </div>



                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="country"><sup class="required">*</sup> Country code</label>
                        <select name="passengers[adult][{{$i}}][country_code]" class="select2 form-control" id="country">
                          @include('tools.country_codes')
                        </select>
                      </div>


                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="number"><sup class="required">*</sup>Contact Number</label>
                        <input type="text" name="passengers[adult][{{$i}}][contact_number]" id="number" class="form-control" placeholder="E.g 4411021" required  value="0935502 {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no">Frequent Flyer No (Airline Code)</label>
                        <input type="text" name="passengers[adult][{{$i}}][frequent_flyer_no]" id="frequent_flyer_no_airline_code"
                               class="form-control" placeholder="Airline Code"  value="ff {{$i}}" />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no_number">Frequent Flyer No (Number)</label>
                        <input type="text" name="passengers[adult][{{$i}}][frequent_flyer_no_number]" id="frequent_flyer_no_number" class="form-control"
                               placeholder="Number"  value="fn {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="nationality"><sup class="required">*</sup> Nationality</label>
                        <select name="passengers[adult][{{$i}}][nationality]" class="select2 form-control" id="nationality" required>
                          @include('tools.nationality')
                        </select>
                      </div>
                      @if(isset($ssr_request['MealList']['OutWard']))
                        <div class="col-lg-4 col-md-4 form-group">
                          <label for="mean_code">Mean List</label>
                          <select class="select2 form-control" id="mean_code" name="passengers[adult][{{$i}}][mean]">
                            @foreach($ssr_request['MealList']['OutWard'] as $mean)
                              <option value="{{serialize($mean)}}">{{$mean['Description']}}</option>
                            @endforeach
                          </select>
                        </div>
                      @endif

                      @if(isset($ssr_request['SeatList']['seat']))
                        <div class="col-lg-4 col-md-4 form-group">
                          <label for="mean_code">Seat List</label>
                          <select class="select2 form-control" id="mean_code" name="passengers[adult][{{$i}}][seat]">
                            <option value="">-- Select --</option>
                            @foreach($ssr_request['SeatList']['seat'] as $seat)
                              <option value="{{serialize($seat)}}">{{$seat['Description']}}</option>
                            @endforeach
                          </select>
                        </div>
                      @endif
                      <div class="col-lg-12 col-md-12 form-group">
                        <div class="alert alert-dark">
                          Passport Details
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_no"><sup class="required">*</sup> Passport Number</label>
                        <input type="text" name="passengers[adult][{{$i}}][passport_no]" id="passport_no" class="form-control" placeholder="E.g 205002812" required  value="passn {{$i}}">
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_expiry"><sup class="required">*</sup> Passport Expiry</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[adult][{{$i}}][passport_expiry]" id="passport_expiry" required/>
                      </div>
                    </div>
                  @endfor
                @endif
                @if($fare_summary['PassengerType'] =='2')
                  @for($i = 1; $i <= $fare_summary['PassengerCount']; $i++)

                    <div class="alert alert-blue mb-3">
                      Child {{$i}}
                      <input type="hidden" name="passengers[child][{{$i}}][type]" value="{{$fare_summary['PassengerType']}}" >
                      <input type="hidden" name="passengers[child][{{$i}}][fare]" value="{{serialize($fare_summary)}}" >
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="title"><sup class="required">*</sup> Title</label>
                        <select class="select2 form-control" id="title" name="passengers[child][{{$i}}][title]">
                          <option value="Mstr">Mstr</option>
                          <option value="Miss">Miss</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="name"><sup class="required">*</sup> Full Name</label>
                        <input type="text" name=passengers[child][{{$i}}][name]" id="name" class="form-control" placeholder="E.g Alice" required value="Farhad {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="lastname"><sup class="required">*</sup> Last Name</label>
                        <input type="text" name="passengers[child][{{$i}}][lastname]" id="lastname" class="form-control" placeholder="E.g Wong" required value="Arjmand {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="date_of_birth"><sup class="required">*</sup> Date Of Birth</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[child][{{$i}}][date_of_birth]" id="date_of_birth" required />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="text" name="passengers[child][{{$i}}][email]" id="email" class="form-control" placeholder="E.g yourname@company.com">
                      </div>



                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="country"><sup class="required">*</sup> Country code</label>
                        <select name="passengers[child][{{$i}}][country_code]" class="select2 form-control" id="country">
                          @include('tools.country_codes')
                        </select>
                      </div>


                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="number"><sup class="required">*</sup>Contact Number</label>
                        <input type="text" name="passengers[child][{{$i}}][contact_number]" id="number" class="form-control" placeholder="E.g 4411021" required  value="0935502 {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no">Frequent Flyer No (Airline Code)</label>
                        <input type="text" name="passengers[child][{{$i}}][frequent_flyer_no]" id="frequent_flyer_no_airline_code"
                               class="form-control" placeholder="Airline Code"  value="ff {{$i}}" />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no_number">Frequent Flyer No (Number)</label>
                        <input type="text" name="passengers[child][{{$i}}][frequent_flyer_no_number]" id="frequent_flyer_no_number" class="form-control"
                               placeholder="Number"  value="fn {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="nationality"><sup class="required">*</sup> Nationality</label>
                        <select name="passengers[child][{{$i}}][nationality]" class="select2 form-control" id="nationality" required>
                          @include('tools.nationality')
                        </select>
                      </div>
                      @if(isset($ssr_request['MealList']['OutWard']))
                        <div class="col-lg-4 col-md-4 form-group">
                          <label for="mean_code">Mean List</label>
                          <select class="select2 form-control" id="mean_code" name="passengers[child][{{$i}}][mean]">
                            @foreach($ssr_request['MealList']['OutWard'] as $mean)
                              <option value="{{serialize($mean)}}">{{$mean['Description']}}</option>
                            @endforeach
                          </select>
                        </div>
                      @endif

                      @if(isset($ssr_request['SeatList']['seat']))
                        <div class="col-lg-4 col-md-4 form-group">
                          <label for="mean_code">Seat List</label>
                          <select class="select2 form-control" id="mean_code" name="passengers[child][{{$i}}][seat]">
                            <option value="">-- Select --</option>
                            @foreach($ssr_request['SeatList']['seat'] as $seat)
                              <option value="{{serialize($seat)}}">{{$seat['Description']}}</option>
                            @endforeach
                          </select>
                        </div>
                      @endif
                      <div class="col-lg-12 col-md-12 form-group">
                        <div class="alert alert-dark">
                          Passport Details
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_no"><sup class="required">*</sup> Passport Number</label>
                        <input type="text" name="passengers[child][{{$i}}][passport_no]" id="passport_no" class="form-control" placeholder="E.g 205002812" required  value="passn {{$i}}">
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_expiry"><sup class="required">*</sup> Passport Expiry</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[child][{{$i}}][passport_expiry]" id="passport_expiry" required/>
                      </div>
                    </div>
                  @endfor
                @endif
                @if($fare_summary['PassengerType'] =='3')
                  @for($i = 1; $i <= $fare_summary['PassengerCount']; $i++)

                    <div class="alert alert-blue mb-3">
                      Child {{$i}}
                      <input type="hidden" name="passengers[infant][{{$i}}][type]" value="{{$fare_summary['PassengerType']}}" >
                      <input type="hidden" name="passengers[infant][{{$i}}][fare]" value="{{serialize($fare_summary)}}" >
                    </div>
                    <div class="row">
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="title"><sup class="required">*</sup> Title</label>
                        <select class="select2 form-control" id="title" name="passengers[infant][{{$i}}][title]">
                          <option value="Mstr">Mstr</option>
                          <option value="Miss">Miss</option>
                        </select>
                      </div>
                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="name"><sup class="required">*</sup> Full Name</label>
                        <input type="text" name=passengers[infant][{{$i}}][name]" id="name" class="form-control" placeholder="E.g Alice" required value="Farhad {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="lastname"><sup class="required">*</sup> Last Name</label>
                        <input type="text" name="passengers[infant][{{$i}}][lastname]" id="lastname" class="form-control" placeholder="E.g Wong" required value="Arjmand {{$i}}">
                      </div>

                      <div class="col-lg-3 col-md-3 form-group">
                        <label for="date_of_birth"><sup class="required">*</sup> Date Of Birth</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[infant][{{$i}}][date_of_birth]" id="date_of_birth" required />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="email">Email</label>
                        <input type="text" name="passengers[infant][{{$i}}][email]" id="email" class="form-control" placeholder="E.g yourname@company.com">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="country"><sup class="required">*</sup> Country code</label>
                        <select name="passengers[infant][{{$i}}][country_code]" class="select2 form-control" id="country">
                          @include('tools.country_codes')
                        </select>
                      </div>


                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="number"><sup class="required">*</sup>Contact Number</label>
                        <input type="text" name="passengers[infant][{{$i}}][contact_number]" id="number" class="form-control" placeholder="E.g 4411021" required  value="0935502 {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no">Frequent Flyer No (Airline Code)</label>
                        <input type="text" name="passengers[infant][{{$i}}][frequent_flyer_no]" id="frequent_flyer_no_airline_code"
                               class="form-control" placeholder="Airline Code"  value="ff {{$i}}" />
                      </div>
                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="frequent_flyer_no_number">Frequent Flyer No (Number)</label>
                        <input type="text" name="passengers[infant][{{$i}}][frequent_flyer_no_number]" id="frequent_flyer_no_number" class="form-control"
                               placeholder="Number"  value="fn {{$i}}">
                      </div>

                      <div class="col-lg-4 col-md-4 form-group">
                        <label for="nationality"><sup class="required">*</sup> Nationality</label>
                        <select name="passengers[infant][{{$i}}][nationality]" class="select2 form-control" id="nationality" required>
                          @include('tools.nationality')
                        </select>
                      </div>

                      <div class="col-lg-12 col-md-12 form-group">
                        <div class="alert alert-dark">
                          Passport Details
                        </div>
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_no"><sup class="required">*</sup> Passport Number</label>
                        <input type="text" name="passengers[infant][{{$i}}][passport_no]" id="passport_no" class="form-control" placeholder="E.g 205002812" required  value="passn {{$i}}">
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="passport_expiry"><sup class="required">*</sup> Passport Expiry</label>
                        <input type='text' class="form-control  pickadate-months-year"
                               name="passengers[infant][{{$i}}][passport_expiry]" id="passport_expiry" required/>
                      </div>
                    </div>
                  @endfor
                @endif
                @endforeach


                <div class="col-lg-12">
                  (Please ensure the accurate contact details of the passenger (as in ID Proof), so that the Airline can update the passenger about any changes and request to verify the Visa and airline transit information before proceeding with the booking to avoid any inconvenience/ADM from the respective carrier. Please note that several countries have imposed entry restrictions because of the novel coronavirus(COVID-19) outbreak, kindly verify the checklist on the airlines official website.)
                </div>

                <div class="col-lg-12 text-right mt-4">
                  <button class="btn btn-primary">PROCEED TO PAYMENT</button>
                </div>

                    </form>
          </div>
        </div>
        <!-- END .card -->
      </div>
      <!-- END .col-lg-8 -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">

            <h6>Fare Summary </h6>
            <div><small>Booking fare is subject to change, unless the booking has been ticketed</small></div>

            <div class="dropdown-divider mt-1 mb-1"></div>

            @foreach($flight['FareBreakdown'] as $fare_summary)
            <div class="d-flex justify-content-between">
              <div>
                @switch($fare_summary['PassengerType'])
                  @case('1')
                  Adult
                  @break
                  @case('2')
                  Child
                  @break
                  @case('3')
                  Infant
                  @break
                @endswitch
              </div>
              <div><h6>{{$fare_summary['PassengerCount']}}</h6></div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Base Fare</div>
              <div><h6>{{number_format($fare_summary['BaseFare'], 2)}} {{$fare_summary['Currency']}}</h6></div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Tax & Fee</div>
              <div><h6>{{number_format($fare_summary['Tax'], 2)}} {{$fare_summary['Currency']}}</h6></div>
            </div>

            <div class="dropdown-divider mt-1 mb-1"></div>
            @endforeach

            <div class="dropdown-divider mt-1 mb-1"></div>

            <h4>Total Price</h4>

            <div class="d-flex justify-content-between">
              <div><small></small></div>
              <div><h4>{{number_format($flight['Fare']['TotalFare'],2)}} {{$flight['Fare']['AgentPreferredCurrency']}}</h4></div>
            </div>

            <div class="bg-gray mt-3 p-2 rounded">
              <div>Need help? please contact our customer service.</div>

              <div class="text-bold-600">email: <span class="orange">support@tripserb2b.com</span></div>
            </div>

          </div>
        </div>
      </div>
      <div>
      </div>
    </div>
  </div>
@endsection
@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/wNumb.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>

  <script src="{{ asset(mix('vendors/js/pagination/jquery.bootpag.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pagination/jquery.twbsPagination.min.js')) }}"></script>

  <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
  <script>
    $('.pickadate-months-year').pickadate({
      format: 'yyyy-mm-dd',
      selectYears: true,
      selectMonths: true,
    });
  </script>

@endsection
@section('page-script')
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pickers/dateTime/pick-a-datetime.js')) }}"></script>

@endsection
