@extends('layouts/homepage')

@section('title', $about_us['page_title'])
@section('content')

  <section>
    <div class="w-100 pt-60 position-relative">
      <div class="fixed-bg" style="background-image: url(/homepage/images/bg10.jpg);"></div>
      <div class="container">
        <div class="page-title-wrap text-center w-100 d-inline-block">
          <div class="page-title-inner d-inline-block">
            <h2 class="mb-0 text-color7">{{$about_us['page_title']}}</h2>
          </div>
          <div class="breadcrumbs-wrap w-100">
            <ul class="breadcrumbs mb-0 list-unstyled d-inline-flex">
              <li><a href="/" title="Home">Home</a></li>
              <li class="active">{{$about_us['page_title']}}</li>
            </ul><!-- Breadcrumbs -->
          </div>
        </div><!-- Page Title Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-40 pb-100 position-relative">
      <div id="particles1" class="particles-js top-left" data-color="#ffe27a" data-saturation="300" data-size="40"
           data-count="8" data-speed="2" data-hide="770" data-image="assets//"></div>
      <div class="container">
        <div class="about-wrap5 w-100">
          <div class="row align-items-center">
            <div class="col-md-7 col-sm-12 col-lg-7 order-md-1">
              <img class="img-fluid mt-40" src="/homepage/images/resources/about-mckp4.jpg" alt="About Mockup 4">
            </div>
            <div class="col-md-5 col-sm-12 col-lg-5">
              <div class="about-desc5 w-100 mt-40">
                <h2 class="mb-0">{{$about_us['page_title']}}</h2>
                <p class="mb-0">{!! $about_us['about_us'] !!}</p>
                <!-- <p class="mb-0">We are a western owned and managed travel technologies company based in United Arab Emirates with an office in CIS and Africa. Because of our local presence, our customers get the best of both worlds – the lowest prices available for Flight, hotels, cars with the highest levels of quality. Just compare us with our competition for any of our travel products. </p> -->
              </div>
            </div>
          </div>
        </div><!-- About Wrap 5 -->
      </div>
    </div>
  </section>

  <section>
    <div class="w-100 pt-100 pb-50 position-relative">
      <div id="particles2" class="particles-js top-left" data-color="#ffe27a" data-saturation="300" data-size="40"
           data-count="8" data-speed="2" data-hide="770" data-image="assets//"></div>
      <div class="container">
        <div class="sec-title2 mb-90 text-center w-100">
          <div class="d-inline-block">
            <h2 class="mb-0 text-uppercase text-color2 mini-bar"><span>our</span>Values</h2>
          </div>
        </div><!-- Section Title Style 2 -->
        <div class="blog-timeline-wrap w-100 position-relative">
          <article class="post-style3 w-100 position-relative">
            <div class="post-style3-inner w-100 bg-white d-flex flex-wrap brd-rd10 overflow-hidden">
              <div class="post-img3 w-100">
                <a class="d-block"><img src="/homepage/images/resources/post-img1-4.jpg" alt="Post Image 1"></a>
              </div>
              <div class="post-info3 w-100">
                <h3 class="mb-0"><a>MISSION</a></h3>
                <p class="mb-0">{!! $about_us['mission'] !!}</p>
                <!-- <p class="mb-0">To function with the corporate philosophy of excellence in every endeavour, to create impeccable service levels that will prove to be the corporate mantra for other industry players to emulate, to stay abreast of technology; and to be one step ahead in the deliverables that Uranus offers. </p> -->
              </div>
            </div>
          </article>
          <article class="post-style3 rev w-100 position-relative">
            <div class="post-style3-inner w-100 bg-white d-flex flex-wrap brd-rd10 overflow-hidden">
              <div class="post-img3 w-100">
                <a class="d-block"><img src="/homepage/images/resources/post-img1-3.jpg" alt="Post Image 2"></a>
              </div>
              <div class="post-info3 w-100">
                <h3 class="mb-0"><a>VISION</a></h3>
                <p class="mb-0">{!! $about_us['vision'] !!}</p>
                <!-- <p class="mb-0">To emerge as leaders and steer from the forefront of the Travel and Tourism industry, setting benchmarks that will help us raise the bar constantly, never choosing to rest on past laurels. </p> -->
              </div>
            </div>
          </article>
        </div><!-- Blog Timeline Wrap -->
      </div>
    </div>
  </section>
  <section>
    <div class="w-100 pt-50 pb-130">
      <div class="container">
        <div class="how-we-work-wrap w-100">
          <div class="row align-items-lg-center">
            <div class="col-lg-9 col-md-9">
              <div class="how-we-work-info w-100 mt-50">
                <h2 class="mb-0">VALUES</h2>
                <ul class="how-we-list mb-0 list-unstyled w-100">
                  <li>
                    <div class="how-we-item d-flex flex-wrap w-100">
                      <div class="how-we-info w-100">
                      {!! $about_us['values'] !!}
                      <!-- <p class="">Understanding the client needs and ensuring wholesome satisfaction of the customer</p>
											<p class="">Offering service levels that are par excellence</p>
											<p class="">Catering to the bespoke needs of the customer</p>
											<p class="">Introducing innovations that will lend enhanced value to the customer</p>
											<p class="">Constantly upgrading our bouquet of services to cater to changing market needs</p>
											<p class="">Using the most contemporary technology to ameliorate customer-experience</p>
											<p class="">Serving as a one-stop shop for all client needs</p>
											<p class="">Using Awards not as a destination reached, but as a milestone in the continuing journey towards further achievements</p> -->
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div><!-- How We Work Wrap -->
      </div>
    </div>
  </section>


@endsection
