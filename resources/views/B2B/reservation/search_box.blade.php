@php
  use App\GnrCity
@endphp
@extends('layouts/contentLayoutMaster')

@section('title', 'Welcome to TripserB2B.com')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/pickers/pickadate/pickadate.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">
@endsection
@section('content')

  <!-- BEGIN: search-box -->
  <div class="col-lg-12 search-box">
    <ul class="nav nav-tabs justify-content-center" role="tablist">
      <li class="nav-item">
        <a class="nav-link @if($action == 'flight') active @endif" id="flights-tab" data-toggle="tab" href="#flights"
           aria-controls="flights" role="tab"
           aria-selected="true">FLIGHTS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link @if($action == 'hotel' or $action == null) active @endif" id="hotels-tab" data-toggle="tab"
           href="#hotels" aria-controls="hotels" role="tab"
           aria-selected="true">Hotels</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="transfer-tab" data-toggle="tab" href="#transfer" aria-controls="transfer" role="tab"
           aria-selected="true">TRANSFER</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="sightseeing-tab" data-toggle="tab" href="#sightseeing" aria-controls="sightseeing"
           role="tab" aria-selected="true">SIGHTSEEING</a>
      </li>
      <!-- <li class="nav-item">
          <a class="nav-link " id="home-tab" data-toggle="tab" href="#flights" aria-controls="flights" role="tab" aria-selected="flase">Flights</a>
      </li> -->

    </ul>

    <div class="tab-content">
      @if($errors->any())
        {!! implode('', $errors->all("<div class='alert alert-warning'>:message</div>")) !!}
      @endif
      <div class="tab-pane @if($action == 'flight') active @else fade @endif " id="flights"
           aria-labelledby="flights-tab" role="tabpanel">
        {{ Form::open(['url' => 'B2B-flight-reservation/searching','method' => 'get']) }}
        <div class="row pr-3 pl-3">
          <div class="col-lg-12 col-md-12 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0">
              <ul class="list-unstyled mb-0">

                <li class="d-inline-block mr-2">
                  <fieldset>
                    <div class="vs-radio-con vs-radio-primary">
                      <input type="radio" name="advance" value="oneway" class="oneway_btn">
                      <span class="vs-radio vs-radio-lg">
                            <span class="vs-radio--border"></span>
                            <span class="vs-radio--circle"></span>
                        </span>
                      <span class="oneway_btn">ONE WAY</span>
                    </div>
                  </fieldset>
                </li>
                <li class="d-inline-block mr-2">
                  <fieldset>
                    <div class="vs-radio-con vs-radio-primary">
                      <input type="radio" name="advance" value="return" CHECKED class="return_btn">
                      <span class="vs-radio vs-radio-lg">
                            <span class="vs-radio--border"></span>
                            <span class="vs-radio--circle"></span>
                        </span>
                      <span class="return_btn">RETURN</span>
                    </div>
                  </fieldset>
                </li>
              </ul>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 search-field">
            <div class="form-group mb-0 mb-0 mb-0 mb-0 mb-0 mb-0 mb-0">
              <label for="" class="search-label text-bold-600">From</label>
              <select class="form-control select2-flight-from"
                      id="select2-ajax-flight-origin" required name="from"
                      data-validation-required-message="This FROM field is required">
              </select>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 search-field">
            <div class="form-group mb-0 mb-0 mb-0 mb-0 mb-0 mb-0 mb-0">
              <label for="" class="search-label text-bold-600">To</label>
              <select class="form-control select2-flight-to"
                      id="select2-ajax-flight-to" required name="to"
                      data-validation-required-message="This TO field is required">
              </select>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0">
              <div><label class="search-label text-bold-600">Departure</label></div>
              <input type='text' class="form-control datepicker-departure" name="departure_date"
                     placeholder="DD-MM-YYYY"/>
            </div>
          </div>
          <div class="col-lg-3 col-md-5 search-field ">
            <div class="form-group t-datepicker flight-datepicker mb-0 return_date">
              <div><label class="search-label text-bold-600">Return</label></div>
              <input type='text' class="form-control datepicker-return" name="return_date" placeholder="DD-MM-YYYY"/>
            </div>
          </div>

          <div class="col-lg-2 col-md-5 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0">
              <div><label class="search-label text-bold-600">Adult (12+ Years)</label></div>
              <input type='number' class="form-control" name="adult_count" value="1"/>
            </div>
          </div>

          <div class="col-lg-2 col-md-5 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0">
              <div><label class="search-label text-bold-600">Child (2-11 Years)</label></div>
              <input type='number' class="form-control" name="child_count" value="0"/>
            </div>
          </div>

          <div class="col-lg-2 col-md-5 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0">
              <div><label class="search-label text-bold-600">Infant (< 2 years)</label></div>
              <input type='number' class="form-control" name="infant_count" value="0"/>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 search-field">
            <div class="form-group mb-0 mb-0 mb-0 mb-0 mb-0 mb-0 mb-0">
              <label for="" class="search-label text-bold-600">Preferred Airline(Optional)</label>
              <select class="form-control select2-flight-preferred-airline"
                      id="select2-ajax-flight-preferred-airline" name="preferred_airline"
                      data-validation-required-message="This Preferred Airline field is required">
              </select>
            </div>
          </div>


          <div class="col-lg-12 search-field text-center">
            <button class="btn has-secondary-bg search-btn">Search</button>
          </div>
        </div>
        </form>
      </div>

      <div class="tab-pane  @if($action == 'hotel' OR $action == null) active @else fade @endif" id="hotels"
           aria-labelledby="hotels-tab" role="tabpanel">
        {{ Form::open(['url' => 'B2B-reservation/searching','method' => 'get']) }}
        <input type="hidden" name="reservation_type" value="hotel"/>
        <div class="row pr-lg-3 pl-lg-3 pr-md-3 pl-md-3 pr-sm-3 pl-sm-3 pr-2 pl-2">
          <div class="col-lg-4 col-md-4 col-sm-12 search-field">
            <div class="form-group mb-0">
              <div>
                <label for="" class="search-label text-bold-600">City / Area / Hotel </label>
              </div>
              <select class="select2-data-ajax-zumata-regions form-control"
                      id="select2-ajax" required name="location"
                      data-validation-required-message="This City field is required">
              </select>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 search-field">
            <div class="form-group t-datepicker flight-datepicker mb-0  check-validator">
              <i class="feather icon-x remove-checkout"></i>
              <div>
                <label class="search-label text-bold-600">Check In - Check Out</label>
              </div>
              <div class="t-check-in"></div>
              <div class="t-check-out"></div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12 search-field">
            <div class="dropdown select-nationality">
              <label for="" class="search-label text-bold-600">Nationality</label>
              <select class="form-control" id="nationality" name="client_nationality" required>
                @include('tools.nationality')
              </select>
            </div>
          </div>


          <div class="col-lg-12 search-feild-row">
            <div class="search-feild-wrapper">
              <div class="remove-search-feild-btn"><i class="fa fa-times fa-fw"></i></div>
              <div class="search-field">
                <div class="dropdown select-adults">
                  <label for="" class="search-label text-bold-600">Adult</label>
                  <select class="form-control" id="adults" name="rooms[1][adults]">
                    @for($i=1; $i <= 9 ; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="search-field">
                <div class="dropdown select-children">
                  <label for="" class="search-label text-bold-600">Children</label>
                  <select class="form-control children" name="rooms[1][children]">
                    @for($i=0; $i <= 2 ; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="search-field has-select-child-box child-age-1" id="child_1_age_id_1">
                <div class="dropdown select-chiild_1_age">
                  <label for="" class="search-label text-bold-600">Child 1 Age</label>
                  <select class="form-control" id="chiild_1_age" name="rooms[1][chiild_1_age]">
                    @for($i=1; $i <= 11 ; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="search-field has-select-child-box child-age-2" id="child_2_age_id_1">
                <div class="dropdown select-chiild_2_age">
                  <label for="" class="search-label text-bold-600">Child 2 Age</label>
                  <select class="form-control" id="chiild_2_age" name="rooms[1][chiild_2_age]">
                    @for($i=1; $i <= 11 ; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>

              <div class="search-field">
                <div class="dropdown select-infant">
                  <label for="" class="search-label text-bold-600">Infant</label>
                  <select class="form-control" id="infant" name="rooms[1][infant]">
                    @for($i=0; $i <= 2 ; $i++)
                      <option value="{{$i}}">{{$i}}</option>
                    @endfor
                  </select>
                </div>
              </div>

            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 search-field">
              <div class="dropdown ">
                <label for="" class="search-label text-bold-600">Hotel Category</label>
                <select class="form-control" id="star_category" name="star_category" required>
                  <option selected value="all">All</option>
                  <option value="3">3 stars or more</option>
                  <option value="4">4 stars or more</option>
                  <option value="5">5 stars or more</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 new-room-goes-here"></div>

        <div class="col-12">
          <div class="add-room-btn">
            <button type="button">Add Room <i class="fa fa-plus fa-fw"></i></button>
          </div>
        </div>

        <div class="col-lg-12 search-field text-center">
          <button class="btn has-secondary-bg search-btn">Search</button>
        </div>
      </div>
      </form>


      <div class="tab-pane fade" id="transfer" aria-labelledby="transfer-tab" role="tabpanel">
        TRANSFER
      </div>

      <div class="tab-pane fade" id="sightseeing" aria-labelledby="sightseeing-tab" role="tabpanel">
        SIGHTSEEING
      </div>
    </div>
    <!-- END: search-box -->
  </div>
  {{-- <div class="col-lg-12 mx-auto">
      <!-- START: RECENT VIEWS -->
      <div class="recent-views mt-3">
          <h3 class="has-secondary-color mt-1 mb-1 text-bold-600">
              Recent Search <small class="float-right clear-recent-views"></small>
          </h3>
          <div class="row">
              @foreach($searches as $search)
              @php
              $search['data'] = unserialize($search['params'])

              @endphp
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 mb-1">
                  <a href="">
                      <div class="media">
                          <a class="media-left" href="#">
                              <img src="/images/hotel-icon-blue-300x284.jpg" alt="" />
                          </a>
                          <div class="media-body">
                              <h6 class="media-heading">{{ GnrCity::where('city_code',$search['data']['city'])->first()->city_name}}</h6>
                              <div class="recent-views-date">{{ @$search['data']['checkin']}} - {{ @$search['data']['checkout']}}</div>
                              <div class="text-right text-bold-700 recent-views-cost"> {{$search['created_at']}} </div>
                          </div>
                      </div>
                  </a>
              </div>
              @endforeach
          </div>
      </div>
  </div>  --}}
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/wNumb.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.date.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/picker.time.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pickers/pickadate/legacy.js')) }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/noui-slider.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pickers/dateTime/pick-a-datetime.js')) }}"></script>

  <script>

    $('.return_btn').click(function () {
      $('.return_date').show()
    })

    $('.oneway_btn').click(function () {
      $('.return_date').hide()
    })


    $('.datepicker-departure').pickadate({
      // Escape any “rule” characters with an exclamation mark (!).
      format: 'dddd, dd mmm, yyyy',
      formatSubmit: 'yyyy-m-dd'
    })
    $('.datepicker-return').pickadate({
      // Escape any “rule” characters with an exclamation mark (!).
      format: 'dddd, dd mmm, yyyy',
      formatSubmit: 'yyyy-m-dd'
    })

    $('.children option[value="0"]').attr("selected", true);

    // hotels
    $(".select2-data-ajax-zumata-regions").select2({
      ajax: {
        url: "/gnr/region-lists",
        type: "get",
        dataType: 'json',
        placeholder: 'Search for a Locations',
        data: function (params) {
          return {
            q: params.term // search term
          };
        },

        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      }
    });

    // flights - Departure
    $(".select2-flight-from").select2({
      ajax: {
        url: "/tbo/airport-list",
        type: "get",
        dataType: 'json',
        placeholder: 'Search for a Airports',
        data: function (params) {
          return {
            q: params.term // search term
          };
        },

        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      },
      width: '100%',
    });

    // flights - return
    $(".select2-flight-to").select2({
      ajax: {
        url: "/tbo/airport-list",
        type: "get",
        dataType: 'json',
        placeholder: 'Search for a Airports',
        data: function (params) {
          return {
            q: params.term // search term
          };
        },

        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      },
      width: '100%',
    });

    // flights - return
    $(".select2-flight-preferred-airline").select2({
      ajax: {
        url: "/tbo/airline-list",
        type: "get",
        dataType: 'json',
        placeholder: 'Search for a Airports',
        data: function (params) {
          return {
            q: params.term // search term
          };
        },

        processResults: function (response) {
          return {
            results: response
          };
        },
        cache: true
      },
      width: '100%',
    });


    /////// add new room
    $('.add-room-btn button').click(function () {
      var html = "";
      var length = $('.new-room-goes-here .search-feild-wrapper').length;
      var length1 = length + 2;

      html += '<div class="search-feild-wrapper">';
      html += '<div class="remove-search-feild-btn"><i class="fa fa-times fa-fw"></i></div>';
      html += '<div class="search-field">';
      html += '<div class="dropdown select-adults">';
      html += '<label for="" class="search-label text-bold-600">Adult</label>';
      html += '<select class="form-control" id="adults" name="rooms[' + length1 + '][adults]">';
      html += '<option value="1">1</option>';
      html += '<option value="2">2</option>';
      html += '<option value="3">3</option>';
      html += '<option value="4">4</option>';
      html += '<option value="5">5</option>';
      html += '<option value="6">6</option>';
      html += '<option value="7">7</option>';
      html += '<option value="8">8</option>';
      html += '<option value="9">9</option>';
      html += '</select>';
      html += '</div>';
      html += '</div>';
      html += '<div class="search-field">';
      html += '<div class="dropdown select-children">';
      html += '<label for="" class="search-label text-bold-600">Children</label>';
      html += '<select class="form-control children" id="children" name="rooms[' + length1 + '][children]">';
      html += '<option value="0">0</option>';
      html += '<option value="1">1</option>';
      html += '<option value="2">2</option>';
      html += '</select>';
      html += '</div>';
      html += '</div>';
      html += '<div class="search-field has-select-child-box child-age-1"  id="child_1_age_id_' + length1 + '">';
      html += '<div class="dropdown select-chiild_1_age">';
      html += '<label for="" class="search-label text-bold-600">Child 1 Age</label>';
      html += '<select class="form-control" id="chiild_1_age" name="rooms[' + length1 + '][chiild_1_age]">';
      html += '<option value="1">1</option>';
      html += '<option value="2">2</option>';
      html += '<option value="3">3</option>';
      html += '<option value="4">4</option>';
      html += '<option value="5">5</option>';
      html += '<option value="6">6</option>';
      html += '<option value="7">7</option>';
      html += '<option value="8">8</option>';
      html += '<option value="9">9</option>';
      html += '<option value="10">10</option>';
      html += '<option value="11">11</option>';
      html += '</select>';
      html += '</div>';
      html += '</div>';
      html += '<div class="search-field has-select-child-box child-age-2" id="child_2_age_id_' + length1 + '">';
      html += '<div class="dropdown select-chiild_2_age">';
      html += '<label for="" class="search-label text-bold-600">Child 2 Age</label>';
      html += '<select class="form-control" id="chiild_2_age" name="rooms[' + length1 + '][chiild_2_age]">';
      html += '<option value="1">1</option>';
      html += '<option value="2">2</option>';
      html += '<option value="3">3</option>';
      html += '<option value="4">4</option>';
      html += '<option value="5">5</option>';
      html += '<option value="6">6</option>';
      html += '<option value="7">7</option>';
      html += '<option value="8">8</option>';
      html += '<option value="9">9</option>';
      html += '<option value="10">10</option>';
      html += '<option value="11">11</option>';
      html += '</select>';
      html += '</div>';
      html += '</div>';
      html += '<div class="search-field">';
      html += '<div class="dropdown select-infant">';
      html += '<label for="" class="search-label text-bold-600">Infant</label>';
      html += '<select class="form-control" id="infant" name="rooms[' + length1 + '][infant]">';
      html += '<option value="0">0</option>';
      html += '<option value="1">1</option>';
      html += '<option value="2">2</option>';
      html += '</select>';
      html += '</div>';
      html += '</div>';
      html += '</div>';
      html += '</div>';

      if (length < 8) {
        $('.new-room-goes-here').append(html);
        html = "";
      }
    });

    ////////////
    $(document).on('change', '.children', function () {
      var length = $('.new-room-goes-here .search-feild-wrapper').length;
      var value = $(this).find(':selected').val();
      switch (value) {
        case '0':
          $(this).parents('.search-feild-wrapper').find('.child-age-1').hide();
          $(this).parents('.search-feild-wrapper').find('.child-age-2').hide();
          break;
        case '1':
          $(this).parents('.search-feild-wrapper').find('.child-age-1').show();
          $(this).parents('.search-feild-wrapper').find('.child-age-2').hide();
          break;
        case '2':
          $(this).parents('.search-feild-wrapper').find('.child-age-1').show();
          $(this).parents('.search-feild-wrapper').find('.child-age-2').show();
          break;
        default:
          alert("ERROR")
          break;
      }
    })

    ////// remove
    $(document).on('click', '.remove-search-feild-btn', function () {
      $(this).parent().remove();
    });
    ///////
    // active tabe pane
    $('.search-box .nav-link').click(function () {
      $('.search-box .tab-pane').removeClass('active');
      $('.search-box .tab-pane').removeClass('show');
      $('.search-box .tab-pane').addClass('fade');
      var href = $(this).attr('href');
      $('.search-box').find('#' + href).addClass('active');
      $('.search-box').find('#' + href).addClass('show');
      $('.search-box .tab-pane').removeClass('fade');
    })

  </script>
@endsection
