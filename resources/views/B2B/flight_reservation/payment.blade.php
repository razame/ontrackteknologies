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
                          <h4>{{number_format($flight['Fare']['TotalFare'], 2)}} {{$flight['Fare']['AgentPreferredCurrency']}} </h4>
                          <div class="text-bold-600 orange">{{$user->balance}} USD</div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if($user->balance < $flight['Fare']['TotalFare'])
                    <div class='text-center mt-5'>
                      <button class="btn btn-primary mb-1 pay-disable disabled">PAY</button>
                      <div>Not enough balance, Please choose other payment method.</div>
                    </div>
                  @else
                    <form action="{{route('FlightReservationPayWithWallet',['flight_id'=>$flight->id])}}" method="post">
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
