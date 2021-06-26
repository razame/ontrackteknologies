<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tripser B2B - @yield('title')</title>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link href="/agent/css/login-styles.css" rel="stylesheet"/>
  <link href="/agent/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="/agent/css/fontawesome.min.css" rel="stylesheet"/>
  <link href="/agent/css/swiper.min.css" rel="stylesheet"/>
  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <link rel="icon" href="/images/favicon.png"> <!-- favicon -->

</head>

<body>
@yield('content')
<!-- The Modal -->
<div class="modal login-modal" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form method="POST" action="{{ route('authenticate') }}">
      @csrf
      <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title login-moda-title">Log in</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for=""><span class="red-star">*</span> Email</label>
            <input type="text" dir="ltr" class="form-control" name="email">
          </div>

          <div class="form-group">
            <label for=""><span class="red-star">*</span> Password</label>
            <input type="password" dir="ltr" class="form-control" name="password">
          </div>

          <div class="header-buttons mt-5 mb-4">
            <button type="submit" class="btn modal-login-btn">Login</button>

            {{--            <a href="" class="modal-forget-btn" data-toggle="modal" data-target="#myModal" style="width:160px">forget--}}
            {{--              password</a>--}}
          </div>

          <div class="agreement">
            By logging in, I agree to TripserB2B's <a href="/agents/agent-contracts">Agent Contract</a>, <a
              href="/agents/term-of-use">Terms of Use</a> and <a href="/agents/privacy-policy">Privacy Policy</a> .
          </div>
        </div>
      </form>

      <!-- Modal footer -->
      <div class="modal-footer">
        No account yet? <a href="/agents/register" class="regiser-text ml-1">Register </a>
      </div>
    </div>
  </div>
</div>

<!-- start footer -->
<section class="footer">
  <div class="container">
    <ul class="list-unstyled list-inline">
      <li class="list-inline-item">
        <a href="{{route('agentsAboutUs')}}">About us</a>
      </li>
      <li class="list-inline-item">
        <a href="{{route('agentsLegalinformation')}}">legal information</a>
      </li>
      <li class="list-inline-item">
        <a href="{{route('agentsTechnicalSupport')}}">technical support </a>
      </li>
      <li class="list-inline-item">
        <a href="{{route('agents3DSecure')}}">3D secure</a>
      </li>
      <li class="list-inline-item">
        <a href="{{route('agentsContactUs')}}">contact us</a>
      </li>
    </ul>
  </div>
</section>
<!-- end footer -->

<!-- start copy -->
<section class="copy">
  <div class="container">
    <div class="copy-wrapper">
      <div class="footer-images">
        <div class="footer-images-item">
          <img src="/agent/img/f1.JPG" class="img-fluid" alt="">
        </div>
        <div class="footer-images-item">
          <img src="/agent/img/f2.png" class="img-fluid" alt="">
        </div>
        <div class="footer-images-item">
          <img src="/agent/img/f3.PNG" class="img-fluid" alt="">
        </div>
      </div>
      <div>Copyright TRIPSER B2B {{date('Y')}}</div>
    </div>
  </div>
</section>
<!-- end copy -->

<script src="/agent/js/jquery.js"></script>
<script src="/agent/js/popper.min.js"></script>
<script src="/agent/js/bootstrap.min.js"></script>
<script src="/agent/js/swiper.min.js"></script>
<script src="/agent/js/script.js"></script>
@yield('scripts')
</body>

</html>
