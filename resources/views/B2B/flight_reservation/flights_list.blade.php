@extends('layouts/contentLayoutMaster')


@section('title', 'Flight Availability')

@section('vendor-style')

  <!-- vendor css files -->

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">

@endsection

@section('page-style')

  <!-- Page css files -->

  <link rel="stylesheet" href="{{ asset('css/flights.css') }}">

@endsection

@section('content')

  <div class="content-wrapper">
    <div class="content-header row"></div>
    <div class="content-body pb-4 mb-3 mb-3 mb-3">
      <div class="container">
        <div class="row">
          <!-- filter  -->
          <div class="col-xl-3">
            <div class="filter">
              <div class="filter-row stop">
                <div class="filter-header">
                  Stop(s)
                </div>
                <div class="filter-body stop-body">
                  <a href="#" class="stop-item">0</a>
                  <a href="#" class="stop-item">1</a>
                  <a href="#" class="stop-item">2 +</a>
                </div>
              </div>
              <!--  -->
              <div class="filter-row">
                <div class="filter-header">
                  Departure Time(LON)
                </div>
                <div class="filter-body range-slider">
                  <div id="slider-range"></div>
                  <div class="slider-labels">
                    <div class="caption">
                      <span id="slider-range-value1"></span>
                    </div>
                    <div class="text-right caption">
                      <span id="slider-range-value2"></span>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="filter-row">
                <div class="filter-header">
                  Arrival Time (SAN)
                </div>
                <div class="filter-body range-slider">
                  <div id="slider-range2"></div>
                  <div class="slider-labels">
                    <div class="caption">
                      <span id="slider-range-value3"></span>
                    </div>
                    <div class="text-right caption">
                      <span id="slider-range-value4"></span>
                    </div>
                  </div>
                </div>
              </div>
              <!--  -->
              <div class="filter-row">
                <div class="filter-header">
                  Fare Type
                </div>
                <div class="filter-body">
                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" id="Refundable" name="Fare-Type">
                    <label class="custom-control-label" for="Refundable">Refundable</label>
                  </div>
                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input" id="Non-Refundable" name="Fare-Type">
                    <label class="custom-control-label" for="Non-Refundable">Non-Refundable</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-9">
          @foreach($flights as $flight)

            <!-- flight-box -->
              <div class="flight-box">
                <div class="flight-box-wrapper">
                  <!-- departure -->
                  <div class="flight-box-rows departure">
                    <!-- heading -->
                    <div class="flight-box-rows-heading">
                      Departure <i class="fa fa-plane"></i>
                    </div>

                    <!-- box content -->
                    <div class="flight-box-rows-summary">
                      <!-- logo -->
                      <div class="flight-box-rows-logo">
                        <img
                          src="https://www.gstatic.com/flights/airline_logos/70px/{{$flight['ValidatingAirline']}}.png"
                          class="img-fluid" alt=""></div>
                      <!-- radio -->
                      <div class="flight-box-rows-radio">
                        <label for="row2-departure1">
                          <div class="label-origin">{{$flight['Origin']}} (
                            @php
                              $DepartureTime = $flight['Segments'][0][0]['DepartureTime'];
                                echo date('H:i', strtotime($DepartureTime))
                            @endphp )</div>
                          <div class="label-destination">{{$flight['Destination']}} (
                            @php
                              $ArrivalTime = $flight['Segments'][0][count($flight['Segments'][0])-1]['ArrivalTime'];
                              echo date('H:i', strtotime($ArrivalTime))
                            @endphp
                            )</div>
                        </label>
                      </div>
                      <!-- Time -->

                      @php
                        $randon_id    =   'total_duration_'.rand(0,999999)
                      @endphp
                      <div class="flight-box-rows-time" id="{{$randon_id}}"></div>
                      <!-- stop -->
                      <div class="flight-box-rows-stop">
                        @if(count($flight['Segments'][0])  == 1)
                          Direct
                        @else
                          {{count($flight['Segments'][0])-1}} Stops
                        @endif</div>
                      <!-- icons -->
                      <div class="flight-box-rows-icons">

                      </div>
                      <!-- seats  -->
                      <div class="flight-box-rows-seats">
                        <div class="seats-count">{{$flight['Segments'][0][0]['NoOfSeatAvailable']}} Seats Left</div>
                        <div class="flight-details-btn">Flight Details <i
                            class="fa fa-caret-down flight-details-btn-caret"></i></div>
                      </div>
                    </div>
                    <!--  -->
                    <div class="flight-box-rows-airport">
                      {{Cache::get($flight['ValidatingAirline'])}} |
                      @foreach($flight['Segments'][0] as $dep_segment)
                        @php
                          $flight_numbers[] =  $dep_segment['OperatingCarrier'] . ' '. $dep_segment['FlightNumber'];
                          $flight_airlines[] =  $dep_segment['OperatingCarrier'] ;
                          $flight_cabin_class[] =  $dep_segment['CabinClass'] ;
                          $flight_cabin_class[] =  $dep_segment['CabinClass'] ;
                          $flight_duration[] =  $dep_segment['Duration']


                        @endphp
                      @endforeach
                      {{implode(' | ',$flight_numbers)}} | Operated By- : {{implode(', ',$flight_airlines)}} |
                      Cabin Class :{{implode(', ',array_unique($flight_cabin_class))}}

                    </div>
                  @php
                    $flight_numbers = [];
                    $flight_cabin_class = [];
                    $flight_airlines = []
                  @endphp
                  <!-- flight-details-box // show when click on flight details btn -->
                    <div class="flight-details-box">
                      <div class="flight-details-box-heading">
                        <span>Flight Infromation</span> <i class="fa fa-times-circle close"></i>
                      </div>
                      @foreach($flight['Segments'][0] as $key => $segment)
                        <div>
                          <B>Departure:</B> {{$segment['Origin']['AirportCode']}}
                          - {{$segment['Destination']['AirportCode']}}
                        </div>
                        <div class="flight-details-box-airport">
                          <img src="https://www.gstatic.com/flights/airline_logos/70px/{{$segment['Airline']}}.png"
                               class="img-fluid" alt="">
                          {{Cache::get($segment['OperatingCarrier'])}}
                          | {{$segment['Airline']}} {{$segment['FlightNumber']}} , Craft {{$segment['Craft']}} |
                          Operated By-: {{$segment['OperatingCarrier']}}
                        </div>
                        <div class="flight-details-box-wrapper">
                          <div class="flight-detials-box-item">
                            <div class="heading">Departure</div>
                            <div class="title">{{$segment['Origin']['CityName']}} <span>({{$segment['Origin']['CityCode']}})</span>
                            </div>
                            <div class="sm-text">{{$segment['Origin']['AirportName']}}
                              ({{$segment['Origin']['AirportCode']}})
                            </div>
                            <div class="sm-text">{{$segment['Origin']['CountryName']}}</div>
                            <div class="sm-text">Terminal: {{$segment['Origin']['Terminal']}}</div>
                            <div class="sm-text">{{date('H:i, M d, Y', strtotime($segment['DepartureTime']))}}</div>
                          </div>
                          <!--  -->
                          <div class="flight-detials-box-item">
                            <div class="heading">Arrival</div>
                            <div class="title">{{$segment['Destination']['CityName']}} <span>({{$segment['Destination']['CityCode']}})</span>
                            </div>
                            <div class="sm-text">{{$segment['Destination']['AirportName']}}
                              ({{$segment['Destination']['AirportCode']}})
                            </div>
                            <div class="sm-text">{{$segment['Destination']['CountryName']}}</div>
                            <div class="sm-text">Terminal: {{$segment['Destination']['Terminal']}}</div>
                            <div class="sm-text">{{date('H:i, M d, Y', strtotime($segment['ArrivalTime']))}}</div>
                          </div>
                          <div class="flight-detials-box-item">
                            <div class="heading">Flight Duration</div>
                            <div class="sm-text">{{$segment['Duration']}} </div>

                          </div>
                          <!--  -->
                          <div class="flight-detials-box-item">
                            <div class="heading">Baggage</div>
                            <div><b>Cabin</b>: {{$segment['CabinBaggage']}}</div>
                            <div><b>Included Baggage</b>: {{$segment['IncludedBaggage']}}</div>
                          </div>
                        </div>

                        @if(isset($flight['Segments'][0][$key+1]))
                          <div class="divider">
                            <div>{{Helper::dateDifference($segment['ArrivalTime'],$flight['Segments'][0][$key+1]['DepartureTime'],'%H hrs %i min')}}
                              , {{$segment['Destination']['AirportName']}}</div>

                            @php
                              $flight_duration[] = Helper::dateDifference($segment['ArrivalTime'],$flight['Segments'][0][$key+1]['DepartureTime'],'%H:%i:00')
                            @endphp
                          </div>
                        @endif
                      @endforeach

                      <div class="duration">
                        Flight Duration:
                        @php

                          $minutes = 0
                        @endphp
                        @foreach($flight_duration as $f_duration)

                          @php
                            $array_duration = explode(':',$f_duration);
                            $minutes += $array_duration[0] * 60;
                            $minutes += $array_duration[1]
                          @endphp
                        @endforeach
                        <span id="{{$randon_id.'_org'}}">
                          {{\App\Helpers\Helper::convertToHoursMins($minutes, '%02d hours %02d minutes')}}
                        </span>
                        <script>
                          document.getElementById("{{$randon_id}}").innerText = "{{\App\Helpers\Helper::convertToHoursMins($minutes, '%02d hrs %02d min')}}"
                        </script>
                        @php
                          unset($minutes);
                          unset($flight_duration)
                        @endphp

                      </div>
                    </div>


                  </div>
                  <!-------------------- departure -->


                  <!-------------------- RETURN -->
                  @if($flight['JourneyType'] == 2)
                    <div class="flight-box-rows return">
                      <!-- heading -->
                      <div class="flight-box-rows-heading">
                        Return <i class="fa fa-plane fa-rotate-180"></i>
                      </div>
                      <!-- box content -->
                      <div class="flight-box-rows-summary">
                        <!-- logo -->
                        <div class="flight-box-rows-logo">
                          <img
                            src="https://www.gstatic.com/flights/airline_logos/70px/{{$flight['ValidatingAirline']}}.png"
                            class="img-fluid" alt=""></div>
                        <!-- radio -->
                        <div class="flight-box-rows-radio">
                          <label for="row2-departure1">
                            <div class="label-origin">{{$flight['Destination']}} (
                              @php
                                $DepartureTime = $flight['Segments'][1][0]['DepartureTime'];
                                  echo date('H:i', strtotime($DepartureTime))
                              @endphp )</div>
                            <div class="label-destination">{{$flight['Origin']}} (
                              @php
                                $ArrivalTime = $flight['Segments'][1][count($flight['Segments'][1])-1]['ArrivalTime'];
                                echo date('H:i', strtotime($ArrivalTime))
                              @endphp
                              )</div>
                          </label>
                        </div>
                        <!-- Time -->
                        @php
                          $random_return_id =   'total_return_duration_'.rand(0,999999)
                        @endphp
                        <div class="flight-box-rows-time" id="{{$random_return_id}}"></div>
                        <!-- stop -->
                        <div class="flight-box-rows-stop">
                          @if(count($flight['Segments'][1])  == 1)
                            Direct
                          @else
                            {{count($flight['Segments'][1])-1}} Stops
                          @endif</div>
                        <!-- icons -->
                        <div class="flight-box-rows-icons">

                        </div>
                        <!-- seats  -->
                        <div class="flight-box-rows-seats">
                          <div class="seats-count">{{$flight['Segments'][1][0]['NoOfSeatAvailable']}} Seats Left</div>
                          <div class="flight-details-btn">Flight Details <i
                              class="fa fa-caret-down flight-details-btn-caret"></i></div>
                        </div>
                      </div>
                      <!--  -->
                      <div class="flight-box-rows-airport">
                        {{Cache::get($flight['ValidatingAirline'])}} |
                        @foreach($flight['Segments'][1] as $dep_segment)
                          @php
                            $flight_numbers[] =  $dep_segment['OperatingCarrier'] . ' '. $dep_segment['FlightNumber'];
                            $flight_airlines[] =  $dep_segment['OperatingCarrier'] ;
                            $flight_cabin_class[] =  $dep_segment['CabinClass'] ;
                            $flight_cabin_class[] =  $dep_segment['CabinClass'] ;
                            $flight_duration[] =  $dep_segment['Duration']


                          @endphp
                        @endforeach
                        {{implode(' | ',$flight_numbers)}} | Operated By- : {{implode(', ',$flight_airlines)}} |
                        Cabin Class :{{implode(', ',array_unique($flight_cabin_class))}}

                      </div>
                    @php
                      $flight_numbers = [];
                      $flight_cabin_class = [];
                      $flight_airlines = []
                    @endphp
                    <!-- flight-details-box // show when click on flight details btn -->
                      <div class="flight-details-box">
                        <div class="flight-details-box-heading">
                          <span>Flight Infromation</span> <i class="fa fa-times-circle close"></i>
                        </div>
                        @foreach($flight['Segments'][1] as $key => $segment)
                          <div>
                            <B>Departure:</B> {{$segment['Origin']['AirportCode']}}
                            - {{$segment['Destination']['AirportCode']}}
                          </div>
                          <div class="flight-details-box-airport">
                            <img src="https://www.gstatic.com/flights/airline_logos/70px/{{$segment['Airline']}}.png"
                                 class="img-fluid" alt="">
                            {{Cache::get($segment['OperatingCarrier'])}}
                            | {{$segment['Airline']}} {{$segment['FlightNumber']}} , Craft {{$segment['Craft']}} |
                            Operated By-: {{$segment['OperatingCarrier']}}
                          </div>
                          <div class="flight-details-box-wrapper">
                            <div class="flight-detials-box-item">
                              <div class="heading">Departure</div>
                              <div class="title">{{$segment['Origin']['CityName']}} <span>({{$segment['Origin']['CityCode']}})</span>
                              </div>
                              <div class="sm-text">{{$segment['Origin']['AirportName']}}
                                ({{$segment['Origin']['AirportCode']}})
                              </div>
                              <div class="sm-text">{{$segment['Origin']['CountryName']}}</div>
                              <div class="sm-text">Terminal: {{$segment['Origin']['Terminal']}}</div>
                              <div class="sm-text">{{date('H:i, M d, Y', strtotime($segment['DepartureTime']))}}</div>
                            </div>
                            <!--  -->
                            <div class="flight-detials-box-item">
                              <div class="heading">Arrival</div>
                              <div class="title">{{$segment['Destination']['CityName']}} <span>({{$segment['Destination']['CityCode']}})</span>
                              </div>
                              <div class="sm-text">{{$segment['Destination']['AirportName']}}
                                ({{$segment['Destination']['AirportCode']}})
                              </div>
                              <div class="sm-text">{{$segment['Destination']['CountryName']}}</div>
                              <div class="sm-text">Terminal: {{$segment['Destination']['Terminal']}}</div>
                              <div class="sm-text">{{date('H:i, M d, Y', strtotime($segment['ArrivalTime']))}}</div>
                            </div>
                            <div class="flight-detials-box-item">
                              <div class="heading">Flight Duration</div>
                              <div class="sm-text">{{$segment['Duration']}} </div>

                            </div>
                            <!--  -->
                            <div class="flight-detials-box-item">
                              <div class="heading">Baggage</div>
                              <div><b>Cabin</b>: {{$segment['CabinBaggage']}}</div>
                              <div><b>Included Baggage</b>: {{$segment['IncludedBaggage']}}</div>
                            </div>
                          </div>

                          @if(isset($flight['Segments'][0][$key+1]))
                            <div class="divider">
                              <div>{{Helper::dateDifference($segment['ArrivalTime'],$flight['Segments'][0][$key+1]['DepartureTime'],'%H hrs %i min')}}
                                , {{$segment['Destination']['AirportName']}}</div>

                              @php
                                $flight_duration[] = Helper::dateDifference($segment['ArrivalTime'],$flight['Segments'][0][$key+1]['DepartureTime'],'%H:%i:00')
                              @endphp
                            </div>
                          @endif
                        @endforeach

                        <div class="duration">
                          Flight Duration:
                          @php

                            $minutes = 0
                          @endphp
                          @foreach($flight_duration as $f_duration)

                            @php
                              $array_duration = explode(':',$f_duration);
                              $minutes += $array_duration[0] * 60;
                              $minutes += $array_duration[1]
                            @endphp
                          @endforeach
                          {{\App\Helpers\Helper::convertToHoursMins($minutes, '%02d hours %02d minutes')}}
                          <script>
                            document.getElementById("{{$random_return_id}}").innerText = "{{\App\Helpers\Helper::convertToHoursMins($minutes, '%02d hrs %02d min')}}"

                          </script>
                          @php
                            unset($minutes);
                            unset($flight_duration)
                          @endphp

                        </div>
                      </div>

                    </div>
                  @endif
                </div>
                <!-- flight-box-bookside -->
                <div class="flight-box-bookside">
                  <div class="flight-box-bookside-price">
                    <span class="currency">USD</span> {{number_format($flight['Fare']['TotalFare'], 2)}} <i
                      class="fa fa-coin"></i>
                  </div>
                  <div class="flight-box-bookside-total">
                    Total Amount <i class="fa fa-info-circle"></i>
                  </div>

                  @if($flight['NonRefundable'])
                    <div class="flight-box-bookside-danger">
                      Non-Refundable
                    </div>
                  @else
                    <div class="flight-box-bookside-success">
                      Refundable
                    </div>
                  @endif
                  <a href="{{route('FlightPassenger',['flight_id'=>$flight['id']])}}" class="btn btn-book-now">BOOK
                    NOW</a>
                </div>
              </div>
            @endforeach

            {{$flights->links()}}


          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('page-script')

  <!-- Page js files -->

  <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/pagination/pagination.js')) }}"></script>

  <script src="{{ asset(mix('js/scripts/extensions/noui-slider.js')) }}"></script>
  <script src="{{ asset('js/rangeslider.js') }}"></script>
  <script>
    $('.flight-details-btn').click(function () {
      $(this).parents('.flight-box-rows').find('.flight-details-box').slideToggle(500);
    });
    $('.flight-details-box-heading .close').click(function () {
      $(this).parents('.flight-details-box').slideToggle(500);
    });
    $('input[name=departure]').click(function () {
      if ($(this).parents('.flight-box').find('input[name=return]').filter(':checked').length == 0) {
        $(this).parents('.flight-box').find('input[name=return]:first').prop('checked', true);
      }
    });
    $('input[name=return]').click(function () {
      if ($(this).parents('.flight-box').find('input[name=departure]').filter(':checked').length == 0) {
        $(this).parents('.flight-box').find('input[name=departure]:first').prop('checked', true);
      }
    });
  </script>

@endsection

