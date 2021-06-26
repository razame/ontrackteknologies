@extends('layouts/agent')

@section('title', 'Contact Us')
@section('content')

  @include('panels._agent_internal_header')


  <!-- ================================= CONTENT ===============================-->

  <section class="main contactus">
    <div class="container">
      <div class="bg-white">
        <h1 class="hotels-title">Need Help?</h1>
        <div class="row">
          <!--<div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">UAE HEAD OFFICE</div>
              <div class="address-box-address">office 301 opel tower business bay dubai 21150uae</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">support@tripserb2b.ae</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">GEORGIA OFFICE</div>
              <div class="address-box-address">Georgia, City Kutaisi, Evdoshvili Str., N76B</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">support@tripserb2b.ge</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">MONTENEGRO OFFICE</div>
              <div class="address-box-address">SUNČANA OBALA BR. 152 ZELENIKA HERCEG NOVI, MONTENEGRO</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">support@tripserb2b.me</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">NIGERIA OFFICE</div>
              <div class="address-box-address">17, Odewale street Alausa-Ikeja, Lagos Nigeria.</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">nigeria@tripserb2b.africa</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">RWANDA OFFICE</div>
              <div class="address-box-address">Kimironko, Gasabo, Umujyi wa Kigali, RWANDA</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">Rwanda@tripserb2b.africa</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">MAURITIUS OFFICE</div>
              <div class="address-box-address">61, Queen Street Rose Hill Mauritius</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">Mauritius@tripserb2b.africa</div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6">
            <div class="address-box">
              <div class="address-box-icon"><i class="fa fa-map-marker-alt fa-fw"></i></div>
              <div class="address-box-title">UZBEKISTAN office</div>
              <div class="address-box-emailtitle">Email :</div>
              <div class="address-box-email">support@tripserb2b.uz</div>
            </div>
          </div>-->
 <section>
    <div class="w-100 pt-50 pb-86">
      <div class="container">
        <div class="contact-wrap w-100">
          <div class="row align-items-center">
            <div class="col-xl-4">
              <div class="get-in-touch-wrap mt-40 text-white w-100 overflow-hidden brd-rd20"
                   style="background-image: url(/homepage/images/bg12.png) ;">
                <h2 class="mb-4">Get in Touch</h2>
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
                    <p class="mb-0">support@tripserb2b.com</p>
                  </div>
                </div>
                <div class="contact-info-box mt-20 d-flex flex-wrap w-100">
            
                 
                </div>
                <div class="scl-links2 mt-40 w-100">
                  <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
                  <a href="javascript:void(0);" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
                  <a href="javascript:void(0);" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
                  <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-weixin"></i></a>
                </div>
              </div>
            </div>
            <div class="col-xl-8">
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
        </div>
      </div>
    </div>
  </section>
@endsection
