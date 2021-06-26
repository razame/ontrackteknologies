@extends('layouts/contentLayoutMaster')

@section('title', 'Payment')

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

            @endif

            <ul class="nav nav-pills justify-content-center payment-tabs mt-3">

              <li class="nav-item">
                <a class="nav-link active" id="credit-tab-end" data-toggle="pill" href="#credit-end"
                   aria-expanded="false">Credit card</a>
              </li>
            </ul>


            <!-- END tab1 -->
            <!-- START tab2 -->
            <div class="tab-pane active" id="credit-end" role="tabpanel" aria-labelledby="credit-tab-end"
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
                  <form class="checkout-form w-100" action="https://ibank.gtbank.com/GTPay/Tranx.aspx" method="post">
                    @csrf

                    <input type="hidden" name="gtpay_mert_id" value="{{$merchant_id}}"/>
                    <input type="hidden" name="gtpay_tranx_id" value="{{$gtpay_tranx_id}}"/>
                    <input type="hidden" name="gtpay_tranx_amt" value="{{$gtpay_tranx_amt}}"/>
                    <input type="hidden" name="gtpay_tranx_curr" value="{{$gtpay_tranx_curr}}"/>
                    <input type="hidden" name="gtpay_cust_id" value="{{$gtpay_cust_id}}"/>
                    <input type="hidden" name="gtpay_cust_name" value="{{$user->name}} ({{$user->contact_person}})"/>
                    <input type="hidden" name="gtpay_hash" value="{{$hash}}"/>
                    <input type="hidden" name="gtpay_tranx_noti_url" value="{{$gtpay_redirect_url}}"/>
                    <input type="hidden" name="gtpay_echo_data" value="{{$gtpay_tranx_id}};{{$hash}}"/>
                    <input type="hidden" name="gtpay_tranx_memo" value="memo"/>
                    <input type="hidden" name="gtpay_gway_name" value="webpay"/>

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

    <div>
    </div>
  </div>
  </div>
@endsection

