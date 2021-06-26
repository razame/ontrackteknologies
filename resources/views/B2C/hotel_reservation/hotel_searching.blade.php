@extends('layouts.b2c',['internal'=>true])

@section('title', 'List')
@section('header')
  @include('B2C.includes.internal_header')
@endsection

@section('content')
  <div class="container-fluid mt-3">
    <div class="card mb-4">
      <div class="loading-wrapper">
        <div class="loading">
          <div class="loading-header">
            <div>
              <i class="fal fa-map-marker-alt fa-fw"></i> {{$data['location_details']}}
            </div>
            <div>
              <i class="fal fa-calendar-alt fa-fw"></i> {{$data['numberOfNights']}} Nights
            </div>
            <div class="loading-date">{{$data['checkin']}} <i class="fal fa-arrow-right"></i> {{$data['checkout']}}
            </div>
            <div>
              <i class="fal fa-bed fa-fw"></i> {{count($data['rooms'])}} Rooms
            </div>
            <div>
              <i class="fal fa-user fa-fw"></i> {{$data['adults_count'] }} Adults
            </div>
            <div class="loading-children">
              {{$data['children_count'] }} Children
            </div>
          </div>

          <div class="loading-progress">
            <div class="inner-progress"></div>
          </div>

          <div class="loading-img">
            <img src="/b2c/images/hotel-loading.png" class="img-fluid" alt="">
          </div>

        </div>
      </div>
    </div>
  </div>
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
            <a href="{{route('B2CIndex')}}" class="btn btn-back-to-hotel">BACK</a>
          </div>

        </div>
      </div>
    </div>
  </div>

@endsection
@section('page-script')
  <script>
    $.ajax
    ({
      url: '/SearchAndAvailabilityRequest/{{$reservation_search_log->id}}',
      data: {"_token": "{{ csrf_token() }}"},
      type: 'post',
      success: function (result, textStatus, xhr) {
        if (result.result == 'OK') {
          window.location.replace("/hotels-reservation/result/{{$reservation_search_log->id}}");
        }
      },
      error: function (error) {
        $('#error-in-search-modal').modal('show');
      }
    });
  </script>
@endsection
