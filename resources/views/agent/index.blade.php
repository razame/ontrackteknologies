@php
  use App\GnrCity
@endphp
@extends('layouts/agent')

@section('title', 'Agents')
@section('content')

  @include('panels._agent_homepage_header')
  <!-- ================================= CONTENT ===============================-->
  <!-- start hotels -->
  <section class="hotels">
    <div class="container">
      <h1 class="hotels-title text-center">Recommended Hotels</h1>
      <div class="hotels-slider swiper-container position-relative">
        <div class="swiper-wrapper">
          @foreach($hotels as $hotel)
            <div class="swiper-slide">
              <a href="" class="recomended-hotel-box">
                <div class="image-parent">
                  <div class="image-inner">
                    <img src="{{$hotel->image_url}}" class="img-fluid" alt="">
                  </div>
                </div>

                <div class="recomended-hotel-content">
                  <div class="hotel-star">
                    <i class="fa fa-star fa-fw"></i>
                    <i class="fa fa-star fa-fw"></i>
                    <i class="fa fa-star fa-fw"></i>
                    <i class="fa fa-star fa-fw"></i>
                    <i class="fa fa-star fa-fw"></i>
                  </div>

                  <div class="hotel-content-flex">
                    <div class="recomended-hotel-content-title">
                      {{$hotel->hotel_name}}
                    </div>

                    <div class="d-flex flex-column">
                      <!-- <div class="text-secondary from-style">from</div>
                      <div class="hotel-content-currency">USD59</div> -->
                    </div>
                  </div>

                  <div
                    class="recomended-hotel-content-location">{{GnrCity::where('city_code',$hotel->city_code)->first()->city_name}}
                    , {{$hotel->country_code}}</div>
                </div>
              </a>
            </div>
          @endforeach

        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next swiper-button-white"></div>
        <div class="swiper-button-prev swiper-button-white"></div>
      </div>
    </div>
  </section>
  <!-- end hotels -->

  <!-- start green -->
  <section class="green">
    <div class="container">
      <div class="green-flex">
        <div class="green-item">
          <div class="green-number">500 <span>k</span></div>
          <div class="green-name">hotels</div>
        </div>

        <div class="green-item">
          <div class="green-number">200 <span>+</span></div>
          <div class="green-name">Countries</div>
        </div>

        <div class="green-item">
          <div class="green-number">75</div>
          <div class="green-name">Hotel Suppliers</div>
        </div>

        <div class="green-item">
          <div class="green-number">2</div>
          <div class="green-name">languages</div>
        </div>

        <div class="green-item">
          <div class="green-number">24/7</div>
          <div class="green-name">Support</div>
        </div>
      </div>
    </div>
  </section>
  <!-- end green -->

  <!-- start Support -->
  <section class="support">
    <div class="container">
      <div class="row">
        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="support-box">
            <div class="support-box-img">
              <img src="/agent/img/img1.png" class="img-fluid" alt="">
            </div>
            <div class="support-box-title">
              Refundable options available
            </div>
            <p>
              Choose from multiple packages according to your needs. Want to secure the lowest price first and cancel
              later? Ensure you book the refundable options.
            </p>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="support-box">
            <div class="support-box-img">
              <img src="/agent/img/img2.png" class="img-fluid" alt="">
            </div>
            <div class="support-box-title">
              Lowest supplier rates
            </div>
            <p>
              No more logging into multiple travel agent portals to compare prices. We compare over 75 suppliers to give
              you the best rates in the market. </p>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="support-box">
            <div class="support-box-img">
              <img src="/agent/img/img3.png" class="img-fluid" alt="">
            </div>
            <div class="support-box-title">
              Multiple payment gateways
            </div>
            <p>
              Prepaid or postpaid, credit card or bank transfer -- choose your preferred payment method. </p>
          </div>
        </div>

        <div class="col-xl-3 col-lg-6 col-md-6">
          <div class="support-box">
            <div class="support-box-img">
              <img src="/agent/img/img4.png" class="img-fluid" alt="">
            </div>
            <div class="support-box-title">
              24/7 Customer Service Support
            </div>
            <p>
              Have a question about your booking? Our customer service agents are available 24/7 by email or call us on
              our toll-free hotline. </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end Support -->
@endsection
