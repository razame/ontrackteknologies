@extends('layouts/contentLayoutMaster')

@section('title', 'Book')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/swiper.min.css')) }}">
@endsection
@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/swiper.css')) }}">
@endsection
@section('content')
  <div class="content-body">

    @if(isset($hotels['errors']))
      @include('tools.session_expired')
    @else
      <div class="row">
        <div class="col-lg-8">
          <!-- START swiper-progress -->
          <div class="swiper-paginations swiper-container rounded hotel-slider">
            <div class="swiper-wrapper">

              @foreach($hotel_images as $image)
                <div class="swiper-slide">
                  <img class="img-fluid lozad" data-src="https://images.grnconnect.com/{{$image->image_url}}" alt="">
                </div>
              @endforeach
            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
          </div>
          <!-- END swiper-progress -->
        </div>

        <div class="col-lg-4">
          <div class="card hotel-details">
            <div class="card-body">

              <div class="stars">
                @for ($i = 1; $i <= $hotel['star_category']; $i++)
                  <i class="fa fa-star"></i>
                @endfor
              </div>
              <h3 class="hotel--details-title blue text-bold-600">
                {{$search_resp['hotel_name']}}
                <div class="hotel--details-bookmark nobookmark d-inline-block" data-toggle="tooltip"
                     data-original-title="bookmark">
                  <i class="fa fa-bookmark-o fa-fw"></i>
                </div>
              </h3>

              <div>{{$search_resp['hotel_address']}} </div>
              <hr/>
              <div class="media-header">
                <h5 class="blue text-bold-600">Check in</h5>
                <div>Check in starts at {{$hotels['checkin']}}</div>
                <h5 class="blue text-bold-600 mt-2">Check out</h5>
                <div>Check out starts at {{$hotels['checkout']}}</div>
              </div>
              <hr/>
              <div class="media-header">
                <div class="d-flex justify-content-between">
                  <div class="blue text-bold-600 ">Rooms</div>
                  <div>
                    <h6> {{$search_resp['no_of_rooms']}}</h6>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <div class="blue text-bold-600 ">No of nights</div>
                  <div>
                    <h6> {{$search_resp['no_of_nights']}}</h6>
                  </div>
                </div>

                <div class="d-flex justify-content-between">
                  <div class="blue text-bold-600 ">No of adults</div>
                  <div>
                    <h6> {{$search_resp['no_of_adults']}}</h6>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12 mt-2">
          <div class="card hotel-details">
            <div class="card-body">
              {{--              <div class="stars">--}}
              {{--                @for ($i = 1; $i <= $hotel['star_category']; $i++)--}}
              {{--                  <i class="fa fa-star"></i>--}}
              {{--                @endfor--}}
              {{--              </div>--}}
              {{--              <h3 class="hotel--details-title blue text-bold-600">--}}
              {{--                {{$search_resp['hotel_name']}}--}}
              {{--                <div class="hotel--details-bookmark nobookmark d-inline-block" data-toggle="tooltip"--}}
              {{--                     data-original-title="bookmark">--}}
              {{--                  <i class="fa fa-bookmark-o fa-fw"></i>--}}
              {{--                </div>--}}
              {{--              </h3>--}}

              {{--              <div>{{$search_resp['hotel_address']}} </div>--}}

              <h3 class="text-bold-600 orange pt-2 mt-4 mb-2">Rooms</h3>

              <!-- START form -->

              <!-- END form -->


              <div id="rooms_box">
                <section id="accordion-with-margin">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="card collapse-icon accordion-icon-rotate">
                        <div class="card-header">

                        </div>
                        <div class="card-body">
                          <p>

                          </p>
                          <div class="accordion" id="accordionExample">
                            @foreach($all_rooms as $room_type => $rooms)
                              @php
                                $time = rand(1,10000)
                              @endphp
                              <div class="collapse-margin">
                                <div class="card-header" id="headingOne" style="background-color: #ed427b"
                                     data-toggle="collapse" role="button" data-target="#accr_{{$time}}"
                                     aria-expanded="false" aria-controls="collapseOne">
                                    <span class="lead collapse-title" style="color: white">
                                     {{$room_type}}
                                    </span>
                                </div>

                                <div id="accr_{{$time}}" class="collapse" aria-labelledby="headingOne"
                                     data-parent="#accordionExample">
                                  <div class="card-body">
                                    @foreach($rooms as $hotel_rate)

                                      <div class='table-responsive mb-2'>
                                        <table class='table' style="background-color: rgba(34,41,47,.05)">
                                          <tbody>
                                          <tr>
                                            <td colspan='12'>
                                              <h4
                                                class='text-bold-600 blue table-header card-title d-flex w-100 justify-content-between'>{{$hotel_rate['rate']['rooms'][0]['description']}}</h4>
                                              <span>
                            @if(!$hotel_rate['rate']['non_refundable'])
                                                  <span style="color:green">Free Cancellation</span>
                                                @else

                                                  <div class="badge badge-danger mr-1 mb-1">
                                <i class="feather icon-instagram"></i>
                                <span>Non-Refundable</span>
                              </div>
                                                @endif
                                                </span>
                                            </td>
                                          </tr>

                                          <tr class='bg-blue text-bold-600'>
                                            <td>
                                              <div class='benefit-td'>Description</div>
                                            </td>
                                            <td>
                                              <div class='occupancy-td'>Occupancy</div>
                                            </td>
                                            <td>Price</td>
                                            <td></td>
                                          </tr>

                                          <tr>

                                            <td>
                                              @if(isset($hotel_rate['rate']['other_inclusions'] ))
                                                <b>Other Inclusions: </b><br/>
                                                @foreach($hotel_rate['rate']['other_inclusions'] as $other_inclusions)
                                                  <i class="fa fa-check fa-fw blue mr-1"></i>{{$other_inclusions}} <br/>
                                                @endforeach



                                                {{--                          @foreach($hotel_rate['rate']['rate_comments'] as $key =>$comment)--}}
                                                {{--                            @if(strlen($comment)> 2)--}}
                                                {{--                              <div>--}}
                                                {{--                                <i class='fa fa-check fa-fw blue'></i>--}}
                                                {{--                                <b>{{ucwords(str_replace("_"," ",$key))}}</b> : {!! $comment !!}--}}
                                                {{--                              </div>--}}
                                                {{--                            @endif--}}
                                                {{--                          @endforeach--}}
                                              @endif
                                              <b>Boarding Details: </b><br/>
                                              @foreach($hotel_rate['rate']['boarding_details'] as $boarding_detail)
                                                <i class="fa fa-check fa-fw blue mr-1"></i>{{$boarding_detail}} <br/>
                                              @endforeach
                                            </td>
                                            <td class='light-blue pl-3'>
                                              @for($i = 0;$i < $hotels['no_of_adults'];$i++)
                                                <svg data-v-4b8a6b86='' data-v-79ccd0d9=''
                                                     xmlns='http://www.w3.org/2000/svg' width='13'
                                                     height='28' viewBox='0 0 13 28' aria-labelledby='adult'
                                                     role='presentation'
                                                     class='icon-adult'><title data-v-4b8a6b86='' id='adult' lang='en'>
                                                    adult icon</title>
                                                  <g data-v-4b8a6b86='' id='adult' fill='currentColor'>
                                                    <path data-v-6394d18e='' data-v-79ccd0d9='' fill-rule='evenodd'
                                                          clip-rule='evenodd'
                                                          d='M10.0184 3.55521C10.0184 5.51869 8.42666 7.11041 6.46318 7.11041C4.49969 7.11041 2.90797 5.51869 2.90797 3.55521C2.90797 1.59172 4.49969 0 6.46318 0C8.42666 0 10.0184 1.59172 10.0184 3.55521ZM4.09658 26.1086L2.00741 17.2394C1.11245 17.0863 0.414232 16.3374 0.351226 15.4027L0.00462052 10.2607C-0.0732277 9.10581 0.84258 8.12619 2.00009 8.12619H3.64951H9.32118H10.9264C12.0839 8.12619 12.9998 9.10581 12.9219 10.2607L12.5753 15.4027C12.5134 16.3212 11.838 17.0603 10.9653 17.231L8.8741 26.1086C8.61304 27.2168 7.62396 28 6.48534 28C5.34673 28 4.35765 27.2168 4.09658 26.1086Z'
                                                          data-v-4b8a6b86=''></path>
                                                  </g>
                                                </svg>
                                              @endfor

                                              @if(isset($hotels['no_of_children']))
                                                @for($i = 0;$i < $hotels['no_of_children'];$i++)
                                                  <svg data-v-4b8a6b86='' data-v-79ccd0d9=''
                                                       xmlns='http://www.w3.org/2000/svg' width='13'
                                                       height='28' viewBox='0 0 13 12' aria-labelledby='adult'
                                                       role='presentation'
                                                       class='icon-adult'><title data-v-4b8a6b86='' id='adult'
                                                                                 lang='en'>adult icon</title>
                                                    <g data-v-4b8a6b86='' id='adult' fill='currentColor'>
                                                      <path data-v-6394d18e='' data-v-79ccd0d9='' fill-rule='evenodd'
                                                            clip-rule='evenodd'
                                                            d='M10.0184 3.55521C10.0184 5.51869 8.42666 7.11041 6.46318 7.11041C4.49969 7.11041 2.90797 5.51869 2.90797 3.55521C2.90797 1.59172 4.49969 0 6.46318 0C8.42666 0 10.0184 1.59172 10.0184 3.55521ZM4.09658 26.1086L2.00741 17.2394C1.11245 17.0863 0.414232 16.3374 0.351226 15.4027L0.00462052 10.2607C-0.0732277 9.10581 0.84258 8.12619 2.00009 8.12619H3.64951H9.32118H10.9264C12.0839 8.12619 12.9998 9.10581 12.9219 10.2607L12.5753 15.4027C12.5134 16.3212 11.838 17.0603 10.9653 17.231L8.8741 26.1086C8.61304 27.2168 7.62396 28 6.48534 28C5.34673 28 4.35765 27.2168 4.09658 26.1086Z'
                                                            data-v-4b8a6b86=''></path>
                                                    </g>
                                                  </svg>
                                                @endfor
                                              @endif
                                            </td>
                                            <td>
                                              <span></span>
                                              <h3
                                                class='blue text-bold-600 d-inline-block'>{{$hotel_rate['rate']['price']}}
                                                USD</h3>
                                            </td>
                                            <td>

                                              <button type="button"
                                                      class="btn table-book-button modal_button_show_booking_info"
                                                      data-hotelcode="{{$hotels['hotel']['hotel_code']}}"
                                                      data-roomcode="{{$hotel_rate['rate']['room_code']}}"
                                                      data-rate_key="{{$hotel_rate['rate']['rate_key']}}"
                                                      data-group_code="{{$hotel_rate['rate']['group_code']}}"
                                                      data-reservation_search_log_id="{{$reservation_search_log_id}}"
                                                      data-room_name="{{$hotel_rate['rate']['rooms'][0]['description']}}"
                                                      data-selectedroomid="{{$hotel_rate['_id']}}"
                                                      data-searchid="{{$hotel_rate['search_id']}}" id="">
                                                Book Room
                                              </button>

                                            </td>
                                          </tr>


                                          @if(!$hotel_rate['rate']['non_refundable'])
                                            <tr>
                                              <td colspan="5">
                                                <div class="badge badge-success mr-1 mb-1">
                                                  <i class="feather icon-instagram"></i>
                                                  <span>Free Cancellation</span>
                                                </div>
                                                @php
                                                  $rand = rand(0,1000)
                                                @endphp
                                                <div class="badge badge-warning mr-1 mb-1"
                                                     id="button_{{$hotel_rate['rate']['room_code']}}_{{$rand}}"
                                                     style="cursor: hand">
                                                  <i class="feather icon-x-square"></i>
                                                  <span> Cancellation Policy</span>
                                                </div>
                                              </td>
                                            </tr>
                                            @php
                                              $toggles_array[] =  $hotel_rate['rate']['room_code'].'_'.$rand
                                            @endphp
                                            <table class='table' id="{{$hotel_rate['rate']['room_code']}}_{{$rand}}">
                                              <tr>
                                                <td>From Date</td>
                                                <td>To Date</td>
                                                <td>Charge Amount</td>
                                              </tr>

                                              @if(isset($hotel_rate['rate']['cancellation_policy']['cancel_by_date']))
                                                <tr>
                                                  <td>Before or Upto</td>
                                                  <td>{{$hotel_rate['rate']['cancellation_policy']['cancel_by_date']}}</td>
                                                  <td>No Charges</td>
                                                </tr>
                                              @endif
                                              @foreach($hotel_rate['rate']['cancellation_policy']['details'] as $detail)
                                                <tr>
                                                  <td>{{$detail['from']}}</td>
                                                  <td>or later</td>

                                                  <td>
                                                    @if($hotel_rate['rate']['cancellation_policy']['amount_type'] == 'nights')
                                                      Cost of {{$detail['nights']}} Night(s)
                                                    @endif
                                                    @if($hotel_rate['rate']['cancellation_policy']['amount_type'] == 'percent')
                                                      {{$detail['percent']}} percent
                                                    @endif
                                                    @if($hotel_rate['rate']['cancellation_policy']['amount_type'] == 'value')
                                                      {{$detail['flat_fee']}} {{$detail['currency']}}
                                                    @endif

                                                  </td>
                                                </tr>
                                              @endforeach
                                            </table>
                                          @endif

                                          </tbody>
                                        </table>
                                      </div>
                                    @endforeach
                                  </div>
                                </div>
                              </div>
                            @endforeach
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>

              </div>
              <h3 class="text-bold-600 orange pt-2 mt-4 mb-2 border-top">Hotel Info</h3>
              <div class="media">
                <div class="media-header">
                  <h5 class="blue text-bold-600">Amenities</h5>
                  @if(isset($hotels['hotel']['facilities']))
                    @php
                      $facilities = explode(';',$hotels['hotel']['facilities'])
                    @endphp
                    @foreach($facilities as $value)
                      @if($value)
                        <div><i class="fa fa-check fa-fw blue mr-1"></i>{{ucwords($value)}}</div>
                      @endif
                    @endforeach
                  @endif
                </div>
                <div class="media-body">

                  {!!$hotel['description']!!}
                </div>
              </div>

              <h3 class="text-bold-600 orange pt-2 mt-4 mb-2 border-top">Policies</h3>
              <div class="media">
                <div class="media-header">
                  <h5 class="blue text-bold-600">Check in</h5>
                  <div>Check in starts at {{$hotels['checkin']}}</div>
                  <h5 class="blue text-bold-600 mt-2">Check out</h5>
                  <div>Check out starts at {{$hotels['checkout']}}</div>
                </div>
                <div class="media-body">
                  <h5 class="blue text-bold-600">Policy</h5>


                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
    @endif
  </div>
  <div class="modal fade text-left" id="booking_info" tabindex="-1" role="dialog"
       aria-labelledby="myModalLabel130" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-info white">
          <h5 class="modal-title" id="modal_booking_detail_title">Book Room</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal_booking_detail_content">

        </div>
        <div class="modal-footer">
          <span id="modal_non_refundable"></span>
          <a href="" class="btn btn-info" id="modal_booking_detail_link">Proceed</a>
        </div>
      </div>
    </div>
  </div>

  </div>


@endsection
@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/wNumb.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>

  <script src="{{ asset(mix('vendors/js/pagination/jquery.bootpag.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/pagination/jquery.twbsPagination.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/swiper.min.js')) }}"></script>
@endsection
@section('page-script')
  <script src="https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js"></script>
  <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/modal/components-modal.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/pagination/pagination.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/noui-slider.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/swiper.js')) }}"></script>


  <script>
    $(document).ready(function () {
      @if(isset($toggles_array) AND count($toggles_array) > 0)
      @foreach($toggles_array as $toggle)
      $("#{{$toggle}}").toggle();
      $("#button_{{$toggle}}").click(function () {
        $("#{{$toggle}}").toggle();
      });
      @endforeach
      @endif
      @if(isset($searchID))
      $(".modal_button_show_booking_info").click(function () {
        $(this).html("<span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>\n" +
          "Loading...")

        var room_code = $(this).data('roomcode')
        var hotel_code = $(this).data('hotelcode')
        var selected_room_id = $(this).data('selectedroomid')
        var search_id = $(this).data('searchid')
        var rate_key = $(this).data('rate_key')
        var group_code = $(this).data('group_code')
        var room_name = $(this).data('room_name')
        var reservation_search_log_id = $(this).data('reservation_search_log_id')

        $.ajax
        ({
          url: "/gnr/rate-recheck/" + search_id + "/" + rate_key + "/" + group_code + "/" + reservation_search_log_id,
          data: {"_token": "{{ csrf_token() }}"},
          type: 'post',
          success: function (result, textStatus, xhr) {
            if (result.errors === undefined) {
              var rate_comments = ''

              $.each(result.hotel.rate.rate_comments, function (k, v) {
                rate_comments = rate_comments + '<br/><b>' + k + "</b> : " + v;
              });

              $('#modal_booking_detail_content').html('');
              $('#modal_booking_detail_content').append(rate_comments);
              $('#modal_booking_detail_link').attr("href", "/B2B-hotel/book/details/{{$searchID}}/" + search_id + "" +
                "?hotel_code=" + hotel_code + "&room_code=" + room_code + "&selected_room_id=" + selected_room_id)
              if (result.hotel.rate.non_refundable) {
                $('#modal_non_refundable').html("<span style='color: red'><b>Non Refundable</b></span>");
              } else {
                $('#modal_non_refundable').html("<span style='color: green'><b>Free Cancellation</b></span>");
              }
              $('#modal_booking_detail_title').html(room_name);
              $('#booking_info').modal('show')
              $(".modal_button_show_booking_info").html("Book Room")
            } else {
              console.log(result.errors.messages[0])
            }
          },
          error: function (error) {
            alert('Sorry , please try again')
            $(".modal_button_show_booking_info").html("Book Room")
          }
        });


      });
      @endif
    });


    const observer = lozad();
    observer.observe();
  </script>

@endsection

