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
                <h3>Total : <?=$amount;?> $ </h3><br/><br/>
                <div class="card-header payment-header">

                  <div><i class="fa fa-credit-card-alt fa-fw mr-1"></i> Credit or Debit Card</div>
                  <div class="float-right">
                    <img src="../../../app-assets/images/img/pay.png" alt="">
                    <img src="../../../app-assets/images/img/visa.png" alt="">
                  </div>
                </div>
                <div class="card-body">


                  <div class="row">

                    <div class="col-lg-12">
                      @if($MigsStatus == 'active')
                        <button type="button" class="btn btn-block pay-btn black-btn"
                                onclick="Checkout.showLightbox();" id="mastercard_btn">
                          <i class="fa fa-lock fa-fw mr-1"></i> Pay <?=$amount;?> $
                        </button>
                      @else
                        <button type="button" class="btn btn-block pay-btn black-btn"
                                onclick="alert('MIGS deactived. please contact administrator')"
                                id="mastercard_btn">
                          <i class="fa fa-lock fa-fw mr-1"></i> Pay <?=$amount;?> $
                        </button>
                      @endif

                    </div>
                    <br/>
                    <div><img src="{{ URL::to('/') }}/images/logo/mastercard_visa.png"
                              width="200px"/></div>
                  </div>

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
@section('page-script')
  <script src="https://eu-gateway.mastercard.com/checkout/version/49/checkout.js" data-error="errorCallback"
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
        id: '<?=$orderid?>'
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
        reference: '<?=$orderid?>',
        acquirer: {
          transactionId: '<?=$master_card_session_id?>'
        }
      }
    });

  </script>
@endsection


