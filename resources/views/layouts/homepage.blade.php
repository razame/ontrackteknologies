<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="/homepage/images/favicon.png.html" sizes="32x32" type="image/png">
  <title>{{$site_title}} - @yield('title')</title>
  <meta name="description" content="{{$site_description}}">
  <meta name="keywords" content="{{$site_keywords}}">
  <link rel="stylesheet" href="/homepage/css/all.min.css">
  <link rel="stylesheet" href="/homepage/css/flaticon.css">
  <link rel="stylesheet" href="/homepage/css/animate.min.css">
  <link rel="stylesheet" href="/homepage/css/bootstrap.min.css">
  <link rel="stylesheet" href="/homepage/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/homepage/css/owl.carousel.min.css">
  <link rel="stylesheet" href="/homepage/css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="/homepage/css/perfect-scrollbar.css">
  <link rel="stylesheet" href="/homepage/css/slick.css">
  <link rel="stylesheet" href="/homepage/css/style.css">
  <link rel="stylesheet" href="/homepage/css/responsive.css">
  <link rel="stylesheet" href="/homepage/css/color.css">

  <!-- REVOLUTION STYLE SHEETS -->
  <link rel="stylesheet" href="/homepage/css/revolution/settings.css">
  <!-- REVOLUTION LAYERS STYLES -->
  <link rel="stylesheet" href="/homepage/css/revolution/layers.css">
  <!-- REVOLUTION NAVIGATION STYLES -->
  <link rel="stylesheet" href="/homepage/css/revolution/navigation.css">
  <!-- EXTERNAL CSS -->
  <link rel="stylesheet" href="/homepage/css/custom.css">
</head>
<body>
<main>
  <div id="mta-page-loader-container" class="mta-loader-container style1">
    <div id="mta-page-loader" class="mta-loader">
      <div class="inner"></div>
      <img class="loader-logo" src="/homepage/images/loader-logo.png" alt="Loader Logo">
    </div>
  </div>
  <header class="stick style1 logo-left">
    <div class="container d-flex flex-row justify-content-between flex-nowrap">
      <div class="header-nav-wrap w-100">
        <nav class="nav-wrap d-flex flex-row align-items-center justify-content-between flex-nowrap">
          <div class="menu-wrap d-flex flex-row justify-content-start flex-nowrap w-100">
            <div class="logo">
              <a class="desktop-logo" href="/" title="Home">
                <img class="default-logo img-fluid" src="/homepage/images/ontrack.png" alt="Logo"
                     srcset="/homepage/images/ontrack.png 2x">
                <img class="sticky-logo img-fluid" src="/homepage/images/dark-logo.png" alt="Logo"
                     srcset="/homepage/images/dark-logo.png 2x">
              </a>
            </div><!-- Logo -->
            <div class="menu d-flex flex-row align-items-center justify-content-end flex-nowrap w-100">
              <ul
                class="main-menu mb-0 list-unstyled d-flex flex-row align-items-center justify-content-start flex-wrap">
                <!-- <li class="main-menu_li"><a href="https://tripserb2b.com/auth-login" title="">Login</a></li> -->
              <!-- <li class="main-menu_li"><a href="{{route('guest-register-form')}}" title="">Register</a></li> -->
                <li class="menu-item-has-children language-btn-active"><a href="javascript:void(0);" title="">EN</a>
                  <ul class="children mb-0 list-unstyled language-btn">
                    <li><a title="">EN</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- Menu -->
          </div><!-- Menu Wrap -->

        </nav>
      </div><!-- Header Nav Wrap -->
    </div>
  </header><!-- Header -->
  <!-- <div class="header-search d-flex flex-wrap justify-content-center align-items-center w-100">
<span class="search-close-btn"><i class="metaicon-cancel-music"></i></span>
<form>
<input type="text" placeholder="Search">
</form>
</div> -->
  <div class="responsive-header w-100">
    <div class="responsive-topbar w-100">
      <div class="container d-flex flex-wrap justify-content-between">
        <div class="logo">
          <a href="/" title="Home"><img class="img-fluid" width="180px" src="/homepage/images/ontrack.png"
                                        alt="Logo"></a>
        </div><!-- Logo -->
        <div class="menu-right-icons text-white d-flex flex-row align-items-center justify-content-end flex-nowrap">
          <span class="responsive-menu-btn"><i class="fas fa-align-justify"></i></span>

        </div>
      </div>
    </div>
    <div class="responsive-menu">
      <div class="logo d-inline-block w-100">
        <a href="/" title="Home"><img class="img-fluid" src="/homepage/images/dark-logo.png" alt="Logo"></a>
      </div>
      <ul class="mb-0 list-unstyled">
        <!-- <li class="active-menu"><a href="/" title="">Home</a></li> -->
        <!-- <li><a href="/auth-login" title="">Login</a></li>
        <li class="menu-item-has-children language-btn-active"><a href="javascript:void(0);" title="">EN</a>
            <ul class="children mb-0 list-unstyled language-btn">
                <li><a title="">EN</a></li>

            </ul> -->
        </li>
      </ul>
    </div><!-- Responsive Menu -->
  </div><!-- Responsive Header -->
  @yield('content')

  <footer>
    <div class="w-100 pt-70 bg-color14 text-color15 position-relative">
      <div class="scroll-top-btn position-absolute"><a href="javascript:void(0);" title=""><i
            class="metaicon-arrow-pointing-to-up"></i></a></div>
      <div class="container">
        <div class="footer-wrap d-flex flex-wrap w-100">
          <div class="footer-about">
            <div class="logo d-block">
              <a href="/" title="Home"><img class="img-fluid" src="/homepage/images/ontrack.png"
                                            style="max-width:185px;height:auto" alt="Footer Logo"></a>
            </div><!-- Logo -->
            <p class="mb-0">{{$site_about_ontrack}} </p>
          </div><!-- Footer About -->
          <div class="footer-widget-wrap">
            <div class="row">
              <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="widget w-100">
                  <h4 class="text-white">Services</h4>
                  <ul class="mb-0 list-unstyled">
                    <li><a href="https://tripserb2b.com/agents" title="">B2B Portal</a></li>
                    <li><a href="/b2c_travel_portal" title="">B2C Portal Service</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="widget w-100">
                  <h4 class="text-white">About</h4>
                  <ul class="mb-0 list-unstyled">
                    <li><a href="/" title="">Home</a></li>
                    <li><a href="/about" title="">About OnTrack</a></li>
                    <li><a href="/contacts" title="">Contact Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-3">
                <div class="widget w-100">
                  <h4 class="text-white">Links</h4>
                  <ul class="mb-0 list-unstyled">
                    <li><a href="/privacy-policy" title="">Privacy Policy </a></li>
                    <li><a href="" title="">Technical Support </a></li>
                    <li><a href="/legal-information" title="">Term and Condition</a></li>
                    <li><a href="/refund-policy" title="">Refund Policy </a></li>
                    <li><a href="/3d-secure" title="">3d Secure </a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-sm-6 col-lg-3">
                <!--Newslatter Form-->
                <div class="widget w-100" id="email-form">
                  <h4 class="text-white">Subscribe</h4>
                  <form class="position-relative w-100" method="post" action="#" id="subscribe-form">
                    <div class="form-group">
                      <div class="response"></div>
                    </div>

                    <input type="email" name="email" class="email" value="" placeholder="Your Email">
                    <button type="button" id="subscribe-newslatters"><i class="metaicon-send-button"></i></button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- Footer Wrap -->
        <div class="footer-content-wrap align-items-center d-flex justify-content-between flex-wrap w-100">
          <div class="footer-content-inner footer-gateway">

            <img src="/homepage/images/payment.png" class="img-fluid" alt="">
          </div>
          <div class="scl-links2">
            <!-- <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="javascript:void(0);" title="Instagram" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="javascript:void(0);" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="javascript:void(0);" title="Youtube" target="_blank"><i class="fab fa-weixin"></i></a> -->
          </div>
        </div><!-- Footer Content Wrap -->
        <div class="copyright w-100">
          <p class="mb-0">{{$site_copyrights_text}}</p>
        </div><!-- Copyright -->
      </div>
    </div>
  </footer>
</main><!-- Main Wrapper -->

<script src="/homepage/js/jquery.min.js"></script>
<script src="/homepage/js/popper.min.js"></script>
<script src="/homepage/js/bootstrap.min.js"></script>
<script src="/homepage/js/bootstrap-select.min.js"></script>
<script src="/homepage/js/owl.carousel.min.js"></script>
<script src="/homepage/js/scroll-up-bar.min.js"></script>
<script src="/homepage/js/jquery.fancybox.min.js"></script>
<script src="/homepage/js/counterup.min.js"></script>
<script src="/homepage/js/perfect-scrollbar.min.js"></script>
<script src="/homepage/js/slick.min.js"></script>
<script src="/homepage/js/particles.min.js"></script>
<script src="/homepage/js/particle-int.js"></script>
<script src="/homepage/js/custom-scripts.js"></script>

<script src="/homepage/js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="/homepage/js/revolution/jquery.themepunch.revolution.min.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
<script src="/homepage/js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/homepage/js/revolution/extensions/revolution.extension.video.min.js"></script>
<script src="/homepage/js/revolution/revolution-init.js"></script>
<!-- EXTERNAL JS -->
<script src="/homepage/js/custom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
@yield('page-script')

</body>
</html>
