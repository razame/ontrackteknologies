@extends('layouts.b2c',['internal'=>true])

@section('title', 'List')
@section('header')
  @include('B2C.includes.internal_header')
@endsection

@section('content')
  @if(isset($hotels['errors']))
    @include('B2C.includes.session_expired')
  @else
    <div class="container-fluid mt-3">
      <div class="row">
        <div class="col-lg-9 mb-3">
          <div class="hotel-pictures pb-2">
            <div class="hotel-box-title p-3">
              <h1 class="text-dark"> {{$search_resp['hotel_name']}}</h1>
              <div class="hotel-box-actions">
                <ul class="list-unstyled list-inline m-0">
                  <li class="list-inline-item">
                    <div class="tooltipx"><i class="fa fa-wifi fa-fw red-icon"></i>
                      <span class="tooltiptext">Tooltip text</span>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="tooltipx"><i class="fa fa-map-marker-alt fa-fw red-icon"></i>
                      <span class="tooltiptext">Tooltip text</span>
                    </div>
                  </li>
                  <li class="list-inline-item">
                    <div class="tooltipx"><i class="fa fa-directions fa-fw red-icon"></i>
                      <span class="tooltiptext">Tooltip text</span>
                    </div>
                  </li>
                  <li class="list-inline-item share">
                    <div class="tooltipx"><i class="fa fa-share-alt fa-fw red-icon"></i>
                      <span class="tooltiptext">Tooltip text</span>
                    </div>
                  </li>
                  <div class="share-box">
                    <ul class="list-unistyled pr-0 mb-0">
                      <li class="list-inline-item close-share"><i class="fa fa-times fa-fw blue "></i></li>
                      <li class="list-inline-item link-icon "><i class="fa fa-link fa-fw "></i></li>
                      <li class="list-inline-item telegram-icon "><i class="fab fa-telegram-plane fa-fw "></i></li>
                      <li class="list-inline-item twitter-icon "><i class="fab fa-twitter fa-fw "></i></li>
                      <li class="list-inline-item facebook-icon "><i class="fab fa-facebook-f fa-fw "></i></li>
                      <li class="list-inline-item wiki-icon "><i class="fab fa-wikipedia-w fa-fw "></i></li>
                    </ul>
                  </div>
                </ul>
                <div class="text-right stars">
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-warning"></i>
                  <i class="fa fa-star text-muted"></i>
                </div>
              </div>
              <div class="text-muted hotel-location mt-2">
                <i class="fa fa-map-marker-alt fa-fw text-warning"></i> {{$search_resp['hotel_address']}}
              </div>
            </div>

            <div class="hotel-slider">
              <div class="swiper-container gallery-top position-relative">
                <div class="swiper-wrapper">
                  @foreach($hotel_images['images']['regular'] as $image)
                    <div class="swiper-slide">
                      <img src="{{$image['url']}}" alt="">
                    </div>
                  @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next swiper-button-white"></div>
                <div class="swiper-button-prev swiper-button-white"></div>
              </div>
              <div class="swiper-container gallery-thumbs">
                <div class="swiper-wrapper">
                  @foreach($hotel_images['images']['regular'] as $image)
                    <div class="swiper-slide">
                      <img src="{{$image['url']}}" class="img-fluid" style="height: 170px" alt="">
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          <!---->
          <div class="select-room p-2">
            <h2 class="p-3">Select your room</h2>
            <div class="table-responsive rooms-table">
              <table class="table">
                @php
                  $counter = 0
                @endphp

                @foreach($hotel_rates as $hotel_rate)

                  @if($loop->odd)
                    <tr>
                      @endif
                      <td>
                        <div class="table-td">
                          <img src="/b2c/images/hotel1.jpg" class="img-fluid rounded" alt="">
                        </div>
                      </td>
                      <td>
                        <div class="table-td">
                          <div class="rooms-col-row">
                            <h6>{{$hotel_rate['rate']['rooms'][0]['description']}}</h6>
                          </div>
                          @if(!$hotel_rate['rate']['non_refundable'])
                            <div class="rooms-col-row">
                              <span style="color:green">Free Cancellation</span>
                            </div>
                          @else
                            <div class="rooms-col-row">
                              <i class="feather icon-instagram"></i>
                              <span>Non-Refundable</span>
                            </div>
                          @endif
                          @foreach($hotel_rate['rate']['boarding_details'] as $boarding_detail)
                            <div class="rooms-col-row">{{$boarding_detail}}</div>
                          @endforeach
                          @php
                            $toggles_array[] =  $hotel_rate['rate']['room_code']
                          @endphp
                        <!-- Modal -->
                          @if(!$hotel_rate['rate']['non_refundable'])
                            <div class="rooms-col-row"><a class="cancel-policy" data-toggle="modal"
                                                          data-target="#modal-cancellation-policy_{{$hotel_rate['rate']['room_code']}}">
                                Cancellation Policy</a>
                            </div>
                            <div class="modal" id="modal-cancellation-policy_{{$hotel_rate['rate']['room_code']}}">
                              <div class="modal-dialog">
                                <div class="modal-content border-0">

                                  <!-- Modal Header -->
                                  <div class="modal-header border-0">
                                    <button type="button" class="close" data-dismiss="modal"><i
                                        class="fa fa-times fa-fw"></i></button>
                                  </div>

                                  <!-- Modal body -->
                                  <div class="modal-body text-center ">
                                    <table class="table table-striped" id="{{$hotel_rate['rate']['room_code']}}">
                                      <thead>
                                      <tr>
                                        <th scope="col">From Date</th>
                                        <th scope="col">To Date</th>
                                        <th scope="col">Charge Amount</th>
                                      </tr>
                                      </thead>

                                      @if(isset($hotel_rate['rate']['cancellation_policy']) AND isset($hotel_rate['rate']['cancellation_policy']['cancel_by_date']))
                                        <tr>
                                          <td>Before or Upto</td>
                                          <td>{{$hotel_rate['rate']['cancellation_policy']['cancel_by_date']}}</td>
                                          <td>No Charges</td>
                                        </tr>
                                      @endif
                                      @if(isset($hotel_rate['rate']['cancellation_policy']))
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
                                      @endif
                                    </table>
                                  </div>
                                </div>
                              </div>
                            </div>

                        @endif
                        <!-- Modal -->

                          <button type="button" class="btn book-hotel-btn btn-block modal_button_show_booking_info"
                                  data-hotelcode="{{$hotels['hotel']['hotel_code']}}"
                                  data-roomcode="{{$hotel_rate['rate']['room_code']}}"
                                  data-rate_key="{{$hotel_rate['rate']['rate_key']}}"
                                  data-group_code="{{$hotel_rate['rate']['group_code']}}"
                                  data-reservation_search_log_id="{{$reservation_search_log_id}}"
                                  data-room_name="{{$hotel_rate['rate']['rooms'][0]['description']}}"
                                  data-selectedroomid="{{$hotel_rate['_id']}}"
                                  data-searchid="{{$hotel_rate['search_id']}}" id="">
                            <div>Book now</div>
                            <div>{{$hotel_rate['rate']['price']}} USD</div>
                          </button>

                        </div>
                      </td>
                      @if($loop->even)
                    </tr>
                  @endif
                @endforeach

              </table>
            </div>
          </div>
          <!---->
          <div class="hotel-information p-3 mt-3 text-justify">
            {!! $search_resp['hotel_description'] !!}
            <br>
            <h6 class="mb-1 mt-4">Services & facilities</h6>
            <div class="row">
              @php
                $hotel_facilities = explode(";",$search_resp['hotel_facilities'])
              @endphp
              @foreach($hotel_facilities as $hotel_facility)
                <div class="col-lg-4 col-md-4 col-sm-6"><i class="fa fa-circle fa-fw"></i> {{$hotel_facility}}</div>
              @endforeach
            </div>
          </div>

          <div class="mt-3 rounded" id="map" style="width: 100%; height: 400px;"></div>
        </div>

        <div class="col-lg-3 advertise-box">
          <div>
            <img src="/b2c/images/advertise2.png" alt="">

            <img src="/b2c/images/advertise2.png" alt="">
          </div>
        </div>
      </div>
    </div>
  @endif

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
          <a href="" class="btn btn-info" id="modal_booking_detail_link">Proceed</a>
        </div>
      </div>
    </div>
  </div>

@endsection

@section("page-script")
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
            var rate_comments = ''

            $.each(result.hotel.rate.rate_comments, function (k, v) {
              rate_comments = rate_comments + '<br/><b>' + k + "</b> : " + v + "<br/>";
            });

            $('#modal_booking_detail_content').html(rate_comments);
            $('#modal_booking_detail_link').attr("href", "/hotel-reservation/book/details/{{$searchID}}/" + search_id + "" +
              "?hotel_code=" + hotel_code + "&room_code=" + room_code + "&selected_room_id=" + selected_room_id)

            $('#modal_booking_detail_title').html(room_name);
            $('#booking_info').modal('show')
            $(".modal_button_show_booking_info").html("Book Room")
          },
          error: function (error) {
            alert('Sorry , please try again')
            $(".modal_button_show_booking_info").html("Book Room")
          }
        });


      });
      @endif
    });
  </script>
@endsection
