@extends('layouts.b2c')

@section('title', 'Tripser B2C')
@section('header')
  <div class="search-box text-center">
    <div class="search-box-flight-title">
      <h2 class="search-box-large-title">Search for cheap flights</h2>
      <div class="search-box-small-title">The best way to buy cheap flights</div>
    </div>
    <div class="search-box-hotel-title">
      <h2 class="search-box-large-title">Search for discount hotels</h2>
      <div class="search-box-small-title">book a room at a bargain price!</div>
    </div>

    <div class="d-flex justify-content-center mb-lg-5 mb-md-5 mb-sm-5 mb-0">
      <div class="search-box-tab-btn mr-2">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active flights-tab" data-toggle="tab" href="#flights">Flights</a>
          </li>
          <li class="nav-item">
            <a class="nav-link hotels-tab" data-toggle="tab" href="#hotels">Hotels</a>
          </li>
        </ul>
      </div>
      <div class="search-box-auto-btn mr-2">
        TRANSFER
      </div>
      <div class="search-box-insurance-btn">
        SIGHTSEEING
      </div>
    </div>

    <!-- Tab panes -->
    <div class="tab-content header-tab-content p-2">
      <div class="col-lg-10 mx-auto tab-pane active" id="flights">
        <form action="" method="POST">

          <div class="row">
            <div class="col-lg-5">
              <div class="row">
                <div class="search-field col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="search-field-title">Where</div>
                  <div class="search-field-box select-origin">
                    <div class="change-icon">
                      <i class="fa fa-exchange-alt horizontal-exchange fa-fw"></i>
                      <i class="fa fa-exchange-alt fa-rotate-90 vertical-exchange fa-fw"></i>
                    </div>
                    <select class="form-control select2-flight" id="origin">
                    </select>
                  </div>
                </div>
                <!---->
                <div class="search-field col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="search-field-title">Where</div>
                  <div class="search-field-box">
                    <select class="form-control select2-flight" id="destination">
                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="search-field col-lg-5 col-md-6 col-sm-6 col-12">
              <div class="search-field-box">
                <i class="fa fa-calendar-day calendar-icon"></i>
                <i class="fa fa-times remove-return-date"></i>
                <div class="t-datepicker flight-datepicker">
                  <div class="t-check-in"></div>
                  <div class="t-check-out"></div>
                </div>
              </div>
            </div>
            <div class="search-field col-lg-2 col-md-6 col-sm-6 col-12">
              <div class="search-field-title">PASSENGERS AND CLASS</div>
              <div class="search-field-box select-passenger">
                <div class="select-passenger-count dropdown">
                  <button type="button" class="dropdown-toggle position-relative" data-toggle="dropdown">
                    <div><span class="passenger-count">1</span> passenger</div>
                    <div class="text-muted passenger-flight-class">Economy</div>
                    <i class="fa fa-caret-down fa-fw"></i>
                  </button>
                  <div class="dropdown-menu">
                    <ul class="list-unstyled adults">
                      <li class="list-inline-item">
                        <div class="font-weight-bold">Adults</div>
                        <div class="text-muted">Over 12</div>
                      </li>
                      <li class="list-inline-item mt-2 text-right">
                        <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                        <div class="count-item count-number text-dark">1</div>
                        <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                      </li>
                    </ul>
                    <ul class="list-unstyled children">
                      <li class="list-inline-item">
                        <div class="font-weight-bold">Children</div>
                        <div class="text-muted">2 to 12 years old</div>
                      </li>
                      <li class="list-inline-item mt-2 text-right">
                        <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                        <div class="count-item count-number text-dark">0</div>
                        <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                      </li>
                    </ul>
                    <ul class="list-unstyled infants">
                      <li class="list-inline-item">
                        <div class="font-weight-bold">Infants</div>
                        <div class="text-muted">up to 2 years old, no place</div>
                      </li>
                      <li class="list-inline-item mt-2 text-right">
                        <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                        <div class="count-item count-number text-dark">0</div>
                        <div class="tooltipx count-item count-plus count-item-blue">
                          <i class="fa fa-plus fa-fw"></i>
                          <span class="tooltiptext">
                                                            No more than one youngster (without a seat) per adult.
                                                            if there are more babies add more passengers in the category.
                                                        </span>
                        </div>
                      </li>
                    </ul>
                    <div class="dropdown-divider"></div>
                    <div class="custom-control custom-radio m-2">
                      <input type="radio" class="custom-control-input" id="economy" name="flight-class" checked>
                      <label class="custom-control-label" for="economy">Economy</label>
                    </div>
                    <div class="custom-control custom-radio m-2">
                      <input type="radio" class="custom-control-input" id="comfort" name="flight-class">
                      <label class="custom-control-label" for="comfort">Comfort</label>
                    </div>
                    <div class="custom-control custom-radio m-2">
                      <input type="radio" class="custom-control-input" id="business" name="flight-class">
                      <label class="custom-control-label" for="business">Business</label>
                    </div>
                    <div class="custom-control custom-radio m-2">
                      <input type="radio" class="custom-control-input" id="first-grade" name="flight-class">
                      <label class="custom-control-label" for="first-grade">First grade</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button class="btn search-form-submit mt-lg-5 mt-md-5 mt-sm-5 mt-2">Find tickets <i
                class="fa fa-plane fa-fw fa-lg ml-1"></i></button>
          </div>
        </form>
      </div>
      <!---->
      <div class="col-lg-10 mx-auto tab-pane fade" id="hotels">
        <form action="{{route('B2CHotelSearching')}}" method="GET">
          @csrf
          <div class="row">
            <div class="col-lg-5">
              <div class="row">
                <div class="search-field col-lg-12">
                  <input type="hidden" name="client_nationality" value="AE">
                  <div class="search-field-title">CITY OR HOTEL</div>
                  <div class="search-field-box select-hotel-box">
                    <select class="form-control select2-hotel" name="location">

                    </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="search-field col-lg-5 col-md-6 col-sm-6 col-12">
              <div class="search-field-box">
                <i class="fa fa-calendar-day calendar-icon"></i>
                <i class="fa fa-times remove-return-date"></i>
                <div class="t-datepicker hotel-datepicker">
                  <div class="t-check-in"></div>
                  <div class="t-check-out"></div>
                </div>
              </div>
            </div>
            <div class="search-field col-lg-2 col-md-6 col-sm-6 col-12">
              <div class="search-field-title">GUESTS</div>
              <div class="search-field-box select-guest">
                <div class="select-passenger-count dropdown">
                  <button type="button" class="dropdown-toggle position-relative" data-toggle="dropdown">
                    <div><span class="show-room-count">1</span> Room ,<span class="guest-count">1</span> guest</div>
                    <i class="fa fa-caret-down fa-fw"></i>
                  </button>
                  <div class="dropdown-menu">
                    <div class="room-count">
                      <div class="room-count-change room-minus btn disabled"><i class="fa fa-minus"></i></div>
                      <div class="room-count-text"><span>1</span> Room</div>
                      <div class="room-count-change room-plus btn"><i class="fa fa-plus"></i></div>
                    </div>
                    <div class="room-box-wrapper">
                      <div class="room-box-parent">
                        <div class="selected-room-count">Room <span>1</span></div>

                        <ul class="list-unstyled adult-guests">
                          <li class="list-inline-item">
                            <div class="font-weight-bold mt-2">Adults</div>
                          </li>
                          <li class="list-inline-item mt-2 text-right">
                            <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                            <input class="count-item guest-number text-dark" value="1" name="rooms[1][adults]">
                            <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                          </li>
                        </ul>
                        <ul class="list-unstyled children-guests">
                          <li class="list-inline-item">
                            <div class="font-weight-bold">Children</div>
                            <div class="text-muted age-notify">under 12 years old</div>
                          </li>
                          <li class="list-inline-item mt-2 text-right">
                            <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                            <input class="count-item guest-number text-dark" value="0" name="rooms[1][children]">
                            <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                          </li>
                        </ul>
                        <div class="childrens-age-box"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="text-center">
            <button class="btn search-form-submit mt-lg-5 mt-md-5 mt-sm-5 mt-2">Find hotels <i
                class="fa fa-plane fa-fw fa-lg ml-1"></i></button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@section('content')
  <div class="index-main-content">
    <div class="container">
      <div class="text-center"><img src="/b2c/images/shield.png" class="shield-img" alt=""></div>
      <h2 class="text-center pt-2 title">
        We do not sell airline tickets, but help to find the cheapest. Is free.
      </h2>

      <div class="col-lg-11 mx-auto pt-5 pb-5 index-section-one">
        <div class="row">
          <div class="col-xl-6 col-lg-6 mx-auto">
            <div class="mini-about">
              <p>
                tripser is the largest airline search engine in Russia. We compare all available flight options at your
                request, and then send you for purchase to the official websites of airlines and agencies.
              </p>
              <p class="pt-3">The airfare you see on Aviasales is final. We removed all hidden services and check
                marks.</p>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 mx-auto">
            <div class="popular-question-box">
              <div class="popular-question-box-title">
                <img src="/b2c/images/popular-question.png" class="d-inline-block" alt=""> ANSWERS TO POPULAR QUESTIONS:
              </div>
              <ul class="list-unstyled">
                <li>
                  <a href="">
                    <i class="fa fa-circle fa-fw"></i> Why use Tripser?
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="fa fa-circle fa-fw"></i> Price without commissions and fees?
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="fa fa-circle fa-fw"></i> They will not deceive me?
                  </a>
                </li>
                <li>
                  <a href="">
                    <i class="fa fa-circle fa-fw"></i> Where do you get your tickets from?
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="border-top mt-5 pb-5">
        <h2 class="index-second-title">
          Where to fly? When are plane tickets cheaper? How to track airfare?
        </h2>
        <div class="description text-center">
          Choose the direction and dates with the cheapest flight on the map or calendar of low prices, and in your
          account you will find contests and exclusive discounts from partners.
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="services-box">
              <div class="text-center"><img src="/b2c/images/calendar-flight.png" alt=""></div>
              <div class="service-box-title">The calendar</div>
              <div class="service-box-detail">Find out what dates are cheaper flights.</div>
              <button class="btn-outline btn btn-block">CHECK DATES</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="services-box">
              <div class="text-center"><img src="/b2c/images/map.svg" alt=""></div>
              <div class="service-box-title">Map</div>
              <div class="service-box-detail">Do not know where to buy tickets? That way.</div>
              <button class="btn-outline btn btn-block">VIEW MAP</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="services-box">
              <div class="text-center"><img src="/b2c/images/hotel.svg" alt=""></div>
              <div class="service-box-title">Hotels</div>
              <div class="service-box-detail">Book a room at a bargain price</div>
              <button class="btn-outline btn btn-block">FIND A HOTEL</button>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6" style="margin-bottom: 70px;">
            <div class="services-box">
              <div class="text-center"><img src="/b2c/images/personal.svg" alt=""></div>
              <div class="service-box-title">Personal Area</div>
              <div class="service-box-detail">Competitions, discounts, history and favorites.</div>
              <button class="btn-outline btn btn-block">TO COME IN</button>
            </div>
          </div>

          <!-------------->

          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="media features-box">
              <div class="media-header">
                <div class="features-box-icon"><i class="fa fa-medal fa-fw"></i></div>
              </div>
              <div class="media-body">
                <div class="features-box-title">Top 100</div>
                <div class="features-box-description">The best destinations for weekends and holidays.</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="media features-box">
              <div class="features-box-icon"><i class="fa fa-robot fa-fw"></i></div>
              <div class="media-body">
                <div class="features-box-title">Chat bot</div>
                <div class="features-box-description">For Viber, Facebook, Slack and Telegram.</div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="media features-box">
              <div class="features-box-icon"><i class="fa fa-envelope fa-fw"></i></div>
              <div class="media-body">
                <div class="features-box-title">Subscription</div>
                <div class="features-box-description">We will send a letter if the price of tickets changes.</div>
              </div>
            </div>
          </div>

          <!------------SLIDER BOX----------->

          <div class="col-lg-9 col-md-9 mx-auto slider-box">
            <h2 class="title text-center">Search for tickets and hotels on your phone</h2>
            <div class="description">All the functions of the Aviasales website are always at hand - in the mobile
              application.
            </div>
            <div class="swiper-container">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="/b2c/images/app.webp" alt="">
                  <div class="slider-caption">Special hotel prices for app users.</div>
                </div>
                <div class="swiper-slide">
                  <img src="/b2c/images/app2.jpg" alt="">
                  <div class="slider-caption">Subscribe to price changes for your favorite tickets.</div>
                </div>
                <div class="swiper-slide">
                  <img src="/b2c/images/app3.jpg" alt="">
                  <div class="slider-caption">A search that is easy and fun to use.</div>
                </div>
                <div class="swiper-slide">
                  <img src="/b2c/images/app.webp" alt="">
                  <div class="slider-caption">Special hotel prices for app users.</div>
                </div>
                <div class="swiper-slide">
                  <img src="/b2c/images/app2.jpg" alt="">
                  <div class="slider-caption">Subscribe to price changes for your favorite tickets.</div>
                </div>
              </div>
              <!-- Add Pagination -->
              <div class="swiper-pagination"></div>
              <div class="swiper-button-next"><i class="fal fa-chevron-right"></i></div>
              <div class="swiper-button-prev"><i class="fal fa-chevron-left"></i></div>
            </div>
          </div>

          <div class="col-lg-12 slider-box-buttons d-flex justify-content-center">
            <a href="" class="btn btn-outline">
              <i class="fab fa-apple fa-fw"></i>APP STORE
            </a>
            <a href="" class="btn btn-outline ml-3">
              <i class="fab fa-google-play fa-fw"></i>GOOGLE PLAY
            </a>
          </div>

          <!---------------NEWSLETTER-------------->

          <div class="col-lg-12 text-center newsletter-box">
            <i class="fa fa-envelope-open-text fa-fw newsletter-icon"></i>
            <h2 class="title">Newsletter</h2>
            <div class="description">News, discounts, sales, contests and some art:</div>

            <div class="input-group">
              <input type="text" class="form-control" placeholder="E-mail address">
              <div class="input-group-append">
                <button class="btn blue-btn" type="submit">SUBSCRIBE</button>
              </div>
            </div>

            <div class="newsletter-box-subscribe-description">
              By clicking "Subscribe", you agree to the terms of <a href="">use of the service</a> and the <a href="">processing
                of personal data .</a>
            </div>
          </div>

          <!---------------OFFERS-------------->
          <div class="col-lg-12 offers-box text-center">
            <i class="fa fa-fire fa-fw"></i>
            <h4 class="title">Special Offers</h4>
            <div class="description">
              We know where to buy cheap flights. Airplane tickets to 220 countries. Search and compare airfare prices
              among 100 agencies and 728 airlines.
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <div class="special-box">
                  <div><img src="/b2c/images/airline.png" alt=""></div>
                  <div class="special-box-destination">St. Petersburg</div>
                  <div class="special-box-destination">&#x2708 Krasnoyarsk</div>
                  <div class="offers-days">13 DAYS LEFT</div>
                  <div class="offers-validate">The offer is valid from March 17 to March 31</div>
                  <button class="btn-outline btn btn-block">FROM $6 326</button>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <div class="special-box">
                  <div><img src="/b2c/images/airline.png" alt=""></div>
                  <div class="special-box-destination">St. Petersburg</div>
                  <div class="special-box-destination">&#x2708 Omsk</div>
                  <div class="offers-days">13 DAYS LEFT</div>
                  <div class="offers-validate">The offer is valid from March 17 to March 31</div>
                  <button class="btn-outline btn btn-block">FROM $6 326</button>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <div class="special-box">
                  <div><img src="/b2c/images/airline.png" alt=""></div>
                  <div class="special-box-destination">St. Petersburg</div>
                  <div class="special-box-destination">&#x2708 Sochi (Adler)</div>
                  <div class="offers-days">13 DAYS LEFT</div>
                  <div class="offers-validate">The offer is valid from March 17 to March 31</div>
                  <button class="btn-outline btn btn-block">FROM $6 326</button>
                </div>
              </div>
              <div class="col-lg-3 col-md-6 col-sm-6 text-center">
                <div class="special-box">
                  <div><img src="/b2c/images/airline.png" alt=""></div>
                  <div class="special-box-destination">St. Petersburg</div>
                  <div class="special-box-destination">&#x2708 Orenburg</div>
                  <div class="offers-days">13 DAYS LEFT</div>
                  <div class="offers-validate">The offer is valid from March 17 to March 31</div>
                  <button class="btn-outline btn btn-block">FROM $6 326</button>
                </div>
              </div>
              <div class="col-lg-12">
                <a href="" class="btn btn-outline all-offers-btn">
                  <i class="fa fa-search fa-fw mr-2"></i> ALL SPECIAL OFFERS
                </a>
              </div>
            </div>
          </div>

          <!--------------POPULAR DESTINATION------------->

          <div class="col-lg-12 border-top articles-and-popular">
            <div class="row">
              <div class="col-lg-8 col-md-6">
                <div class="row popular-box">
                  <h4 class="popular-box-title ml-1">
                    <img src="/b2c/images/popular-destination.svg" alt=""> Popular destinations
                  </h4>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse1">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse1" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse2">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse2" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse3">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse3" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse4">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse4" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse5">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse5" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse6">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse6" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse7">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse7" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse8">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse8" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse9">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse9" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse10">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse10" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse11">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse11" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-12 col-sm-6">
                    <div class="card">
                      <div class="card-header position-relative">
                        <a class="card-link" data-toggle="collapse" href="#collapse12">
                          <div class="d-flex justify-content-start">
                            <div><img src="/b2c/images/turkey.svg" alt=""></div>
                            <div>
                              <div class="popular-city">Istanbul</div>
                              <div class="popular-country">Turkey</div>
                            </div>
                          </div>
                          <i class="fa fa-caret-down fa-fw popular-caret-icon"></i>
                          <i class="fa fa-caret-up fa-fw popular-caret-icon" style="display: none;"></i>
                        </a>
                      </div>
                      <div id="collapse12" class="collapse">
                        <div class="card-body">
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                          <a href="">Moscow - Istanbul <span class="float-right">from 2$ 562</span></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!--------------HELP and advice------------->
              <div class="col-lg-4 col-md-6">
                <div class="help-box">
                  <h4 class="help-box-title ml-1">
                    <img src="/b2c/images/help.svg" alt=""> Help and advice
                  </h4>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help1">
                        FAQ
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help1" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help2">
                        How to buy cheap flights
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help2" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help3">
                        Flight with a child - a guide
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help3" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help4">
                        Flight with a child - a guide
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help4" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help5">
                        Flight with a child - a guide
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help5" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header position-relative">
                      <a class="card-link" data-toggle="collapse" href="#help6">
                        Flight with a child - a guide
                        <i class="fa fa-caret-down fa-fw help-caret-icon"></i>
                        <i class="fa fa-caret-up fa-fw help-caret-icon" style="display: none;"></i>
                      </a>
                    </div>
                    <div id="help6" class="collapse">
                      <div class="card-body">
                        We have compiled a list of frequently asked questions about flights, the answers to which will
                        help to purchase a ticket without hassle. We tell you what to do if you bought a ticket, but he
                        didn’t come to the post office, is it possible to change the
                        departure / arrival dates of the purchased tickets, how to pay for a ticket without a credit
                        card
                        and much more (certainly useful).
                        <a href="" class="d-block pt-2 pb-2">READ COMPLETELY <i class="fa fa-arrow-right fa-fw"></i></a>
                      </div>
                    </div>
                  </div>
                  <button class="btn btn-outline btn-block">SEE WHOLE SECTION <i class="fa fa-arrow-right fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
