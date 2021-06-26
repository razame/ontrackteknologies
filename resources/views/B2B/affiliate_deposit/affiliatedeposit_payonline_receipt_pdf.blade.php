<Div class="content-body">
  <div class="row">
    <!-- START .col-lg-8 -->
    <div class="col-lg-8">
      <!-- START .card -->
      <div class="card">
        <h4 class="card-header text-bold-600">Payment</h4>
        <div class="card-body">
          <div class="checkout-wrap w-100">
            @if( $resp['result'] == "SUCCESS")
              <div class="payment-info w-100">
                <p class="mb-0" style="background-color:#28a745">
                  <b>{{$resp['result']}}</b>
                  <br/>

                  Reference Number : {{$affiliate_deposit->reference_number}}
                  <br/>
                  <br/>

                </p>
              </div>
            @else
              <div class="payment-info w-100">
                <p class="mb-0" style="">
                  <b>Your transaction was not successful.</b>
                  <br/>
                  Reason: {{$resp['error']['explanation']}}
                  <br/>
                  Reference Number : {{$affiliate_deposit->reference_number}}

                  <br/>
                  <br/>
                </p>
              </div>
            @endif
            <div class="order-table-wrap w-100 mt-5">
              @if( $resp['result'] == "SUCCESS")
                <h3>Your order</h3>
                <table class="order-table w-100">
                  <thead>

                  </thead>
                  <tbody>
                  <tr class="cart_item">
                    <td class="product-name">Amount <strong class="product-quantity"></strong></td>
                    <td class="product-total"><span class="price d-inline-block">${{$affiliate_deposit->amount}}</span>
                    </td>
                  </tr>
                  <tr class="cart_item">
                    <td class="product-name">Currency <strong class="product-quantity"></strong></td>
                    <td class="product-total"><span class="price d-inline-block">USD</span></td>
                  </tr>
                  <tr class="cart_item">
                    <td class="product-name">Order ID <strong class="product-quantity"></strong></td>
                    <td class="product-total"><span
                        class="price d-inline-block">{{$affiliate_deposit->reference_number}}</span></td>
                  </tr>
                  <tr class="cart_item">
                    <td class="product-name">Payment Status <strong class="product-quantity"></strong></td>
                    <td class="product-total"><span class="price d-inline-block">{{$resp['result']}}</span></td>
                  </tr>
                  <tr class="cart_item">
                    <td class="product-name">Transaction Date <strong class="product-quantity"></strong></td>
                    <td class="product-total"><span
                        class="price d-inline-block">{{$affiliate_deposit->updated_at}}</span></td>
                  </tr>
                  </tbody>
                  <tfoot>

                  <tr>
                    <th>Total</th>
                    <td><strong><span class="price d-inline-block">${{$affiliate_deposit->amount}}</span></strong></td>
                  </tr>
                  </tfoot>
                </table>
                <br/><br/><br/>


              @endif
            </div>

          </div><!-- Checkout Wrap -->


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


