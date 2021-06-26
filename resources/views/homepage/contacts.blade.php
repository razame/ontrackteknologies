@extends('layouts/homepage')

@section('title', 'Reservation')
@section('content')

  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">Contact Us</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">Contact Us</li>
            </ul><!-- Breadcrumbs -->
          </div>
        </div><!-- Page Title Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-50 pb-86">
      <div class="container">
        <div class="contact-wrap w-100">
          <div class="row align-items-center">
            <div class="col-md-5 col-sm-12 col-lg-4">
              <div class="get-in-touch-wrap mt-40 text-white w-100 overflow-hidden brd-rd20"
                   style="background-image: url(/homepage/images/bg12.png) ;">
                <h2 class="mb-0">Get in Touch</h2>
                {{-- <p class="mb-0">UAE HEAD OFFICE</p> --}}
                {{-- <div class="contact-info-box mt-20 d-flex flex-wrap w-100">
                    <i class="fas fa-map-marker-alt"></i>
                    <div class="contact-info-inner">
                        <h4 class="mb-0">Visit Us:</h4>
                        <p class="mb-0">OFFICE 301 OPEL TOWER BUSINESS BAY DUBAI 21150UAE</p>
                    </div>
                </div> --}}
                <div class="contact-info-box mt-20 d-flex flex-wrap w-100">
                  <i class="fas fa-envelope"></i>
                  <div class="contact-info-inner">
                    <h4 class="mb-0">Mail Us:</h4>
                    <p class="mb-0">info@ontrackteknologies.com</p>
                  </div>
                </div>
                <div class="contact-info-box mt-20 d-flex flex-wrap w-100">
                  <i class="fas fa-mobile-alt"></i>
                  <div class="contact-info-inner">
                    <h4 class="mb-0">Phone Us:</h4>
                    <p class="mb-0">+8 (123) 985 789</p>
                  </div>
                </div>
                <div class="scl-links2 mt-40 w-100">
                  <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                  <a href="javascript:void(0);" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                  <a href="javascript:void(0);" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                  <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-weixin"></i></a>
                </div>
              </div>
            </div>
            <div class="col-md-7 col-sm-12 col-lg-8">
              <div class="contact-form-wrap contact-form mt-40 w-100">
                @if (Session::has('success'))
                  <div class="alert alert-success">
                    <ul>
                      <li>{!! Session::get('success') !!}</li>
                    </ul>
                  </div>
                @endif
                <h2 class="mb-0">Send a Message</h2>
                <form class="w-100" action="{{url('/contact-us-send-message')}}" method="post" id="email-form">
                  @csrf
                  <div class="form-group">
                    <div class="response"></div>
                  </div>

                  <div class="row mrg20">
                    <div class="col-md-6 col-sm-6 col-lg-6">
                      <input class="w-100 mt-20 fname" type="text" name="firstname" value="" placeholder="First Name *"
                             required>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6">
                      <input class="w-100 mt-20 lname" type="text" name="lastname" value="" placeholder="Last Name *"
                             required>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6">
                      <input class="w-100 mt-20 email" type="email" name="email" value="" placeholder="Email *"
                             required>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6">
                      <input class="w-100 mt-20 phone" type="text" name="phone" value="" placeholder="Phone" required>
                    </div>
                    <div class="col-md-12 col-sm-12 col-lg-12">
                      <textarea class="w-100 mt-20 contact_message" value="" name="message" placeholder="Message"
                                required></textarea>
                      <button class="theme-btn fill-btn2 mt-20" id="submit" type="submit">Send A Message</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div><!-- Contact Wrap -->

      </div>
    </div>
  </section>
  <!-- <section>
    <div class="w-100 pt-155 pb-70 position-relative">
      <div id="particles4" class="particles-js top-left" data-color="#ff4747" data-saturation="300" data-size="40" data-count="8" data-speed="2" data-hide="770" data-image="assets//"></div>
      <div class="container">
        <div class="sec-title2 mb-50 text-center w-100">
          <div class="d-inline-block">
            <h2 class="mb-0 text-uppercase text-color16 mini-bar"><span class="text-color17">Need</span>help?</h2>
          </div>
        </div>
        <div class="service-wrap3 text-center w-100">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">UAE HEAD OFFICE </h3>
                <p class="">OFFICE 301 OPEL TOWER BUSINESS BAY DUBAI 21150UAE </p>
                <h5 class="text-color7">Email :</h5>
                <h5>support@tripserb2b.ae </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">GEORGIA OFFICE </h3>
                <p class="">Georgia, City Kutaisi, Evdoshvili Str., N76B</p>
                <h5 class="text-color7">Email :</h5>
                <h5>support@tripserb2b.ge </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">MONTENEGRO OFFICE  </h3>
                <p class="">SUNČANA OBALA BR. 152 ZELENIKA HERCEG NOVI, MONTENEGRO  </p>
                <h5 class="text-color7">Email :</h5>
                <h5>support@tripserb2b.me </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">NIGERIA OFFICE </h3>
                <p class="">17, Odewale street Alausa-Ikeja, Lagos Nigeria. </p>
                <h5 class="text-color7">Email :</h5>
                <h5>nigeria@tripserb2b.africa </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">RWANDA OFFICE  </h3>
                <p class="">Kimironko, Gasabo, Umujyi wa Kigali, RWANDA </p>
                <h5 class="text-color7">Email :</h5>
                <h5>Rwanda@tripserb2b.africa </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">MAURITIUS OFFICE </h3>
                <p class="">61, Queen Street Rose Hill Mauritius </p>
                <h5 class="text-color7">Email :</h5>
                <h5>Mauritius@tripserb2b.africa </h5>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-4">
              <div class="service-box3 position-relative w-100">
                <span class="icon3 d-inline-block"><i class="metaicon-location"></i></span>
                <h3 class="mb-0">UZBEKISTAN office</h3>
                <h5 class="text-color7 mt-3">Email :</h5>
                <h5>support@tripserb2b.uz </h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->


@endsection
