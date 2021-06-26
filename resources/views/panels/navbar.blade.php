@if($configData["mainLayoutType"] == 'horizontal' && isset($configData["mainLayoutType"]))

  <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarColor'] }} navbar-fixed">

    <div class="navbar-header d-xl-block d-none">

      <ul class="nav navbar-nav flex-row">

        <li class="nav-item"><a class="navbar-brand" href="dashboard-analytics">

            <img src="/images/cover.png" width="150px"/>

          </a></li>

      </ul>

    </div>

    @else

      <nav

        class="header-navbar navbar-expand-lg navbar navbar-with-menu {{ $configData['navbarClass'] }} navbar-light navbar-shadow {{ $configData['navbarColor'] }}">

        @endif

        <div class="navbar-wrapper">

          <div class="navbar-container content">

            <div class="navbar-collapse justify-content-between" id="navbar-mobile">

              <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">

                <ul class="nav navbar-nav">

                  <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                      class="nav-link nav-menu-main menu-toggle hidden-xs"

                      href="#"><i class="ficon feather icon-menu"></i></a></li>

                </ul>

                <ul class="nav navbar-nav bookmark-icons">


                </ul>

                <ul class="nav navbar-nav">

                  <li class="nav-item d-none d-lg-block"><a class="nav-link bookmark-star"><i

                        class="ficon feather icon-star warning"></i></a>

                    <div class="bookmark-input search-input">

                      <div class="bookmark-input-icon"><i class="feather icon-search primary"></i></div>

                      <input class="form-control input" type="text" placeholder="Explore Tripser..." tabindex="0"

                             data-search="laravel-starter-list"/>

                      <ul class="search-list search-list-bookmark"></ul>

                    </div>

                    <!-- select.bookmark-select-->

                    <!--   option 1-Column-->

                    <!--   option 2-Column-->

                    <!--   option Static Layout-->

                  </li>

                </ul>

              </div>

              <div class="agency-back">

                <div class="agency-bar">

                  <div class="agency-nav">

                    <div class="agency-nav-item">

                      <i class="fa fa-building fa-fw"></i>

                      @role("SuperAdmin")

                      SUPER ADMIN

                      @endrole

                      @role("Agent")

                      Agency: {{Auth::user()->name}}

                      @endrole

                      @role("Branch")

                      {{User::find(Auth::user()->parent_id)->name}}

                      @endrole

                      @role("User")


                      @endrole


                    </div>
                    @role("Branch")
                    <div class="agency-nav-item">

                      <i class="fa fa-building fa-fw"></i>

                      Branch: {{Auth::user()->name}}

                    </div>
                    @endrole
                    <div class="agency-nav-item">

                      <i class="fa fa-dollar fa-fw"></i>

                      Deposit Balance: $ {{Auth::user()->balance}}

                    </div>

                    <!-- <div class="agency-nav-item">

                        <i class="fa fa-calendar fa-fw"></i>

                        Credit Days Left: 0

                    </div> -->

                    <!--<div class="agency-nav-item">

                        <button class="btn btn-sm btn--blue">Set Agency</button>

                    </div>

                  -->

                  </div>

                </div>

              </div>


              <div>

                <ul class="nav navbar-nav float-right">

                  <li class="dropdown dropdown-language nav-item">

                    <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                      <i class="flag-icon flag-icon-us"></i>

                      <span class="selected-language">English</span>

                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdown-flag">

                      <a class="dropdown-item" href="{{url('lang/en')}}" data-language="en">

                        <i class="flag-icon flag-icon-us"></i> English

                      </a>


                    </div>

                  </li>

                  <!--

                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i

                        class="ficon feather icon-maximize"></i></a>

                  </li>

                  -->


                  <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                                                                 href="#"

                                                                 data-toggle="dropdown">

                      <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">



                    {{Auth::user()->name}}

                  </span></div>
                      <span>

                  @if(empty(Auth::user()->logo))

                          <img class="round"

                               src="{{asset('images/portrait/small/user.png') }}" alt="avatar" height="40"

                               width="40"/>

                        @else

                          <img class="round"

                               src="{{asset('uploads') }}/{{Auth::user()->logo}}" alt="avatar" height="40"

                               width="40"/>

                        @endif

                    </span>

                    </a>


                    <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item"
                                                                      href="{{route('EditMyProfile')}}"><i

                          class="feather icon-user"></i> Edit Profile</a>

                      <a class="dropdown-item" href="javascript:void(0)">

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{route('logout')}}"><i

                            class="feather icon-power"></i> Logout</a>

                    </div>

                  </li>

                  {{--                  <li>--}}
                  {{--                    <div class="humberger-menu">--}}
                  {{--                      <i class="fa fa-bars"></i>--}}
                  {{--                    </div>--}}
                  {{--                  </li>--}}

                </ul>

                {{--                <div class="sidebar-menu">--}}
                {{--                  <div class="sidebar-item">--}}
                {{--                    <a href="">Dashboard</a>--}}
                {{--                  </div>--}}

                {{--                  <div class="sidebar-item">--}}
                {{--                    <a href="#">Products <i class="fa fa-chevron-right"></i></a>--}}
                {{--                    <div class="sidebar-subitem-wrapper">--}}
                {{--                      <a href="" class="sidebar-subitem">Hotels</a>--}}
                {{--                      <a href="" class="sidebar-subitem">Activities</a>--}}
                {{--                    </div>--}}
                {{--                  </div>--}}

                {{--                  <div class="sidebar-item">--}}
                {{--                    <a href="">My Bookings</a>--}}
                {{--                  </div>--}}

                {{--                  <div class="sidebar-item">--}}
                {{--                    <a href="">Tickets</a>--}}
                {{--                  </div>--}}

                {{--                  <div class="sidebar-item">--}}
                {{--                    <a href="">Reports</a>--}}
                {{--                  </div>--}}
                {{--                </div>--}}

              </div>


            </div>

          </div>

        </div>

      </nav>



      {{-- Search Start Here --}}

      <ul class="main-search-list-defaultlist d-none">

        <li class="d-flex align-items-center">

          <a class="pb-25" href="#">

            <h6 class="text-primary mb-0">Files</h6>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between w-100" href="#">

            <div class="d-flex">

              <div class="ml-0 mr-50"><img src="{{ asset('images/icons/xls.png') }}" alt="png" height="32"/>

              </div>

              <div class="search-data">

                <p class="search-data-title mb-0">Two new item submitted</p><small class="text-muted">Marketing

                  Manager</small>

              </div>

            </div>
            <small class="search-data-size mr-50 text-muted">&apos;17kb</small>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between w-100" href="#">

            <div class="d-flex">

              <div class="ml-0 mr-50"><img src="{{ asset('images/icons/jpg.png') }}" alt="png" height="32"/>

              </div>

              <div class="search-data">

                <p class="search-data-title mb-0">52 JPG file Generated</p><small class="text-muted">FontEnd

                  Developer</small>

              </div>

            </div>
            <small class="search-data-size mr-50 text-muted">&apos;11kb</small>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between w-100" href="#">

            <div class="d-flex">

              <div class="ml-0 mr-50"><img src="{{ asset('images/icons/pdf.png') }}" alt="png" height="32"/>

              </div>

              <div class="search-data">

                <p class="search-data-title mb-0">25 PDF File Uploaded</p><small class="text-muted">Digital

                  Marketing Manager</small>

              </div>

            </div>
            <small class="search-data-size mr-50 text-muted">&apos;150kb</small>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between w-100" href="#">

            <div class="d-flex">

              <div class="ml-0 mr-50"><img src="{{ asset('images/icons/doc.png') }}" alt="png" height="32"/>

              </div>

              <div class="search-data">

                <p class="search-data-title mb-0">Anna_Strong.doc</p><small class="text-muted">Web

                  Designer</small>

              </div>

            </div>
            <small class="search-data-size mr-50 text-muted">&apos;256kb</small>

          </a>

        </li>

        <li class="d-flex align-items-center">

          <a class="pb-25" href="#">

            <h6 class="text-primary mb-0">Members</h6>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">

            <div class="d-flex align-items-center">

              <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-8.jpg') }}" alt="png"

                                             height="32"/></div>

              <div class="search-data">

                <p class="search-data-title mb-0">John Doe</p><small class="text-muted">UI designer</small>

              </div>

            </div>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">

            <div class="d-flex align-items-center">

              <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-1.jpg') }}" alt="png"

                                             height="32"/></div>

              <div class="search-data">

                <p class="search-data-title mb-0">Michal Clark</p><small class="text-muted">FontEnd

                  Developer</small>

              </div>

            </div>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">

            <div class="d-flex align-items-center">

              <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-14.jpg') }}" alt="png"

                                             height="32"/></div>

              <div class="search-data">

                <p class="search-data-title mb-0">Milena Gibson</p><small class="text-muted">Digital Marketing

                  Manager</small>

              </div>

            </div>

          </a>

        </li>

        <li class="auto-suggestion d-flex align-items-center cursor-pointer">

          <a class="d-flex align-items-center justify-content-between py-50 w-100" href="#">

            <div class="d-flex align-items-center">

              <div class="avatar mr-50"><img src="{{ asset('images/portrait/small/avatar-s-6.jpg') }}" alt="png"

                                             height="32"/></div>

              <div class="search-data">

                <p class="search-data-title mb-0">Anna Strong</p><small class="text-muted">Web Designer</small>

              </div>

            </div>

          </a>

        </li>

      </ul>

      <ul class="main-search-list-defaultlist-other-list d-none">

        <li class="auto-suggestion d-flex align-items-center justify-content-between cursor-pointer">

          <a class="d-flex align-items-center justify-content-between w-100 py-50">

            <div class="d-flex justify-content-start"><span class="mr-75 feather icon-alert-circle"></span><span>No

            results found.</span></div>

          </a>

        </li>

      </ul>

    {{-- Search Ends --}}

    <!-- END: Header-->
