@extends('layouts/fullLayoutMaster')

@section('title', 'Register completed')

@section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/pages/authentication.css')) }}">
@endsection

@section('content')
  <section class="row flexbox-container">
    <div class="col-12 p-0 auth-header">
      <div>
        <img src="{{ asset('images/logo/tripser-dark.png') }}" class="img-fluid" alt="branding logo">
      </div>
      <div><a href="tel:908506224003" class="auth-header-tel"></a>Tripser | 7/24</div>
      <div></div>
    </div>
    <div class="col-xl-8 col-11 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0 w-60">
        <div class="row m-0">
          <div class="col-lg-12 col-12 p-0">
            <div class="card rounded-0 mb-0 px-2">
              <div class="card-header pb-1">
                <div class="card-title">
                  <h4 class="mb-0">THANK YOU FOR REGISTERING</h4>
                </div>
              </div>
              <p class="px-2">we will get back to you soon!</p>
              <div class="card-content">
                <div class="card-body pt-1">


                  <a href="http://ontrackteknologies.com" class="btn btn-primary float-right btn-inline mb-2">Back to
                    Home</a>

                </div>
              </div>
            <!-- <div class="login-footer">
              <div class="divider">
                <div class="divider-text"></div>
              </div>
              {{-- <div class="footer-btn d-inline">
                <a href="#" class="btn btn-facebook"><span class="fab fa-facebook"></span></a>
                <a href="#" class="btn btn-twitter white"><span class="fab fa-twitter"></span></a>
                <a href="#" class="btn btn-google"><span class="fab fa-google"></span></a>
                <a href="#" class="btn btn-github"><span class="fab fa-github-alt"></span></a>
              </div> --}}
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-12 p-0 authentication-footer">
      <div class="authentication-footer-logo">
        <img src="{{ asset('images/logo/tripser-dark.png') }}" class="img-fluid" alt="branding logo">
      </div>
      <div class="footer-links mb-1">
        <a href="https://ontrackteknologies.com/about">About Us</a>
        <a href="https://ontrackteknologies.com/legal-information">Legal Information</a>
        <a href="https://ontrackteknologies.com/3d-secure">Technical Support</a>

      </div>
      <div class="footer-links">
        <a href="https://ontrackteknologies.com/contacts">Contact Us</a>
        <a href="https://ontrackteknologies.com/3d-secure">3d Secure</a>
      </div>
      <div class="authentication-footer-address mt-2">
        OFFICE 301 OPEL TOWER BUSINESS BAY DUBAI 21150UAE
      </div>
      <div class="authentication-footer-tel mb-1">
        Email: support@tripserb2b.ae
      </div>
    </div>

    <div class="authentication-footer-dark">
      <div class="footer-dark-item">&copy 2020 TripserB2B.com</div>
      <div class="footer-dark-item footer-dark-item-security">
        Telif Hakkı
        <img src="{{ asset('images/pci.png') }}" class="img-fluid" alt="pci">
      </div>
      <div class="footer-dark-item">
        odeme
        <img src="{{ asset('images/visa.png') }}" class="img-fluid" alt="visa">
        <img src="{{ asset('images/mastercard.png') }}" class="img-fluid" alt="mastercard">
        <img src="{{ asset('images/uni.png') }}" class="img-fluid" alt="">
      </div>
      <div class="footer-dark-item">
        <a href="" class="footer-social">
          <i class="fa fa-facebook fa-fw"></i>
        </a>
        <a href="" class="footer-social">
          <i class="fa fa-instagram fa-fw"></i>
        </a>
      </div>
    </div>


  </section>
@endsection
