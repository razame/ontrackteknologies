@extends('layouts/homepage')

@section('title', 'Reservation')
@section('content')
  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">Transaction Status</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">Transaction Status</li>
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
          @if( $resp->ResponseCode == "00")
            <div class="payment-info w-100">
              <p class="mb-0" style="background-color:#28a745">
                <b>{{$resp->ResponseDescription}}</b>
                <br/>
                We will send a confirmation in the registered email.
                <br/>
                Reference Number : {{$plan->reference_number}}
                <br/>
                <br/>

              </p>
            </div>
          @else
            <div class="payment-info w-100">
              <p class="mb-0" style="background-color: red">
                <b>Your transaction was not successful.</b>
                <br/>
                Reason: {{$resp->ResponseDescription}}
                <br/>
                Reference Number : {{$plan->reference_number}}

                <br/>
                <br/>
                Click B2C Portal Service on footer menu to try again.
              </p>
            </div>
          @endif
          <div class="order-table-wrap w-100 mt-5">
            @if( $resp->ResponseCode == "00")
              <h3>Your order</h3>
              <table class="order-table w-100">
                <thead>
                <tr>
                  <th>Plan</th>
                  <th>{{$plan->plan_name}}</th>
                </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                  <td class="product-name">Amount <strong class="product-quantity"></strong></td>
                  <td class="product-total"><span class="price d-inline-block">${{$plan->amount}}</span></td>
                </tr>
                <tr class="cart_item">
                  <td class="product-name">Currency <strong class="product-quantity"></strong></td>
                  <td class="product-total"><span class="price d-inline-block">USD</span></td>
                </tr>
                <tr class="cart_item">
                  <td class="product-name">Order ID <strong class="product-quantity"></strong></td>
                  <td class="product-total"><span class="price d-inline-block">{{$plan->reference_number}}</span></td>
                </tr>
                <tr class="cart_item">
                  <td class="product-name">Payment Status <strong class="product-quantity"></strong></td>
                  <td class="product-total"><span class="price d-inline-block">{{$resp->ResponseDescription}}</span>
                  </td>
                </tr>
                <tr class="cart_item">
                  <td class="product-name">Transaction Date <strong class="product-quantity"></strong></td>
                  <td class="product-total"><span class="price d-inline-block">{{$plan->updated_at}}</span></td>
                </tr>
                </tbody>
                <tfoot>

                <tr>
                  <th>Total</th>
                  <td><strong><span class="price d-inline-block">${{$plan->amount}}</span></strong></td>
                </tr>
                </tfoot>
              </table>
              <?php
              // use wordwrap() if lines are longer than 70 characters
              $msg = '<table class="order-table w-100">
                            <thead>
                            <tr><th>Plan</th><th>{{$plan->plan_name}}</th></tr>
                            </thead>
                            <tbody>
                                <tr class="cart_item"><td class="product-name">Amount <strong class="product-quantity"></strong></td><td class="product-total"><span class="price d-inline-block">${{$plan->amount}}</span></td></tr>
                                <tr class="cart_item"><td class="product-name">Currency <strong class="product-quantity"></strong></td><td class="product-total"><span class="price d-inline-block">USD</span></td></tr>
                                <tr class="cart_item"><td class="product-name">Order ID <strong class="product-quantity"></strong></td><td class="product-total"><span class="price d-inline-block">{{$plan->reference_number}}</span></td></tr>
                                <tr class="cart_item"><td class="product-name">Payment Status <strong class="product-quantity"></strong></td><td class="product-total"><span class="price d-inline-block">{{$resp->ResponseDescription}}</span></td></tr>
                                <tr class="cart_item"><td class="product-name">Transaction Date <strong class="product-quantity"></strong></td><td class="product-total"><span class="price d-inline-block">{{$plan->updated_at}}</span></td></tr>
                            </tbody>
                            <tfoot>

                                <tr><th>Total</th><td><strong><span class="price d-inline-block">${{$plan->amount}}</span></strong></td></tr>
                            </tfoot>
                        </table>';
              $msg = wordwrap($msg, 70);

              // send email
              mail("farhadarjmand@gmail.com", "My subject", $msg);
              ?>

            @endif
          </div>

        </div><!-- Checkout Wrap -->
      </div>
    </div>
  </section>
@endsection
