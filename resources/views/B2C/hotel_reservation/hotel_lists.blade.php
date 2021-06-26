@extends('layouts.b2c',['internal'=>true])

@section('title', 'List')
@section('header')
  @include('B2C.includes.internal_header')
@endsection

@section('content')
  <div class="hotel-top-page">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-6 col-lg-8">
          <div class="search-for">
            {{--            <div>2 adults from <strong>05 Apr 2020</strong> to <strong>08 Apr 2020</strong> (3 nights) to <strong>Istanbul,--}}
            {{--                Turkey</strong></div>--}}
          </div>
        </div>
        <div class="col-xl-6 col-lg-4 hotel-top-pages-buttons text-right">
          {{--          <button class="btn btn-map btn-show-map">Show Map</button>--}}
          {{--          <button class="btn btn-map btn-hide-map">Hide Map</button>--}}
          {{--          <a href="map-view.html" target="_blank" class="btn btn-map btn-map-view">Map View</a>--}}
        </div>
      </div>
    </div>

    <div class="map-part position-relative">
      <div class="map-colors">
        <h6 class="font-weight-bold">Price legend:</h6>
        <div><img src="/b2c/images/green-icon.png" alt="" class="mr-2 mb-1">Low price</div>
        <div><img src="/b2c/images/orange-icon.png" alt="" class="mr-2 mb-1">Medium price</div>
        <div><img src="/b2c/images/red-icon.png" alt="" class="mr-2 mb-1">High price</div>
      </div>
      <div class="mt-3" id="map" style="width: 100%; height: 400px;"></div>
      <input id="searchInput" type="text" size="50">
    </div>
  </div>

  <div class="container mt-3">
    <div class="row">
      <div class="col-lg-3 filter-col mb-3">
        <div class="filter-box position-relative">
          <i class="fa fa-times-circle fa-lg text-muted reset-filter-icon"></i>
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#filter">
                <i class="fa fa-caret-down fa-fw text-muted"></i><i class="fa fa-caret-right fa-fw text-muted"></i>Hotel
                Name
              </a>
            </div>
            <div id="filter" class="collapse show">
              <div class="card-body">
                <form action="">
                  <div class="input-group hotel-name">
                    <input type="text" class="form-control">
                    <div class="input-group-append">
                      <button class="btn" type="submit"><i class="fa fa-search fa-fw"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!---->
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#filter1">
                <i class="fa fa-caret-down fa-fw text-muted"></i><i class="fa fa-caret-right fa-fw text-muted"></i>Order
                BY
              </a>
            </div>
            <div id="filter1" class="collapse show">
              <div class="card-body">
                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" id="cheap" name="order">
                  <label class="custom-control-label" for="cheap">Low price</label>
                </div>

                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" id="expensive" name="order">
                  <label class="custom-control-label" for="expensive">High price</label>
                </div>

                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" id="low-score" name="order">
                  <label class="custom-control-label" for="low-score">1 - 5 <i
                      class="fa fa-star fa-fw text-warning"></i></label>
                </div>

                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" id="high-score" name="order">
                  <label class="custom-control-label" for="high-score">5 - 1 <i
                      class="fa fa-star fa-fw text-warning"></i></label>
                </div>

                <div class="custom-control custom-radio mb-3">
                  <input type="radio" class="custom-control-input" id="alphabet" name="order">
                  <label class="custom-control-label" for="alphabet">Alphabet</label>
                </div>
              </div>
            </div>
          </div>
          <!---->
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#filter2">
                <i class="fa fa-caret-down fa-fw text-muted"></i><i class="fa fa-caret-right fa-fw text-muted"></i>Category
              </a>
            </div>
            <div id="filter2" class="collapse show">
              <div class="card-body">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="1star" name="rate">
                  <label class="custom-control-label" for="1star">
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                  </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="2star" name="rate">
                  <label class="custom-control-label" for="2star">
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                  </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="3star" name="rate">
                  <label class="custom-control-label" for="3star">
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                  </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="4star" name="rate">
                  <label class="custom-control-label" for="4star">
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-muted"></i>
                  </label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="5star" name="rate">
                  <label class="custom-control-label" for="5star">
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                    <i class="fa fa-star fa-fw text-warning"></i>
                  </label>
                </div>

              </div>
            </div>
          </div>
          <!---->
          <div class="card">
            <div class="card-header">
              <a class="card-link" data-toggle="collapse" href="#filter3">
                <i class="fa fa-caret-down fa-fw text-muted"></i><i class="fa fa-caret-right fa-fw text-muted"></i>Meals
              </a>
            </div>
            <div id="filter3" class="collapse show">
              <div class="card-body">
                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="room-only" name="meals">
                  <label class="custom-control-label" for="room-only">Room Only</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="breakfast" name="meals">
                  <label class="custom-control-label" for="breakfast">Breakfast</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="halfboard" name="meals">
                  <label class="custom-control-label" for="halfboard">Halfboard</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="fullboard" name="meals">
                  <label class="custom-control-label" for="fullboard">Fullboard</label>
                </div>

                <div class="custom-control custom-checkbox mb-3">
                  <input type="checkbox" class="custom-control-input" id="all" name="meals">
                  <label class="custom-control-label" for="all">All inclusive</label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-9 col-md-12">
        @if(count($search_result) == 0 )

          <div class="alert alert-warning mb-3" id="error_message">

            Sorry, no results were found

          </div>

        @endif
        @foreach($search_result as $search)
          <div class="hotel-box position-relative mb-3">
            <div class="collapse-hotel">
              <i class="fa fa-caret-down fa-fw"></i>
              <i class="fa fa-caret-up fa-fw"></i>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-3 col-sm-4">
                <div class="hotel-small-pic text-center">
                  <a
                    href="/hotel-reservation/show-hotel/{{$search['hotel_code']}}/{{$search['search_id']}}/{{$search['_id']}}">
                    <img src="{{$search['hotel_images']['url']}}" class="img-fluid" style="height: 175px" alt="">
                  </a>
                </div>
              </div>
              <!---->
              <div class="col-lg-9 col-md-9 col-sm-8 pl-lg-0 pr-5 pl pl-4">
                <div class="hotel-box-title">
                  <a
                    href="/hotel-reservation/show-hotel/{{$search['hotel_code']}}/{{$search['search_id']}}/{{$search['_id']}}"
                    class="text-dark">
                    <h5>{{$search['hotel_name']}}</h5>
                  </a>
                  <div class="hotel-box-actions mr-2">
                    <ul class="list-unstyled list-inline m-0">
                      <li class="list-inline-item">
                        <div class="tooltipx"><i class="fa fa-wifi fa-fw red-icon"></i>
                          <span class="tooltiptext">Tooltip text</span>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <div class="tooltipx"><i class="fa fa-map-marker-alt fa-fw red-icon"></i>
                          <span class="tooltiptext">Tooltip text</span>
                        </div>
                      </li>
                      <li class="list-inline-item">
                        <div class="tooltipx"><i class="fa fa-directions fa-fw red-icon"></i>
                          <span class="tooltiptext">Tooltip text</span>
                        </div>
                      </li>
                      <li class="list-inline-item share">
                        <div class="tooltipx"><i class="fa fa-share-alt fa-fw red-icon"></i>
                          <span class="tooltiptext">Tooltip text</span>
                        </div>
                      </li>

                      <div class="share-box">
                        <ul class="list-unistyled pr-0 mb-0">
                          <li class="list-inline-item close-share"><i class="fa fa-times fa-fw blue "></i></li>
                          <li class="list-inline-item link-icon "><i class="fa fa-link fa-fw "></i></li>
                          <li class="list-inline-item telegram-icon "><i class="fab fa-telegram-plane fa-fw "></i></li>
                          <li class="list-inline-item twitter-icon "><i class="fab fa-twitter fa-fw "></i></li>
                          <li class="list-inline-item facebook-icon "><i class="fab fa-facebook-f fa-fw "></i></li>
                          <li class="list-inline-item wiki-icon "><i class="fab fa-wikipedia-w fa-fw "></i></li>
                        </ul>
                      </div>
                    </ul>
                    <div class="text-right stars">
                      @for($i=1 ; $i <= $search['hotel_category']; $i++)
                        <i class="fa fa-star text-warning"></i>
                      @endfor
                    </div>
                  </div>
                  <div class="text-muted hotel-location">
                    <i class="fa fa-map-marker-alt fa-fw text-warning"></i> {{$search['hotel_address']}}
                  </div>
                </div>

                <div class="hotel-box-description">
                  {{substr(strip_tags($search['hotel_description']),0,200)}} ...
                </div>

              </div>
              <div class="col-lg-12 pr-5">
                <div class="rooms">
                  <div class="table-responsive table-hover rooms-table">
                    <table class="table">
                      <tr>
                        <td>
                          <div class="table-td">
                            <img src="/b2c/images/hotel1.jpg" class="img-fluid rounded" alt="">
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <div class="rooms-col-row">
                              <h6>Double Standard Room</h6>
                            </div>
                            <div class="rooms-col-row">Breakfast Continental</div>
                            <div class="rooms-col-row"><a class="cancel-policy">Cancellation Policy</a></div>
                            <a href="info.php" class="btn book-hotel-btn btn-block">
                              <div>Book now</div>
                              <div>35.55 EUR</div>
                            </a>
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <img src="/b2c/images/hotel3.jpg" class="img-fluid rounded" alt="">
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <div class="rooms-col-row">
                              <h6>Double Standard Room</h6>
                            </div>
                            <div class="rooms-col-row">Breakfast Continental</div>
                            <div class="rooms-col-row"><a class="cancel-policy">Cancellation Policy</a></div>
                            <a href="info.php" class="btn book-hotel-btn btn-block">
                              <div>Book now</div>
                              <div>35.55 EUR</div>
                            </a>
                          </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                          <div class="table-td">
                            <img src="/b2c/images/hotel2.jpg" class="img-fluid rounded" alt="">
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <div class="rooms-col-row">
                              <h6>Double Standard Room</h6>
                            </div>
                            <div class="rooms-col-row">Breakfast Continental</div>
                            <div class="rooms-col-row"><a class="cancel-policy">Cancellation Policy</a></div>
                            <a href="info.php" class="btn book-hotel-btn btn-block">
                              <div>Book now</div>
                              <div>35.55 EUR</div>
                            </a>
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <img src="/b2c/images/hotel1.jpg" class="img-fluid rounded" alt="">
                          </div>
                        </td>
                        <td>
                          <div class="table-td">
                            <div class="rooms-col-row">
                              <h6>Double Standard Room</h6>
                            </div>
                            <div class="rooms-col-row">Breakfast Continental</div>
                            <div class="rooms-col-row"><a class="cancel-policy">Cancellation Policy</a></div>
                            <a href="info.php" class="btn book-hotel-btn btn-block">
                              <div>Book now</div>
                              <div>35.55 EUR</div>
                            </a>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
      @endforeach

      <!------ PAGINATION-->

        <ul class="pagination justify-content-center">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </div>
    </div>
  </div>

@endsection
