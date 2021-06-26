@extends('layouts/contentLayoutMaster')


@section('title', 'Hotel Availability')

@section('vendor-style')

  <!-- vendor css files -->

  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">

@endsection

@section('page-style')

  <!-- Page css files -->

  <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">

  <link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">

@endsection

@section('content')

  <div class="content-wrapper">

    <div class="content-body">

      <div class="row">

        <div class="col-xl-12">

          <div class="card mb-0">

            <!-- START .inner-back -->

            <div class="inner-back">

              <!-- START .inner-bar -->

              <div class="card-body inner-bar">

                <!-- START .inner-bar-item -->

                <div class="inner-bar-item update-search">

                  <i class="fa fa-search fa-fw bar-search-icon orange"></i>

                  <div class="ml-1 text-ellipsis">

                    <div class="text-bold-600 font-1rem">{{$location_details}}</div>

                    <div>

                      <span class="search-detail mr-1">
                        {{@date('d-M', strtotime($base_search_result['checkin']))}} - {{@date('d-M', strtotime($base_search_result['checkout']))}}
                      </span>

                      <span class="search-detail mr-1">
                        {{@$base_search_result['no_of_adults']}} adults, @if(isset($base_search_result[0]['no_of_children'])) {{$base_search_result['no_of_children']}}
                        children, @endif {{@$base_search_result['no_of_rooms']}} rooms
                      </span>

                      <span class="search-detail mr-1"></span>

                    </div>

                  </div>

                </div>


                <!-- END .inner-bar-item -->


                <div class="divider-vertical sort-divider"></div>


                <!-- START .inner-bar-item -->

                <div class="dropdown inner-bar-item text-bold-600 filters-toggle">

                  <i class="feather icon-sliders fa-fw bar-filter-icon orange"></i>

                  <span class="font-1rem">Filters</span>

                </div>

                <!-- END .inner-bar-item -->

                <div class="divider-vertical"></div>


                <!-- START .inner-bar-item -->

                <div class="dropdown inner-bar-item sort-part">

                  <button class="btn" type="button" id="sortdropdown" data-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false">

                    <div class="text-bold-600 margin-bottom-5 font-1rem text-left">Sort by <i
                        class="fa fa-caret-down"></i></div>

                    <div class="sortby text-left">Popularity</div>

                  </button>

                  <div class="dropdown-menu sort-dropdown-menu" aria-labelledby="sortdropdown">
                    @if(count($request->query) == 0)
                      <a class="dropdown-item" href="{{url()->full()}}?sort_default=1">Popularity</a>

                      <a class="dropdown-item" href="{{url()->full()}}?sort=hotel_name,DESC">Hotel Name</a>

                      <a class="dropdown-item" href="{{url()->full()}}?sort=hotel_min_price,ASC">Price, lowest
                        first</a>

                      <a class="dropdown-item" href="{{url()->full()}}?sort=hotel_min_price,DESC">Price, highest
                        first</a>
                    @else
                      <a class="dropdown-item" href="{{url()->full()}}&sort_default=1">Popularity</a>

                      <a class="dropdown-item" href="{{url()->full()}}&sort=hotel_name,DESC">Hotel Name</a>

                      <a class="dropdown-item" href="{{url()->full()}}&sort=hotel_min_price,ASC">Price, lowest
                        first</a>

                      <a class="dropdown-item" href="{{url()->full()}}&sort=hotel_min_price,DESC">Price, highest
                        first</a>
                    @endif


                  </div>

                </div>

                <!-- END .inner-bar-item -->


                <div class="divider-vertical mr-auto white-space"></div>

                <div class="divider-vertical"></div>


                <!-- START .inner-bar-item -->

                <div class="dropdown inner-bar-item">

                  <button class="btn p-0" type="button" id="currency-dropdown" data-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">

                    <div class="text-bold-600 margin-bottom-5 text-left currency">

                      <span>USD</span>

                      <i class="fa fa-caret-down"></i>

                    </div>

                  </button>

                  <div class="dropdown-menu currency-dropdown-menu" aria-labelledby="currency-dropdown">

                    <a
                      href='#'
                      class="dropdown-item">USD</a>

                  </div>

                </div>

                <!-- END .inner-bar-item -->


                <div class="divider-vertical usd-divider"></div>


                <!-- END .inner-bar-item -->

              </div>

              <!-- START .inner-bar -->


              <!-- START .hotel-progress -->


              <!-- END .hotel-progress -->

            </div>

            <!-- END .inner-back -->

          </div>

        </div>


        <!-- START .app-filter -->

        <div class="app-filter">
          <form action="{{url()->full()}}" method="GET" id="filter_form">
            <div class="search-header">

              <h2 class="orange font-weight-bold">Filters</h2>

              <div class="close-filter"><i class="fa fa-times fa-fw"></i></div>

            </div>

            <div class="search-content p-2">

              <h5 class="font-weight-bold blue mt-2 mb-1">Total Price</h5>

              <fieldset>

                <div class="my-1 mb-2" id="slider-with-input"></div>

                <div class="d-flex justify-content-between">

                  <div class="mr-1">

                    <label>Min <span>(USD)</span></label>

                    <input class="form-control" value="{{$request->q_min_rate}}" name="q_min_rate" type="number"
                           min="{{$min_rate}}" max="{{$max_rate}}" step="50" id="min-input-number">

                  </div>

                  <div class="ml-1">

                    <label>Max <span>(USD)</span> </label>

                    <input class="form-control" value="{{$request->q_max_rate}}" name="q_max_rate" type="number"
                           min="{{$min_rate}}" max="{{$max_rate}}" step="50" id="max-input-number">

                  </div>

                </div>

              </fieldset>


              <h5 class="font-weight-bold blue mt-3 mb-2">Hotel name</h5>

              <input type="text" name="q_hotel_name" value="{{$request->q_hotel_name}}" class="form-control"
                     placeholder="e.g Hilton">


              <h5 class="font-weight-bold blue mt-3 mb-2">Location Address</h5>

              <input type="text" name="q_hotel_address" value="{{$request->q_hotel_address}}" class="form-control"
                     placeholder="e.g City Hall">


              <h5 class="font-weight-bold blue mt-3 mb-2">Star Categories</h5>

              <div class="row">

                <div class="col-lg-12">

                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input"
                           @if($request->q_star_categories_1) checked @endif id="1star" value="1"
                           name="q_star_categories_1">
                    <label class="custom-control-label" for="1star">
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                    </label>
                  </div>

                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input"
                           @if($request->q_star_categories_2) checked @endif  id="2star" value="2"
                           name="q_star_categories_2">
                    <label class="custom-control-label" for="2star">
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                    </label>
                  </div>

                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input"
                           @if($request->q_star_categories_3) checked @endif id="3star" value="3"
                           name="q_star_categories_3">
                    <label class="custom-control-label" for="3star">
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                    </label>
                  </div>

                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input"
                           @if($request->q_star_categories_4) checked @endif id="4star" value="4"
                           name="q_star_categories_4">
                    <label class="custom-control-label" for="4star">
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-muted"></i>
                    </label>
                  </div>

                  <div class="custom-control custom-checkbox mb-1">
                    <input type="checkbox" class="custom-control-input"
                           @if($request->q_star_categories_5) checked @endif id="5star" value="5"
                           name="q_star_categories_5">
                    <label class="custom-control-label" for="5star">
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                      <i class="fa fa-star fa-fw text-warning"></i>
                    </label>
                  </div>
                </div>
              </div>
              <h5 class="font-weight-bold blue mt-3 mb-2">Facilities</h5>
              <div class="row">
                @foreach($search_response_summary['facilities'] as $facility => $count)
                  <div class="col-lg-12">
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="{{$facility}}"
                             name="facilities[{{$facility}}]" value="{{$facility}}">
                      <label class="custom-control-label" for="{{$facility}}">
                        {{trim($facility)}} ({{$count}})
                      </label>
                    </div>

                  </div>
                @endforeach
              </div>
            </div>

            <div class="search-footer">

              <button class="btn btn-clear-filter" type="reset">CLEAR</button>

              <button class="btn btn-apply-filter" onclick="document.getElementById('filter_form').submit();"
                      type="submit">APPLY FILTER
              </button>

            </div>
          </form>
        </div>

        <!-- END .app-filter -->


        <!-- START .app-search -->

        <div class="app-search">

          <div class="search-header">

            <h2 class="orange font-weight-bold">Update Search</h2>

            <div class="close-filter"><i class="fa fa-times fa-fw"></i></div>

          </div>

          <div class="search-content p-2">

            <div class="col-lg-12 mt-1">

              <form action="">

                <div class="row pr-1 pl-1">

                  <div class="col-lg-12 search-field mb-2">

                    <div class="form-group mb-0 mb-0 mb-0 mb-0 mb-0 mb-0 mb-0">

                      <label for="" class="text-bold-600">City or hotel</label>

                      <select name="" class="select2-hotel select2 form-control"></select>

                    </div>

                  </div>

                  <div class="col-lg-12 search-field mb-2">

                    <div class="form-group t-datepicker flight-datepicker mb-0">

                      <i class="feather icon-x remove-checkout"></i>

                      <div><label class="text-bold-600">check in - check out</label></div>

                      <div class="t-check-in"></div>

                      <div class="t-check-out"></div>

                    </div>

                  </div>

                  <div class="col-lg-12 search-field mb-2">

                    <div class="dropdown count-box">

                      <label for="" class="text-bold-600">Occupancy</label>

                      <button class="btn btn-block dropdown-toggle bg-white text-left" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <i class="feather icon-user"></i>

                        <span class="hotel-adult">1</span> adults, <span class="hotel-children">2</span> children, <span
                          class="hotel-rooms">3</span> rooms

                      </button>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item adults-box">

                          <ul class="list-unstyled list-inline">

                            <li class="list-inline-item text-bold-600">Adults</li>

                            <li class="list-inline-item">

                              <div class="input-group input-group-sm">

                                <input type="number" class="touchspin" value="1">

                              </div>

                            </li>

                          </ul>

                        </a>


                        <a class="dropdown-item rooms-box">

                          <ul class="list-unstyled list-inline">

                            <li class="list-inline-item text-bold-600">rooms</li>

                            <li class="list-inline-item">

                              <div class="input-group input-group-sm">

                                <input type="number" class="touchspin" value="1">

                              </div>

                            </li>

                          </ul>

                        </a>


                        <a class="dropdown-item children-box">

                          <ul class="list-unstyled list-inline">

                            <li class="list-inline-item text-bold-600">children</li>

                            <li class="list-inline-item">

                              <div class="input-group input-group-sm">

                                <input type="number" class="touchspin" value="1">

                              </div>

                            </li>

                          </ul>

                        </a>


                        <div class="children-age"></div>

                      </div>

                    </div>

                  </div>

                  <div class="col-lg-12 search-field mb-2">

                    <div class="dropdown select-nationality">

                      <label for="" class="text-bold-600">Nationality</label>


                    </div>

                  </div>

                  <div class="col-lg-12 search-field mb-2">

                    <div class="dropdown select-currency">

                      <label for="" class="text-bold-600">Currency</label>

                      <button class="btn btn-block dropdown-toggle bg-white text-left" type="button"
                              id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <span>USD</span>

                      </button>

                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item">CNY</a>

                        <a class="dropdown-item">CAD</a>

                        <a class="dropdown-item">EUR</a>

                      </div>

                    </div>

                  </div>

                  <div class="col-lg-12 text-right">

                    <button type="submit" class="btn btn-apply-filter">SEARCH</button>

                  </div>

                </div>

              </form>

            </div>

          </div>

        </div>

        <!-- END .app-search -->


        <div class="col-lg-12 position-relative hotels-search">

          <div class="row">

            <!-- START .col-xl-12 -->

            <div class="hotels-section col-xl-12">

              <div class="card">

                <div class="card-body">

                  <div class="blue text-bold-600 mb-2" id="search_count">


                  </div>

                  <!---->

                  @if(count($search_result) == 0 )

                    <div class="alert alert-warning mb-3" id="error_message">

                      Sorry, no results were found

                    </div>

                  @endif

                  <div class="row position-relative" id="hotel_boxes">

                    @foreach($search_result as $search)

                      <div class='hotel-col col-lg-6 col-md-6 col-sm-6' id=''>

                        <div class='hotel--box'>

                          <div class='row'>

                            <div class='col-lg-5'>
                              <div class="position-relative">
                                <div class='bookmark-icon nobookmark' data-toggle='tooltip'
                                     data-original-title='bookmark'>
                                  <i class='fa fa-bookmark-o fa-fw'></i>
                                </div>
                              </div>
                              <div class='hotel--img position-relative hotel-image-parent'>
                                <div class="hotel-image-inner">
                                  <a
                                    href="/B2B-hotel/show-hotel/{{$search['hotel_code']}}/{{$search['search_id']}}/{{$search['_id']}}"><img
                                      src="{{$search['hotel_images']['url']}}" class='img-fluid'></a>
                                </div>
                              </div>
                            </div>

                            <div class='col-lg-7 pl-xl-0 pl-lg-0'>

                              <div class='hotel--content'>

                                <div class='stars'>

                                  @for($i=1 ; $i <= $search['hotel_category']; $i++)

                                    <i class='fa fa-star'></i>

                                  @endfor

                                </div>

                                <div class='hotel--box-title'>

                                  <a
                                    href="/B2B-hotel/show-hotel/{{$search['hotel_code']}}/{{$search['search_id']}}/{{$search['_id']}}"

                                    class='blue text-bold-600'>{{$search['hotel_name']}}</a>

                                </div>

                                <!-- <div class='column review'>

                                <div class='review-box'>

                                    <div class='review-value'>78</div>

                                    <div class='review-badge'>

                                        <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 66 24' class='review-bage-item'>

                                            <g>

                                            <path fill='#119A11' d='M46.992 0v24l5.7-4.97h13.295V0'></path>

                                            <path fill='#FFA726' d='M23.496 0v24l5.678-4.97h13.25V0'></path>

                                            <path fill='#F06748' d='M0 0v24l5.703-4.97h13.305V0'></path>

                                        </g>

                                        </svg>

                                    </div>

                                    <div class='review-wrapper'>

                                        <span class='review-score neg-score'>Excellent</span>

                                    </div>

                                    <div class='review-counter'>32 Reviews </div>

                                </div>

                                </div> -->


                                <div class="hotel-address"><small>{{$search['hotel_address']}}</small></div>

                                <div class='hotel--box-column'>
                                  <h3 class='blue font-weight-bold hotel-price'>
                                    From {{$search['hotel_min_rate']['price']}} {{$search['hotel_min_rate']['currency']}}</h3>

                                  <div class='border-right text-center column-item'>
                                    @if(isset($search['hotel_min_rate']['other_inclusions']))
                                      <div class='text-gray suggest-retail'><small class='font-weight-bold'>Other
                                          Inclusions</small></div>

                                      <div class='text-bold-600'>

                                        {{implode(',',$search['hotel_min_rate']['other_inclusions'])}}

                                      </div>
                                    @endif
                                  </div>

                                  <div class='column-item'>

                                    <div class="avg-box text-center"><a
                                        href="/B2B-hotel/show-hotel/{{$search['hotel_code']}}/{{$search['search_id']}}/{{$search['_id']}}"
                                        class="btn btn-warning hotel-box-book-btn font-weight-bold">Show Rooms</a></div>

                                  </div>

                                </div>

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    @endforeach

                  </div>

                  {{$search_result->appends(request()->input())->links()}}

                </div>

              </div>

            </div>

            <!-- END .col-lg-6 -->


            <!-- START .col-lg-6 -->

            <div class="col-xl-6 col-lg-4 col-md-12 map-fix">

              <div class="p-0 card-body">

                <div class="hotel-map" id="map"></div>

              </div>

            </div>

            <!-- END .col-lg-6 -->

          </div>

        </div>

        <div>

        </div>

      </div>

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





    @endsection

    @section('page-script')

      <!-- Page js files -->

        <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>

        <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>

        <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>

        <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>

        <script src="{{ asset(mix('js/scripts/pagination/pagination.js')) }}"></script>

        <script src="{{ asset(mix('js/scripts/extensions/noui-slider.js')) }}"></script>


        <script
          src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCehWH5-GsSNsBIzuRakdrg_ScBZaLUPWM&libraries=places"></script>

        <script>


          var map = new google.maps.Map(document.getElementById('map'), {

            zoom: 10,

            center: new google.maps.LatLng(-33.890542, 151.274856),

            mapTypeId: google.maps.MapTypeId.ROADMAP

          });


          var infowindow = new google.maps.InfoWindow();


          var marker;


          marker = new google.maps.Marker({

            position: new google.maps.LatLng(-33.890542, 151.274856),

            map: map,

            // icon: '../../../app-assets/images/img/hotel-icon.png'

          })

          infowindow.setContent('<span class="blue map-location">USD119</span>');

          infowindow.open(map, marker);


          ////////////// NO UI Slider


          var sliderWithInput = document.getElementById('slider-with-input');


          noUiSlider.create(sliderWithInput, {

            start: [{{$min_rate}}, {{$max_rate}}],

            direction: 'ltr',

            connect: true,

            range: {

              'min': {{$min_rate}},

              'max': {{$max_rate}}

            }

          });


          var maxinputNumber = document.getElementById('max-input-number');

          var mininputNumber = document.getElementById('min-input-number');


          sliderWithInput.noUiSlider.on('update', function (values, handle) {


            var value = values[handle];


            if (handle) {

              maxinputNumber.value = value;

            } else {

              mininputNumber.value = value;

            }

          });


          maxinputNumber.addEventListener('change', function () {

            sliderWithInput.noUiSlider.set([null, this.value]);

          });


          mininputNumber.addEventListener('change', function () {

            sliderWithInput.noUiSlider.set([this.value, null]);

          });


        </script>

@endsection

