<div class="content-body">


  <form action="" method="post">

    <div class="row">


      <!--- START col-lg-8 --->

      <div class="col-lg-12">

        <div class="card">

          <div class="card-header card-header-has-logo">

            <h4>Booking <span>Confirmation</span></h4>
            {{--              <div class="hotel-logo">--}}
            {{--                <div class="hotel-logo-img">--}}
            {{--                  <img src="/images/hotel-icon-blue-300x284.jpg" class="img-fluid" alt=""/>--}}
            {{--                </div>--}}
            {{--                <div class="hotel-logo-title">TripserB2B</div>--}}
            {{--              </div>--}}
          </div>

          <div class="card-body card-body-wrapper">

            <div class="container voucher-info">

              <div class="hotel-data">


                <div class="table-responsive">

                  <table class="table table-hover table-bordered">

                    <tbody>

                    <tr>
                      <td><span style="font-size: 18px;">{{$booking['hotel']['name']}}<span></span></span></td>
                    </tr>

                    <tr>
                      <td>{{$booking['hotel']['address']}}</td>
                    </tr>

                    <tr>
                      <td>{!! $booking['hotel']['description'] !!}</td>
                    </tr>

                    <tr>
                      <td><label style="padading-right: 5px;"><b>Hotel Category:</b> </label>

                        {{$booking['hotel']['category']}}</td>
                    </tr>

                    <tr>
                      <td><label style="padding-right: 5px;"><b>Phone Number: </b></label>

                        {{$booking['hotel']['phone_number']}}</td>
                    </tr>

                    <tr>
                      <td><label style="padding-right: 5px;"><b>Check In: </b></label>{{$booking['checkin']}}</td>
                    </tr>

                    <tr>
                      <td><label style="padding-right: 5px;"><b>Check Out:</b> </label>{{$booking['checkout']}}</td>
                    </tr>


                    </tbody>

                  </table>

                </div>
              </div>


              <div class="confirmation-details">

                <h3 class="navy-header">Confirmation Details</h3>

                <div class="table-responsive">

                  <table class="table table-hover passenger-table table-bordered">


                    <tbody>

                    <tr class="">

                      <!--<th>Ref.</th>-->

                      <th>Room Type</th>

                      <th>Description</th>

                      <!-- <th>Nights</th> -->

                      <th>No. of Rooms</th>

                      <th>Adults</th>

                      <th>Children</th>

                    </tr>

                    @foreach($booking['hotel']['booking_items'][0]['rooms'] as $room)

                      <tr>

                        <td>{{$room['room_type']}}</td>

                        <td>{{$room['description']}}</td>

                        <td>{{$room['no_of_rooms']}}</td>

                        <td>{{$room['no_of_adults']}}</td>

                        <td>{{$room['no_of_children']}}</td>

                      </tr>
                      <tr>

                        @endforeach


                      </tr>
                      <tr>
                        <td><h4>Other inclusions</h4></td>

                        <td colspan="8">
                          @if(isset($booking['hotel']['booking_items'][0]['other_inclusions']))
                            {{implode(',',$booking['hotel']['booking_items'][0]['other_inclusions'])}}
                          @endif

                        </td>

                      </tr>


                    </tbody>
                    <tbody>

                    </tbody>
                  </table>

                </div>
              </div>


              <div class="booking-details ">

                <h3 class="navy-header">Booking InformationBooking Information</h3>

                <div class="table-responsive">

                  <table class="table table-hover passenger-table table-bordered">

                    <thead></thead>

                    <tbody>

                    <tr>
                      <td><label>Status</label></td>
                      <td>

                        {{$booking['booking_status']}}</td>
                    </tr>

                    <tr>
                      <td><label>Nationality</label></td>
                      <td>

                        {{$booking['nationality']}}        </td>
                    </tr>

                    <tr>
                      <td><label>Agent Reference</label></td>
                      <td> {{$booking['agent_reference']}}  </td>
                    </tr>


                    <tr>
                      <td><label>Booking Date</label></td>
                      <td>{{$booking['booking_date']}}</td>
                    </tr>

                    <tr>
                      <td><label>Supplier Booking Date</label></td>
                      <td>{{$booking['voucher_issue_date']}}</td>
                    </tr>

                    <tr>
                      <td><label>System Reference No.</label></td>
                      <td>{{$booking['booking_name']}}</td>
                    </tr>

                    <tr>
                      <td><label>Supplier Reference No.</label></td>

                      <td>

                        {{$booking['booking_reference']}}

                      </td>

                    </tr>


                    <tr>
                      <td><label>Payment Type</label></td>
                      <td>{{$booking['payment_type']}}</td>
                    </tr>

                    </tbody>

                  </table>

                  <!-- <h3>Cancellation policies and charges</h3> -->

                  <!-- <table> -->

                  <!--   <thead></thead> -->

                  <!-- </table> -->

                </div>

              </div>


              <div class="holder-data">

                <h3 class="navy-header">Holder Details</h3>

                <div class="table-responsive">
                  <table class="table table-hover passenger-table table-bordered">

                    <tbody>

                    <tr>
                      <th>Name</th>
                      <td>{{$booking['holder']['title']}} {{$booking['holder']['name']}} {{$booking['holder']['surname']}}</td>
                    </tr>

                    <tr>
                      <th>Email</th>
                      <td>{{$booking['holder']['email']}}</td>
                    </tr>

                    <tr>
                      <th>Phone Number</th>
                      <td>{{$booking['holder']['phone_number']}}</td>
                    </tr>

                    </tbody>

                  </table>
                </div>

              </div>


              <div class="guest-data">

                <h3 class="navy-header">Guest Details</h3>

                <table class="table table-hover passenger-table table-bordered">

                  <thead>

                  <tr class="">

                    <th>Name</th>

                    <th>Type</th>

                    <th>Age</th>

                  </tr>

                  </thead>

                  <tbody>

                  @foreach($booking['hotel']['paxes'] as $pax)

                    <tr>

                      <td>{{$pax['title']}} {{$pax['name']}} {{$pax['surname']}}</td>

                      <td>{{$pax['type']}}</td>

                      <td>{{@$pax['age']}}</td>

                    </tr>

                  @endforeach


                  </tbody>
                </table>

              </div>


              <div class="important note">

                <h3 class="navy-header">Important Note</h3>

                <ul class="voucher-notes">

                  @foreach($booking['hotel']['booking_items'][0]['rate_comments'] as $key =>$comment)

                    @if(strlen($comment)> 2)

                      <div>


                        <li><i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                          : {!! $comment !!}</li>

                      </div>

                    @endif

                  @endforeach


                </ul>

              </div>


              <div class="important note">

                <h3 class="navy-header">Additional Info</h3>

                <ul class="voucher-notes">

                  @foreach($booking['additional_info'] as $key =>$comment)

                    @if(strlen($comment)> 2)

                      <div>


                        <li><i class="fa fa-circle fa-fw"></i><b>{{ucwords(str_replace("_"," ",$key))}}</b>
                          : {!! $comment !!}</li>

                      </div>

                    @endif

                  @endforeach


                </ul>

              </div>


              <div class="notes">

                <h3 class="navy-header">Notes</h3>

                <ul class="voucher-notes">

                  <li><i class="fa fa-circle fa-fw"></i>Early check in and late check out is subject to availability.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>The passenger has to furnish a photo identity and address
                    proof at the time of verification

                    failing to which all passenger on that voucher shall not be entertained with any refunds

                    or restitution.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>Standard Check in time is 1400 hrs / check out time 1200 hrs
                    unless specified
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>The refund for early check out or unutilized night or service
                    is subject to discretion of the

                    hotel &amp; the supplier, we strongly recommend to get a letter from the hotel favoring no

                    charges for early check out.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>All additional charges other than the room charges and
                    inclusions as mentioned in the

                    booking voucher are to be borne and paid separately during check-out. Please make sure

                    that you are aware of all such charges that may comes as extras. Some of them can be

                    WiFi costs, Mini Bar, Laundry Expenses, Telephone calls, Room Service, Snacks etc.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>Voucher covers only those taxes which are included in the
                    booking price (if included), all

                    various other applicable taxes needs to be settled directly by guest.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>Any issues which are bought to our notice later than 7 days
                    will not be entertained.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>We are not liable for any loss or damage caused during your
                    stay in the hotel or while

                    availing any service.
                  </li>

                  <li><i class="fa fa-circle fa-fw"></i>We have no relevance with the room service or food menu or any
                    other service as these

                    are all as per the hotel standards.
                  </li>

                </ul>

              </div>

            </div>

          </div>

        </div>

        <!---->


        <!---->


        <!---->


      </div>

      <!--- END col-lg-8 --->

    </div>

    <!--- END row --->

  </form>

  <!--- END FORM --->

</div>


