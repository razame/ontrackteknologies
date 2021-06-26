@extends('layouts/contentLayoutMaster')

@section('title', 'Searching')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/nouislider.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')) }}">

@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/extensions/noui-slider.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/core/colors/palette-noui.css')) }}">
  <style>

    .loading-wrapper {
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.7);
      display: flex;
      align-items: center !important;
      justify-content: center !important;
    }

    .loading {
      border-radius: 10px;
      overflow: hidden;
      background: white;
      margin: 30px auto;
      width: 85%;
    }

    .loading-header {
      background: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
      padding: 20px 25px 5px 25px;
    }

    .loading-header-item {
      width: 33%;
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .loading-header-item i {
      color: #b7afaf;
      width: 35px;
      text-align: center;
      font-size: 20px;
    }

    .origin {
      position: relative;
      padding-right: 28px;
    }

    .origin:after {
      content: "\2192";
      position: absolute;
      width: 20px;
      height: 100%;
      right: 0;
    }

    .bold-title {
      font-weight: bold;
      margin-right: 5px;
    }

    .loading-image .image-bg {
      width: 100%;
      height: 100%;
    }

    .loading-progress {
      background-color: #bb3ca3 !important;
      height: 10px !important;
      -webkit-box-shadow: none;
      box-shadow: none;
      display: block;
      position: relative;
      overflow: hidden;
      z-index: 1000;
      width: 100%;
      right: 0;
      margin: 0 auto;
    }

    @-webkit-keyframes v-indeterminate {
      0% {
        left: -35%;
        right: 100%;
      }
      60%,
      to {
        left: 100%;
        right: -90%;
      }
    }

    @keyframes v-indeterminate {
      0% {
        left: -35%;
        right: 100%;
      }
      60%,
      to {
        left: 100%;
        right: -90%;
      }
    }

    @-webkit-keyframes v-indeterminate-short {
      0% {
        left: -200%;
        right: 100%;
      }
      60%,
      to {
        left: 107%;
        right: -8%;
      }
    }

    @keyframes v-indeterminate-short {
      0% {
        left: -200%;
        right: 100%;
      }
      60%,
      to {
        left: 107%;
        right: -8%;
      }
    }

    .inner-progress {
      background-color: #dedede !important;
    }

    .inner-progress::after,
    .inner-progress::before {
      content: "";
      position: absolute;
      background-color: inherit;
      left: 0;
      will-change: left, right;
      top: 0;
      bottom: 0;
    }

    .inner-progress::after {
      -webkit-animation: v-indeterminate-short 1.7s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
      animation: v-indeterminate-short 1.7s cubic-bezier(0.165, 0.84, 0.44, 1) infinite;
      animation-delay: 0s;
      animation-delay: 0s;
      -webkit-animation-delay: 1s;
      animation-delay: 1s;
    }

    .inner-progress::before {
      -webkit-animation: v-indeterminate 1.5s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
      animation: v-indeterminate 1.5s cubic-bezier(0.65, 0.815, 0.735, 0.395) infinite;
    }

    .loader {
      position: absolute;
      width: 100%;
      height: 100%;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .img-cover {
      position: absolute;
      width: 100%;
      height: 100%;
      right: 0;
      top: 0;
      background: rgba(0, 0, 0, 0.3);
    }

    .loader img {
      width: 20%;
    }

    @media (max-width: 991px) {
      .loading {
        width: 100%;
      }
    }

    @media (max-width: 767px) {
      .loading-header {
        padding: 20px 50px 5px 0px;
      }
    }

    @media (max-width: 575px) {
      .loading-header {
        padding: 20px 10px 5px 10px;
      }

      .loading-header-item {
        width: 48%;
        height: 35px;
      }
    }

    @media (max-width: 450px) {
      .loading-header-item {
        width: 100%;
        justify-content: center;
        font-size: 11px;
        height: auto;
        margin-bottom: 5px;
        justify-content: space-between !important;
      }

      .bold-title {
        margin-right: 0;
      }

      .origin::after {
        display: none;
      }
    }

    @media (max-width: 375px) {
      body {
        font-size: 13px;
      }
    }
  </style>
@endsection
@section('content')

  <div class="loading-wrapper">
    <div class="container">
      <div class="loading">
        <!-- start loading header -->
        <div class="loading-header">
          <div class="loading-header-item"><i class="fa fa-map-marker"></i> <span
              class="bold-title">{{$data['location_details']}}</span></div>
          <div class="loading-header-item"><i class="fa fa-calendar fa-fw"></i> <span class="bold-title">{{$data['numberOfNights']}} Nights</span>
          </div>
          <div class="loading-header-item">
            <div class="origin">{{DateTime::createFromFormat('Y-m-d', $data['checkin'])->format('M d, Y')}}</div>
            <div class="destination">{{DateTime::createFromFormat('Y-m-d', $data['checkout'])->format('M d, Y')}}</div>
          </div>
          <div class="loading-header-item"><i class="fa fa-lock"></i> <span class="bold-title">{{count($data['rooms'])}} Rooms</span>
          </div>
          <div class="loading-header-item"><i class="fa fa-user"></i><span class="bold-title"> {{$data['adults_count'] }} Adults</span>
          </div>
          <div class="loading-header-item">{{$data['children_count'] }} Children</div>


        </div>
        <!-- end loading header -->

        <!-- start loading-progress -->
        <div class="loading-progress">
          <div class="inner-progress"></div>
        </div>
        <!-- end loading-progress -->

        <!-- start loading-image -->
        <div class="loading-image loading-image-parent position-relative">
          <div class="loading-image-inner">
            <img src="/images/searching/hotel-loading.png" class="img-fluid image-bg" alt=""/>
          </div>
        </div>
        <!-- end loading-image -->
      </div>
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade text-center" id="error-in-search-modal" data-keyboard="false" data-backdrop="static"
       tabindex="-1" role="dialog" aria-labelledby="error-in-search-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <svg data-v-4b8a6b86="" class="mt-2" data-v-3cfd141b="" xmlns="http://www.w3.org/2000/svg" width="44"
               height="70" viewBox="0 0 44 70" aria-labelledby="box" role="presentation"><title data-v-4b8a6b86=""
                                                                                                id="box" lang="en">box
              icon</title>
            <g data-v-4b8a6b86="" id="box" fill="currentColor">
              <g data-v-1bbf59d6="" data-v-3cfd141b="" data-v-4b8a6b86="">
                <path data-v-1bbf59d6="" fill-rule="evenodd" clip-rule="evenodd"
                      d="M34.4297 66C37.2323 63.8012 39 60.5841 39 57C39 53.1338 36.9431 49.6946 33.7489 47.5C31.5 47.5 27.5 47.5 25.5 45C23 47.5 20 47.5 17.2511 47.5C14.0569 49.6946 12 53.1338 12 57C12 60.5841 13.7677 63.8012 16.5703 66H34.4297Z"
                      fill="#F9D832"></path>
                <path data-v-1bbf59d6="" d="M26 37L15.6077 25.75L36.3923 25.75L26 37Z" fill="#F9D832"></path>
                <path data-v-1bbf59d6=""
                      d="M40.3972 62.8942H40.3206V38.3664C41.7448 37.8919 42.7735 36.5627 42.7735 35C42.7735 33.4373 41.7448 32.1081 40.3206 31.6336V7.10583H40.3972C42.3838 7.10583 44 5.51201 44 3.55292C44 1.59382 42.3838 0 40.3972 0H3.60279C1.6162 0 0 1.59382 0 3.55292C0 5.51201 1.6162 7.10583 3.60279 7.10583H3.67944V31.6336C2.25519 32.1081 1.22648 33.4373 1.22648 35C1.22648 36.5627 2.25519 37.8919 3.67944 38.3664V62.8942H3.60279C1.6162 62.8942 0 64.488 0 66.4471C0 68.4062 1.6162 70 3.60279 70H40.3972C42.3838 70 44 68.4062 44 66.4471C44 64.488 42.3838 62.8942 40.3972 62.8942ZM39.1707 36.2851C38.4522 36.2851 37.8676 35.7086 37.8676 35C37.8676 34.2914 38.4522 33.7149 39.1707 33.7149C39.8893 33.7149 40.4739 34.2914 40.4739 35C40.4739 35.7086 39.8893 36.2851 39.1707 36.2851ZM38.0209 31.6336C36.5967 32.1081 35.5679 33.4373 35.5679 35C35.5679 36.5627 36.5967 37.8919 38.0209 38.3664V62.8942H34.4394C35.8868 60.8076 36.6411 58.3147 36.6411 55.5616C36.6411 50.6892 34.2079 45.4179 29.6046 40.3173C27.4011 37.8757 25.2169 36.0313 23.9015 35C25.2169 33.9688 27.4011 32.1243 29.6046 29.6827C34.2079 24.5821 36.6411 19.3108 36.6411 14.4384C36.6411 11.6853 35.8868 9.19238 34.4394 7.10583H38.0209V31.6336ZM12.5176 62.8942C10.6463 60.968 9.65854 58.4434 9.65854 55.5616C9.65854 52.5333 10.7305 49.6261 12.2582 47.0194H18.3206C19.7934 47.0194 21.1136 46.3651 22 45.3366C22.8864 46.3651 24.2066 47.0194 25.6794 47.0194H31.7465C33.2717 49.6246 34.3415 52.5311 34.3415 55.5616C34.3415 58.4434 33.3537 60.968 31.4824 62.8942H12.5176ZM12.5176 7.10583H31.4824C33.3537 9.03197 34.3415 11.5567 34.3415 14.4384C34.3415 17.4667 33.2695 20.3739 31.7418 22.9806H12.2535C10.7283 20.3754 9.65854 17.4689 9.65854 14.4384C9.65854 11.5567 10.6463 9.03197 12.5176 7.10583ZM30.2547 25.2484C27.2729 29.3608 23.5015 32.4387 21.9994 33.5843C20.4954 32.4392 16.7214 29.3631 13.7395 25.2484H30.2547ZM25.6794 44.7516C24.2846 44.7516 23.1498 43.6325 23.1498 42.257V37.3266C24.9814 38.8317 27.8742 41.4587 30.2605 44.7516H25.6794ZM20.8502 42.257C20.8502 43.6325 19.7154 44.7516 18.3206 44.7516H13.7453C16.1305 41.4619 19.0201 38.8349 20.8502 37.3289V42.257ZM2.29965 3.55292C2.29965 2.8443 2.88422 2.26782 3.60279 2.26782H40.3972C41.1158 2.26782 41.7003 2.8443 41.7003 3.55292C41.7003 4.26153 41.1158 4.83801 40.3972 4.83801H3.60279C2.88422 4.83801 2.29965 4.26153 2.29965 3.55292ZM4.82927 33.7149C5.54783 33.7149 6.1324 34.2914 6.1324 35C6.1324 35.7086 5.54783 36.2851 4.82927 36.2851C4.1107 36.2851 3.52613 35.7086 3.52613 35C3.52613 34.2914 4.1107 33.7149 4.82927 33.7149ZM5.97909 38.3664C7.40335 37.8919 8.43206 36.5627 8.43206 35C8.43206 33.4373 7.40335 32.1081 5.97909 31.6336V7.10583H9.56057C8.11317 9.19238 7.35888 11.6853 7.35888 14.4384C7.35888 19.3108 9.79207 24.5821 14.3954 29.6827C16.5989 32.1243 18.7831 33.9688 20.0985 35C18.7831 36.0313 16.5989 37.8757 14.3954 40.3173C9.79207 45.4179 7.35888 50.6892 7.35888 55.5616C7.35888 58.3147 8.11317 60.8076 9.56057 62.8942H5.97909V38.3664ZM40.3972 67.7322H3.60279C2.88422 67.7322 2.29965 67.1557 2.29965 66.4471C2.29965 65.7385 2.88422 65.162 3.60279 65.162H40.3972C41.1158 65.162 41.7003 65.7385 41.7003 66.4471C41.7003 67.1557 41.1158 67.7322 40.3972 67.7322Z"
                      fill="#4A4A4A"></path>
              </g>
            </g>
          </svg>
          <h3 class="text-bold-600 orange mt-2">ERROR IN SEARCH</h3>
          <div>Please try again later.</div>

          <div class="text-center mt-3 mb-2">
            <a href="/B2B-reservation" class="btn btn-back-to-hotel">BACK</a>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/wNumb.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/extensions/nouislider.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jqBootstrapValidation.js')) }}"></script>


@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset(mix('js/scripts/forms/select/form-select2.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/extensions/noui-slider.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/number-input.js')) }}"></script>
  <script src="{{ asset(mix('js/scripts/forms/validation/form-validation.js')) }}"></script>

  <script>
    $.ajax
    ({
      url: '/B2B-hotels/SearchAndAvailabilityRequest/{{$reservation_search_log->id}}',
      data: {"_token": "{{ csrf_token() }}"},
      type: 'post',
      success: function (result, textStatus, xhr) {
        if (result.result == 'OK') {
          window.location.replace("/B2B-reservation/hotels/{{$reservation_search_log->id}}");
        }
      },
      error: function (error) {
        $('#error-in-search-modal').modal('show');
      }
    });
  </script>
@endsection
