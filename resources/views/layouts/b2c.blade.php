<!DOCTYPE html>
<html lang="en">

<head>
  <title>Tripser B2C - @yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/b2c/css/styles.css"/>

  <meta name="csrf-token" content="{{ csrf_token() }}"/>
  <link rel="icon" href="/images/favicon.png"> <!-- favicon -->
</head>

@if(isset($internal) AND $internal)
  <body class="bg-light">
  <div class="header other-header">
    @else
      <body>
      <div class="header index-header">
        @endif


        <div class="system-navbar">
          <nav class="navbar navbar-expand justify-content-end">
            <a class="navbar-logo" href="/">
              <img src="/b2c/images/logo.svg" alt="brisco-travel-logo">
            </a>
            @if(isset($internal) AND $internal)
              <div class="d-flex justify-content-between mx-auto header-nav-tabs">
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
              </div>
            @endif

            <ul class="navbar-nav">
              <li class="nav-item">
                <div class="navbar-control">
                  <button type="button" class="btn btn-toggle focus active" data-toggle="button" aria-pressed="false"
                          autocomplete="off">
                    <div class="handle"></div>
                  </button>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="navbar-locale-selector dropdown-toggle" data-toggle="dropdown">
                  <span class="navbar-locale-text">UAH</span>
                  <div class="dropdown dropdown-currency">
                    <div class="dropdown-menu">
                      <div class="dropdown-item blue"><span class="mr-3 blue">RUB</span>Ruble <i
                          class="fa fa-check float-right"></i></div>
                      <div class="dropdown-item"><span class="mr-3">EUR</span>Euro</div>
                      <div class="dropdown-item"><span class="mr-3">USD</span>Dollar</div>
                      <div class="dropdown-item"><span class="mr-3">CNY</span>Yuan</div>
                      <div class="dropdown-item"><span class="mr-3">UAH</span>Hryvnia</div>
                      <div class="dropdown-item"><span class="mr-3">KZT</span>Tenge</div>
                      <div class="dropdown-item"><span class="mr-3">AZN</span>Manat</div>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="navbar-services-icon dropdown-toggle" data-toggle="dropdown">
                  <img src="/b2c/images/menu-icon.png" class="mx-auto" alt="">
                  <div class="dropdown">
                    <div class="dropdown-menu navbar-user-dropshow">
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-code-branch fa-fw"></i><span>Low Price Map</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-calendar-alt fa-fw fa-lg"></i><span>Low Price Calendar</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-robot fa-fw fa-lg"></i><span>Bot Low Prices</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-file fa-fw fa-lg"></i><span>travel Articles</span>
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fa fa-fire fa-fw fa-lg"></i><span>special Offers</span>
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item dropdown">
                <div class="navbar-user-logged-in dropdown-toggle" data-toggle="dropdown">M</div>
                <div class="dropdown">
                  <div class="dropdown-menu navbar-user-dropshow">
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-history fa-fw"></i><span>History</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-bell fa-fw fa-lg"></i><span>Tickets</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-stamp fa-fw fa-lg"></i><span>Documents</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-percent fa-fw fa-lg"></i><span>Contests</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-envelope fa-fw fa-lg"></i><span>Subscriptions</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-cog fa-fw fa-lg"></i><span>Settings</span>
                    </a>
                    <a class="dropdown-item" href="settings.html">
                      <i class="fa fa-sign-out-alt fa-fw fa-lg"></i><span>go Out</span>
                    </a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
        </div>
        @yield('header')
      </div>

      <!---------- END HEADER --------->

      <!---------- MAIN CONTENT -------->

      @yield('content')
      <!------------------- FOOTER -------------------->
      <div class="container-fluid border-top include-bottom">
        <div class="row">
          <div class="col-lg-11 mx-auto top-footer">
            <div class="row">
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">COUNTRIES</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
                <a href="" class="all-link">All countries <i class="fa fa-arrow-right fa-fw"></i></a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">CITIES</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
                <a href="" class="all-link">All cities <i class="fa fa-arrow-right fa-fw"></i></a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">AIRLINES</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
                <a href="" class="all-link">All airlines <i class="fa fa-arrow-right fa-fw"></i></a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">AIRPORTS</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
                <a href="" class="all-link">All airports <i class="fa fa-arrow-right fa-fw"></i></a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">SERVICES</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-4 col-6">
                <div class="top-footer-title">DIRECTIONS</div>
                <a href="">Russia</a>
                <a href="">Thailnad</a>
                <a href="">Cyprus</a>
                <a href="">Bulgaria</a>
                <a href="">Georgia</a>
              </div>
            </div>
          </div>

          <!--------------- SOCIAL -------------->

          <div class="col-lg-12 border-top pt-4">
            <div class="row">
              <div class="col-lg-6 mx-auto text-center social-footer">
                <div class="social-row">
                  <div class="social-item"><a href=""><i class="fab fa-wikipedia-w fa-fw mr-1"></i> in contact with</a>
                  </div>
                  <div class="social-item"><a href=""><i class="fab fa-facebook fa-fw mr-1"></i> facebook</a></div>
                  <div class="social-item"><a href=""><i class="fab fa-instagram fa-fw mr-1"></i> instagram</a></div>
                  <div class="social-item"><a href=""><i class="fab fa-twitter fa-fw mr-1"></i> twitter</a></div>
                  <div class="social-item"><a href=""><i class="fab fa-viber fa-fw mr-1"></i> vibe</a></div>
                </div>
                <a href="" class="btn btn-outline app-store-btn">
                  <i class="fab fa-apple fa-fw"></i>APP STORE
                </a>
                <a href="" class="btn btn-outline ml-3 google-play-btn">
                  <i class="fab fa-google-play fa-fw"></i>GOOGLE PLAY
                </a>
                <ul class="list-inline mb-1 useful-link">
                  <li class="list-inline-item"><a href="">About company <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">Affiliate program <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">Advertising <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">Press center <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">Jobs <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">Help <i class="fa fa-circle fa-fw"></i></a></li>
                  <li class="list-inline-item"><a href="">rules</a></li>
                </ul>
                <div class="col-lg-12 copy-right text-center"><i class="fa fa-copyright fa-fw"></i> 2007-2020, tripser -
                  cheap
                  flights
                </div>
              </div>
            </div>
          </div>

          <!--------------- FOOTER -------------->

          <div class="col-lg-12 footer">
            <div class="col-lg-11 mx-auto">
              <ul class="list-unstyled mb-0 footer-list">
                <li class="footer-item list-inline-item">
                  <a href="">
                    <div class="footer-white-square d-inline-block">KZ</div>
                    Flight tickets Kazakhstan
                  </a>
                </li>
                <li class="footer-item list-inline-item">
                  <a href="">
                    <div class="footer-white-square d-inline-block">BY</div>
                    Flight tickets Belarus
                  </a>
                </li>
                <li class="footer-item list-inline-item">
                  <a href="">
                    <div class="footer-white-square d-inline-block">UZ</div>
                    Flight tickets Uzbekistan
                  </a>
                </li>
                <li class="footer-item list-inline-item">
                  <a href="">
                    <i class="fa fa-camera fa-rotate-90"></i> Search and book hotels
                  </a>
                </li>
                <li class="footer-item list-inline-item">
                  <a href=""><i class="fab fa-tumblr fa-fw"></i>White Label Flights</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <script src="/b2c/js/jquery-3.2.1.min.js"></script>
      <script src="/b2c/js/popper.min.js"></script>
      <script src="/b2c/js/bootstrap.js"></script>
      <script src="/b2c/js/select2.min.js"></script>
      <script src="/b2c/js/jquery-ui.js"></script>
      <script src="/b2c/js/swiper.min.js"></script>
      <script src="/b2c/js/jquery.mask.js"></script>
      <script src="/b2c/js/t-datepicker.min.js"></script>
      <script src="/b2c/js/script.js"></script>
      @yield('scripts')
      @yield('page-script')
      </body>

</html>
