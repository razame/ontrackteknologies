@extends('layouts/homepage')

@section('title', 'Reservation')
@section('content')
  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">Order Review</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">Order Review</li>
            </ul><!-- Breadcrumbs -->
          </div>
        </div><!-- Page Title Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-90 pb-90">
      <div class="container">
        <div class="checkout-wrap w-100">
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

            <div class="order-table-wrap w-100 mt-5">
              <h3>Please verify your details</h3>
              <table class="order-table w-100">
                <thead>
                <tr>
                  <th>Customer Name</th>
                  <th>{{$user->contact_person}}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                  <td class="product-name">Agency Name</td>
                  <td class="product-total"><span class="price d-inline-block">{{$user->name}}</span></td>
                </tr>
                </tbody>
                <thead>
                <tr>
                  <th>Plan</th>
                  <th>{{$plan->plan_name}}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                  <td class="product-name">Refrence Number</td>
                  <td class="product-total">
                    <span class="price d-inline-block">{{$plan->reference_number}} </span></td>
                </tr>
                </tbody>
                <tbody>
                <thead>
                <tr>
                  <th>How Many Months</th>
                  <th>{{$plan->how_many_month}}</th>
                </tr>
                </thead>
                <tr class="cart_item">
                  <td class="product-name">Amount</td>
                  <td class="product-total">
                    <span class="price d-inline-block"> <b>ZAR {{substr($gtpay_tranx_amt,0,-2)}}.00</b> (${{$plan->amount*$plan->how_many_month}})</span>
                  </td>
                </tr>
                </tbody>

              </table>


              {{-- <div class="payment-info w-100">
                  <p class="mb-0">Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.</p>
              </div> --}}
              <br/><br/><br/>
              <table class="order-table w-100">

                <tbody>
                <tr class="cart_item">
                  <td class="product-name"><input type="radio" checked name="payment_option"> Masterpass</td>
                  <td class="product-total" width="30%">
                    <span class="price d-inline-block"> <img src="/homepage/images/masterpass.jpg" class="img-fluid"
                                                             alt="" width="200px"></span></td>
                </tr>

                {{-- <tr class="cart_item"><td class="product-name"><input type="radio"  name="payment_option" onclick="document.getElementById('gtpay_btn').style.display = '';document.getElementById('mastercard_btn').style.display = 'none';"> interswitch</td>
                <td class="product-total">
                    <span class="price d-inline-block"> <img src="/homepage/images/interswitch.png" class="img-fluid" alt="" width="300px"></span></td>
                </tr> --}}
                </tbody>
              </table>
              <br/>
              @if($MigsStatus == 'active')
                <input type="button" class="theme-btn fill-btn3" value="Pay"
                       onclick="Checkout.showLightbox();" id="mastercard_btn"/>
              @else
                <input type="button" class="theme-btn fill-btn3" value="Pay"
                       onclick="alert('MIGS deactived. please contact administrator')" id="mastercard_btn"/>
              @endif

              {{-- <button class="theme-btn fill-btn3" type="submit" id="gtpay_btn">Pay </button> --}}
            </div>
          </form>
        </div><!-- Checkout Wrap -->
      </div>
    </div>
  </section>

@endsection

@section('page-script')
  <script src="https://ap-gateway.mastercard.com/checkout/version/49/checkout.js" data-error="errorCallback"
          data-cancel="cancelCallback"></script>
  <script type="text/javascript">
    function errorCallback(error) {
      console.log(JSON.stringify(error));
    }

    function cancelCallback() {
      console.log('Payment cancelled');
    }

    Checkout.configure({
      session: {
        id: '<?=$master_card_session_id?>'
      },
      order: {
        amount: <?=$amount?>,
        currency: 'USD',
        description: 'Ordered goods',
        id: '<?=$gtpay_tranx_id?>'
      },

      interaction: {
        merchant: {
          name: 'OnTrack Teknologies',
          logo: 'https://ontrackteknologies.com/homepage/images/loader-logo.png'
        },
        displayControl: {
          billingAddress: 'HIDE',
          orderSummary: "HIDE"
        }


      },
      transaction: {
        reference: '<?=$gtpay_tranx_id?>',
        acquirer: {
          transactionId: '<?=$master_card_session_id?>'
        }
      }
    });

  </script>
@endsection
