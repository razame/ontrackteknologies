@extends('layouts/contentLayoutMaster')

@section('title', 'Add paxes information')
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
          <form action="{{route('HotelBookingPaymentOption')}}" method="post">
            @csrf

            <h4 class="card-header text-bold-600">Payment</h4>
            <div class="card-body">
              <!-- <div class="alert alert-info">
                                <i class="feather icon-clock fa-fw"></i>
                                Your order is reserved for 00:14:11
                            </div> -->


              @for ($i = 1; $i <= $refetch_availability['no_of_rooms']; $i++)
                <div class="alert alert-blue mb-3">
                  ROOM {{$i}}
                </div>
                @for ($a = 1; $a <= $reservation_selected_room['rate']['rooms'][$i-1]['no_of_adults']; $a++)
                  <div class="alert alert-info">
                    <i class="feather icon-clock fa-fw"></i>
                    @if($a == 1 AND $i ==1) Adult (Holder) @else Adult @endif
                  </div>

                  @if($a == 1 AND $i == 1)
                    <div class="row">
                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="title"><sup class="required">*</sup> Title</label>
                        <select name="rooms[{{$i-1}}][paxes][{{$a-1}}][title]" id="title" class="select2 form-control">
                          <option value="Mr.">Mr.</option>
                          <option value="Ms.">Ms.</option>
                          <option value="Mrs.">Mrs.</option>
                          <option value="Mstr.">Mstr.</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="first_name"><sup class="required">*</sup> First Name</label>
                        <input type="text" name="rooms[{{$i-1}}][paxes][{{$a-1}}][name]" id="name" required
                               class="form-control" placeholder="E.g Alice">
                      </div>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="last_name"><sup class="required">*</sup> Last Name</label>
                        <input type="text" name="rooms[{{$i-1}}][paxes][{{$a-1}}][surname]" id="surname" required
                               class="form-control" placeholder="E.g Wong">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="last_name"><sup class="required">*</sup> Email</label>
                        <input type="email" name="rooms[{{$i-1}}][paxes][{{$a-1}}][email]" id="email" required
                               class="form-control" placeholder="yourname@xyz.com">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="country"><sup class="required">*</sup> Country code</label>

                        <select name="rooms[{{$i-1}}][paxes][{{$a-1}}][countryCode]" class="select2 form-control"
                                id="country">
                          @include('tools.country_codes')
                        </select>
                      </div>
                      <input type="hidden" value="{{$search_id}}" name="search_id"/>
                      <input type="hidden" value="{{$refetch_availability['search_id']}}" name="book_search_id"/>
                      <input type="hidden" value="{{$refetch_availability['hotel']['hotel_code']}}" name="hotel_code"/>
                      <input type="hidden" value="{{$reservation_selected_room['rate']['room_code']}}"
                             name="room_code"/>
                      <input type="hidden" name="room_detail"
                             value="{{serialize($reservation_selected_room['rate'])}}"/>
                      <input type="hidden" name="reservation_selected_room_id"
                             value="{{$reservation_selected_room->id}}"/>

                      <div class="col-lg-6 col-md-6 form-group">
                        <label for="number"><sup class="required">*</sup>Contact Number</label>

                        <div class="controls">
                          <input type="text" name="rooms[{{$i-1}}][paxes][{{$a-1}}][phone_number]" class="form-control"
                                 required data-validation-containsnumber-regex="(\d)+"
                                 data-validation-containsnumber-message="The numeric field may only contain numeric characters."
                                 placeholder="4489001">
                        </div>
                      </div>
                    </div>
                    <input type="hidden" value="AD" name="rooms[{{$i-1}}][paxes][{{$a-1}}][type]"/>
                    <input type="hidden" value="{{$search_params['client_nationality']}}"
                           name="rooms[{{$i-1}}][paxes][{{$a-1}}][client_nationality]"/>

                    <div class="row">
                      <div class="col-lg-12 form-group">
                        <label for="remarks">Remarks (optional)</label>
                        <textarea name="rooms[{{$i-1}}][paxes][{{$a-1}}][remarks]" id="remarks" rows="3"
                                  class="form-control"
                                  placeholder="E.g non smoking room (Limit 250 characters)"></textarea>
                      </div>
                    </div>
                  @else
                  <div class="row">
                    <div class="col-lg-4 col-md-4 form-group">
                      <label for="title"><sup class="required">*</sup> Title</label>
                      <select name="rooms[{{$i-1}}][paxes][{{$a-1}}][title]" id="title" class="select2 form-control">
                        <option value="Mr.">Mr.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Mstr.">Mstr.</option>
                      </select>
                    </div>

                    <div class="col-lg-4 col-md-4 form-group">
                      <label for="first_name"><sup class="required">*</sup> First Name</label>
                      <input type="text" name="rooms[{{$i-1}}][paxes][{{$a-1}}][name]" id="name" required
                             class="form-control"
                             placeholder="E.g Alice">
                    </div>

                    <div class="col-lg-4 col-md-4 form-group">
                      <label for="last_name"><sup class="required">*</sup> Last Name</label>
                      <input type="text" name="rooms[{{$i-1}}][paxes][{{$a-1}}][surname]" id="surname" required
                             class="form-control"
                             placeholder="E.g Wong">
                    </div>
                    <input type="hidden" value="AD" name="rooms[{{$i-1}}][paxes][{{$a-1}}][type]"/>
                  </div>
                  @endif
                @endfor

                @php
                  $childCur = 0
                @endphp
                @for ($c=   $reservation_selected_room['rate']['rooms'][$i-1]['no_of_adults'] ; $c <= $reservation_selected_room['rate']['rooms'][$i-1]['no_of_adults'] + $reservation_selected_room['rate']['rooms'][$i-1]['no_of_children'] -1; $c++)

                  <div class="alert alert-info">
                    <i class="feather icon-clock fa-fw"></i>
                    Child

                  </div>
                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="title"><sup class="required">*</sup> Title</label>
                    <select name="rooms[{{$i-1}}][paxes][{{$c}}][title]" id="title" class="select2 form-control">
                      <option value="Mr.">Mr.</option>
                      <option value="Ms.">Ms.</option>
                      <option value="Mrs.">Mrs.</option>
                      <option value="Mstr.">Mstr.</option>
                    </select>
                  </div>
                  <input type="hidden" name="rooms[{{$i-1}}][paxes][{{$c}}][age]"
                         value="{{$reservation_selected_room['rate']['rooms'][$i-1]['children_ages'][$childCur]}}"/>
                  @php
                    $childCur += 1
                  @endphp

                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="first_name"><sup class="required">*</sup> First Name</label>
                    <input type="text" name="rooms[{{$i-1}}][paxes][{{$c}}][name]" id="name" required
                           class="form-control"
                           placeholder="E.g Alice">
                  </div>

                  <div class="col-lg-6 col-md-6 form-group">
                    <label for="last_name"><sup class="required">*</sup> Last Name</label>
                    <input type="text" name="rooms[{{$i-1}}][paxes][{{$c}}][surname]" id="surname" required
                           class="form-control"
                           placeholder="E.g Wong">
                  </div>
                  <input type="hidden" value="CH" name="rooms[{{$i-1}}][paxes][{{$c}}][type]"/>

                @endfor
              @endfor
              <div class="col-lg-12 mb-1 mt-1">
                <div class=" alert alert-blue">
                  For Agent (optional)
                </div>

              </div>

              <div class="col-lg-12 form-group">
                <label for="reference">Reference code (for your usage)</label>


                <div class="controls">
                  <input type="text" name="reference" class="form-control"
                         data-validation-regex-regex="^[-a-zA-Z_\d]+$"
                         data-validation-regex-message="Must Enter Character, Number, Dash or Uderscore"
                         placeholder="Enter Character, Numbers, Dash, Uderscore" required>
                </div>
              </div>

              <div class="col-lg-12 form-group">
                <label for="tour">Remarks (Optional booking comments to be passed along to the hotel)</label>
                <textarea id="tour" name="agent_remarks" id="" rows="3" class="form-control"
                          placeholder="E.g Booking for tour group"></textarea>
              </div>

              {{--              <div class="col-lg-12">--}}
              {{--                We use secure transmission and encryption to protect booking information. By choosing to complete this--}}
              {{--                booking,--}}
              {{--                you acknowledge that you have read and accept the <a href="">terms & Conditions</a> .--}}
              {{--              </div>--}}


              <div class="col-lg-12 text-right mt-4">
                <button type="submit" class="btn btn-primary">PROCEED TO PAYMENT</button>
              </div>
            </div>

          </form>
        </div>
        <!-- END .card -->
      </div>
      <!-- END .col-lg-8 -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="stars">
              @for ($i = 1; $i <= $hotel_detail['star_category']; $i++)
                <i class="fa fa-star"></i>
              @endfor
            </div>

            <h6>{{$hotel_detail['hotel_name']}}</h6>
            <div><small>{{$hotel_detail['address_postal_code']}} </small></div>

            <div class="dropdown-divider mt-1 mb-1"></div>

            <div class="d-flex justify-content-between">
              <div>Room Type</div>
              <div>
                <h6>{{$reservation_selected_room['rate']['rooms'][0]['room_type']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Room Description</div>
              <div>
                <h6>{{$reservation_selected_room['rate']['rooms'][0]['description']}}</h6>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Check in</div>
              <div>
                <h6>{{$refetch_availability['checkin']}}</h6>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Check out</div>
              <div>
                <h6>{{$refetch_availability['checkout']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Nights</div>
              <div>
                <h6>{{$refetch_availability['no_of_nights']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Rooms</div>
              <div>
                <h6>{{$refetch_availability['no_of_rooms']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Adults</div>
              <div>
                <h6>{{$refetch_availability['no_of_adults']}}</h6>
              </div>
            </div>
            @if(isset($refetch_availability['no_of_children']))
              <div class="d-flex justify-content-between">
                <div>Children</div>
                <div>
                  <h6>{{$refetch_availability['no_of_children']}}</h6>
                </div>
              </div>
            @endif
            @if(isset($refetch_availability['no_of_infants']))
              <div class="d-flex justify-content-between">
                <div>Infants</div>
                <div>
                  <h6>{{$refetch_availability['no_of_infants']}}</h6>
                </div>
              </div>
            @endif

            <div class="d-flex justify-content-between">
              <div>Non Refundable</div>
              <div>
                <h6>
                  @if($reservation_selected_room['rate']['non_refundable'])
                    <b style="color: red">Yes</b>
                  @else
                    <b style="color: green">No</b>
                  @endif
                </h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Support Cancellation</div>
              <div>
                <h6>
                  @if($reservation_selected_room['rate']['supports_cancellation'])
                    <b style="color: green">Yes</b>
                  @else
                    <b style="color: red">No</b>
                  @endif
                </h6>
              </div>
            </div>


            <div class="dropdown-divider mt-1 mb-1"></div>

            <h4>Total Price</h4>

            <div class="d-flex justify-content-between">
              <div><small>included in price: Government Taxes, Hotel Tax, and Service charge.</small></div>
              <div>
                <h4>
                  {{$reservation_selected_room['rate']['price']}} USD
                </h4>
              </div>
            </div>

            <div class="bg-gray mt-3 p-2 rounded">
              <div>Need help? For 6 rooms or more, please contact our customer service.</div>

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
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>
@endsection
