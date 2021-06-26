@extends('layouts/contentLayoutMaster')

@section('title', 'Pay ')

@section('content')

  <Div class="content-body">
    <div class="row">
      <!-- START .col-lg-8 -->
      <div class="col-lg-8">
        <!-- START .card -->
        <div class="card">
          <h4 class="card-header text-bold-600">Payment</h4>
          <div class="card-body">
            @if(session('warning'))
              <div class='alert alert-warning'>{{session('warning')}}</div>
            @else
              {{--              <div class="alert alert-info">--}}
              {{--                <i class="feather icon-clock fa-fw"></i> Your order is reserved for 00:14:11--}}
              {{--              </div>--}}
            @endif

            <ul class="nav nav-pills justify-content-center payment-tabs mt-3">
              <li class="nav-item">
                <a class="nav-link active" id="wallet-tab-end" data-toggle="pill" href="#wallet-end"
                   aria-expanded="true">Wallet</a>
              </li>
              {{--              <li class="nav-item">--}}
              {{--                <a class="nav-link " id="credit-tab-end" data-toggle="pill" href="#credit-end" aria-expanded="false">Credit--}}
              {{--                  card</a>--}}
              {{--              </li>--}}
            </ul>

            <div class="tab-content">
              <!-- START tab1 -->
              <div role="tabpanel" class="tab-pane active" id="wallet-end" aria-labelledby="wallet-tab-end"
                   aria-expanded="true">
                <div class="col-lg-8 mx-auto mt-5">
                  <div class="media">
                    <div class="media-header mr-5">
                      <img src="/app-assets/images/img/wallet.png" class="wallet-img" alt="">
                    </div>
                    <div class="media-body wallet-media-body">
                      <div class="d-flex justify-content-between">
                        <div>

                          <div>Total price</div>
                          <div class="mt-1">Available balance</div>
                        </div>
                        <div>
                          <h4>{{$booking_data['booking_items']['price']}} {{$booking_data['booking_items']['currency']}} </h4>
                          <div class="text-bold-600 orange">{{$user->balance}} USD</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if($user->balance < $booking_data['booking_items']['price'])
                    <div class='text-center mt-5'>
                      <button class="btn btn-primary mb-1 pay-disable disabled">PAY</button>
                      <div>Not enough balance, Please choose other payment method.</div>
                    </div>
                  @else
                    <form action="{{route('HotelBookingPayWithWallet',['booking_id'=>$booking->id])}}" method="post">
                      @csrf
                      <div class='text-center mt-5'>
                        <button type="submit" class="btn btn-primary mb-1 pay">PAY</button>
                      </div>
                    </form>
                  @endif
                </div>
              </div>
              <!-- END tab1 -->
              <!-- START tab2 -->
              <div class="tab-pane " id="credit-end" role="tabpanel" aria-labelledby="credit-tab-end"
                   aria-expanded="false">
                <div class="card bg-gray">
                  <div class="card-header payment-header">
                    <div><i class="fa fa-credit-card-alt fa-fw mr-1"></i> Credit or Debit Card</div>
                    <div class="float-right">
                      <img src="../../../app-assets/images/img/pay.png" alt="">
                      <img src="../../../app-assets/images/img/visa.png" alt="">
                    </div>
                  </div>
                  <div class="card-body">
                    <form action="http://gtweb.gtbank.com/GTPay/Tranx.aspx" method="post">

                      <input type="hidden" name="gtpay_mert_id" value="{{$merchant_id}}"/>
                      <input type="hidden" name="gtpay_tranx_id" value="{{$gtpay_tranx_id}}"/>
                      <input type="hidden" name="gtpay_tranx_amt" value="{{$gtpay_tranx_amt}}"/>
                      <input type="hidden" name="gtpay_tranx_curr" value="{{$gtpay_tranx_curr}}"/>
                      <input type="hidden" name="gtpay_cust_id" value="{{$gtpay_cust_id}}"/>
                      <input type="hidden" name="gtpay_cust_name" value="{{$user->first_name}} {{$user->last_name}}"/>
                      <input type="hidden" name="gtpay_hash" value="{{$hash}}"/>
                      <input type="hidden" name="gtpay_tranx_noti_url" value="{{$gtpay_redirect_url}}"/>
                      <input type="hidden" name="gtpay_echo_data" value="{{$gtpay_tranx_id}};{{$hash}}"/>

                      <div class="row">

                        <div class="col-lg-12">
                          <button type="submit" class="btn btn-block pay-btn black-btn">
                            <i class="fa fa-lock fa-fw mr-1"></i> Pay
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- END .card -->
      </div>
      <!-- END .col-lg-8 -->
      <div class="col-lg-4">
        <div class="card">
          <div class="card-body">
            <div class="stars">
              @for ($i = 1; $i <= $refetch_availability['star_category']; $i++)
                <i class="fa fa-star"></i>
              @endfor
            </div>

            <h6>{{$refetch_availability['hotel_name']}}</h6>
            <div><small>{{$hotel_details['address_postal_code']}} </small></div>

            <div class="dropdown-divider mt-1 mb-1"></div>

            <div class="d-flex justify-content-between">
              <div>Room Type</div>
              <div>
                <h6>{{$refetch_availability['rate']['rooms'][0]['room_type']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Room Description</div>
              <div>
                <h6>{{$refetch_availability['rate']['rooms'][0]['description']}}</h6>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Check in</div>
              <div>
                <h6>{{$refetch_availability['hotel']['checkin']}}</h6>
              </div>
            </div>

            <div class="d-flex justify-content-between">
              <div>Check out</div>
              <div>
                <h6>{{$refetch_availability['hotel']['checkout']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Nights</div>
              <div>
                <h6>{{$refetch_availability['hotel']['no_of_nights']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Rooms</div>
              <div>
                <h6>{{$refetch_availability['hotel']['no_of_rooms']}}</h6>
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <div>Adults</div>
              <div>
                <h6>{{$refetch_availability['hotel']['no_of_adults']}}</h6>
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
                  @if($refetch_availability['rate']['non_refundable'])
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
                  @if($refetch_availability['rate']['supports_cancellation'])
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
                  {{$refetch_availability['rate']['price']}} USD
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
