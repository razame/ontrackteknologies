@extends('layouts/fullLayoutMaster')

@section('title', 'Login Page')

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
      <div><span style="font-size:20pt">Tripser | 7/24</span></div>
      <div><a href="/agents/register" class="btn btn-outline-primary float-left btn-inline">Register</a></div>
    </div>
    <div class="col-xl-8 col-11 d-flex justify-content-center">
      <div class="card bg-authentication rounded-0 mb-0 w-60">
        <div class="row m-0">
          <div class="col-lg-12 col-12 p-0">
            <div class="card rounded-0 mb-0 px-2">
              <div class="card-header pb-1">
                <div class="card-title">
                  <h4 class="mb-0">Login</h4>
                </div>
              </div>
              <p class="px-2">Welcome back, please login to your account.</p>
              <div class="card-content">
                <div class="card-body pt-1">
                  <form method="POST" action="{{ route('authenticate') }}">
                    @csrf
                    @if($errors->any())
                      <h5 class="alert alert-warning">{{$errors->first()}}</h5>
                    @endif

                    <fieldset class="form-label-group form-group position-relative has-icon-left">
                      <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                             name="email" placeholder="E-Mail Address" value="{{ old('email') }}" required
                             autocomplete="email"
                             autofocus>

                      <div class="form-control-position">
                        <i class="feather icon-user"></i>
                      </div>
                      <label for="email">E-Mail Address</label>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                    </fieldset>

                    <fieldset class="form-label-group position-relative has-icon-left">

                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                             name="password" placeholder="Password" required autocomplete="current-password">

                      <div class="form-control-position">
                        <i class="feather icon-lock"></i>
                      </div>
                      <label for="password">Password</label>
                      @error('password')
                      <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                      @enderror
                    </fieldset>
                    <div class="form-group d-flex justify-content-between align-items-center">
                      <div class="text-left">
                        <fieldset class="checkbox">
                          <div class="vs-checkbox-con vs-checkbox-primary">
                            <input type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                            <span class="vs-checkbox">
                            <span class="vs-checkbox--check">
                              <i class="vs-icon feather icon-check"></i>
                            </span>
                          </span>
                            <span class="">Remember me</span>
                          </div>
                        </fieldset>
                      </div>
                      @if (Route::has('password.request'))
                        <div class="text-right"><a class="card-link" href="{{ route('password.request') }}">
                            Forgot Password?
                          </a></div>
                      @endif

                    </div>

                    <button type="submit" class="btn btn-primary float-right btn-inline mb-2">Login</button>
                  </form>
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
        <a href="#" data-toggle="modal" data-target="#default">Legal Information</a>
        <a href="#" data-toggle="modal" data-target="#default1">Technical Support</a>

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

        <img src="{{ asset('images/ssl-secure-logo-png.png') }}" class="" style="width:140px" alt="pci">
        <img src="{{ asset('images/visa mastercard logo.png') }}" class="" style="width:140px" alt="pci">
      </div>
      <div class="footer-dark-item">

      </div>

    </div>


  </section>


  <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
       style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">{{$legal_information['page_title']}}</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <h5>{{$legal_information['page_title']}}</h5>
          <p>{!! $legal_information['content'] !!}</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Accept</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade text-left" id="default1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
       style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel1">{{$legal_information['page_title']}}11</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

          {!! $technical_support['content'] !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary waves-effect waves-light" data-dismiss="modal">Accept</button>
        </div>
      </div>
    </div>
  </div>
@endsection
