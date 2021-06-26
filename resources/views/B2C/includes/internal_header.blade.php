<div class="tab-content col-lg-11 mx-auto header-tab-content">
  <div class="tab-pane active" id="flights">
    <form action="" method="POST">
      <div class="row p-2">
        <div class="col-lg-4">
          <div class="row">
            <div class="search-field col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="search-field-box select-origin">
                <div class="change-icon">
                  <i class="fa fa-exchange-alt fa-fw horizontal-exchange"></i>
                  <i class="fa fa-exchange-alt fa-rotate-90 fa-fw vertical-exchange"></i>
                </div>
                <select class="form-control select2-flight" id='origin'>
                </select>
              </div>
            </div>
            <!---->
            <div class="search-field col-lg-6 col-md-6 col-sm-6 col-12">
              <div class="search-field-box">
                <select class="form-control select2-flight" id='destination'>
                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="search-field col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="search-field-box">
            <i class="fa fa-calendar-day calendar-icon"></i>
            <i class="fa fa-times remove-return-date"></i>
            <div class="t-datepicker flight-datepicker">
              <div class="t-check-in"></div>
              <div class="t-check-out"></div>
            </div>
          </div>
        </div>
        <div class="search-field col-lg-2 col-md-3 col-sm-3 col-12">
          <div class="search-field-box select-passenger">
            <div class="select-passenger-count dropdown">
              <button type="button" class="dropdown-toggle position-relative" data-toggle="dropdown">
                <div><span class="passenger-count">1</span> passenger</div>
                <div class="text-muted passenger-flight-class">Economy</div>
                <i class="fa fa-caret-down fa-fw"></i>
              </button>
              <div class="dropdown-menu">
                <ul class="list-unstyled adults">
                  <li class="list-inline-item">
                    <div class="font-weight-bold">Adults</div>
                    <div class="text-muted">Over 12</div>
                  </li>
                  <li class="list-inline-item mt-2 text-right">
                    <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                    <div class="count-item count-number text-dark">1</div>
                    <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                  </li>
                </ul>
                <ul class="list-unstyled children">
                  <li class="list-inline-item">
                    <div class="font-weight-bold">Children</div>
                    <div class="text-muted">2 to 12 years old</div>
                  </li>
                  <li class="list-inline-item mt-2 text-right">
                    <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                    <div class="count-item count-number text-dark">0</div>
                    <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                  </li>
                </ul>
                <ul class="list-unstyled infants">
                  <li class="list-inline-item">
                    <div class="font-weight-bold">Infants</div>
                    <div class="text-muted">up to 2 years old, no place</div>
                  </li>
                  <li class="list-inline-item mt-2 text-right">
                    <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                    <div class="count-item count-number text-dark">0</div>
                    <div class="tooltipx count-item count-plus count-item-blue">
                      <i class="fa fa-plus fa-fw"></i>
                      <span class="tooltiptext">
                                                        No more than one youngster (without a seat) per adult.
                                                        if there are more babies add more passengers in the category.
                                                    </span>
                    </div>
                  </li>
                </ul>
                <div class="dropdown-divider"></div>
                <div class="custom-control custom-radio m-2">
                  <input type="radio" class="custom-control-input" id="economy" name="flight-class" checked>
                  <label class="custom-control-label" for="economy">Economy</label>
                </div>
                <div class="custom-control custom-radio m-2">
                  <input type="radio" class="custom-control-input" id="comfort" name="flight-class">
                  <label class="custom-control-label" for="comfort">Comfort</label>
                </div>
                <div class="custom-control custom-radio m-2">
                  <input type="radio" class="custom-control-input" id="business" name="flight-class">
                  <label class="custom-control-label" for="business">Business</label>
                </div>
                <div class="custom-control custom-radio m-2">
                  <input type="radio" class="custom-control-input" id="first-grade" name="flight-class">
                  <label class="custom-control-label" for="first-grade">First grade</label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-12 search-field-submit-button">
          <button class="btn search-form-submit" style="width: 100%;">Find tickets</button>
        </div>
      </div>
    </form>
  </div>
  <!---->
  <div class="tab-pane fade" id="hotels">
    <form action="{{route('B2CHotelSearching')}}" method="GET">
      @csrf
      <input type="hidden" name="client_nationality" value="AE">
      <div class="row p-2">
        <div class="col-lg-3">
          <div class="row">
            <div class="search-field col-lg-12">
              <div class="search-field-box select-hotel-box">
                <select class="form-control select2-hotel" name="location">

                </select>
              </div>
            </div>
          </div>
        </div>
        <div class="search-field col-lg-5 col-md-6 col-sm-6 col-12">
          <div class="search-field-box">
            <i class="fa fa-calendar-day calendar-icon"></i>
            <i class="fa fa-times remove-return-date"></i>
            <div class="t-datepicker hotel-datepicker">
              <div class="t-check-in"></div>
              <div class="t-check-out"></div>
            </div>
          </div>
        </div>
        <div class="search-field col-lg-2 col-md-3 col-sm-3 col-12">
          <div class="search-field-box select-guest">
            <div class="select-passenger-count dropdown">
              <button type="button" class="dropdown-toggle position-relative" data-toggle="dropdown">
                <div><span class="show-room-count">1</span> Room ,<span class="guest-count">1</span> guest</div>
                <i class="fa fa-caret-down fa-fw"></i>
              </button>
              <div class="dropdown-menu">
                <div class="room-count">
                  <div class="room-count-change room-minus btn disabled"><i class="fa fa-minus"></i></div>
                  <div class="room-count-text"><span>1</span> Room</div>
                  <div class="room-count-change room-plus btn"><i class="fa fa-plus"></i></div>
                </div>
                <div class="room-box-wrapper">
                  <div class="room-box-parent">
                    <div class="selected-room-count">Room <span>1</span></div>

                    <ul class="list-unstyled adult-guests">
                      <li class="list-inline-item">
                        <div class="font-weight-bold mt-2">Adults</div>
                      </li>
                      <li class="list-inline-item mt-2 text-right">
                        <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                        <input class="count-item guest-number text-dark" value="1" name="rooms[1][adults]">
                        <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                      </li>
                    </ul>
                    <ul class="list-unstyled children-guests">
                      <li class="list-inline-item">
                        <div class="font-weight-bold">Children</div>
                        <div class="text-muted age-notify">under 12 years old</div>
                      </li>
                      <li class="list-inline-item mt-2 text-right">
                        <div class="count-item count-minus"><i class="fa fa-minus fa-fw"></i></div>
                        <input class="count-item guest-number text-dark" value="0" name="rooms[1][children]">
                        <div class="count-item count-plus count-item-blue"><i class="fa fa-plus fa-fw"></i></div>
                      </li>
                    </ul>
                    <div class="childrens-age-box"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-2 col-md-3 col-sm-3 col-12 search-field-submit-button">
          <button class="btn search-form-submit" style="width: 100%;">Find hotels</button>
        </div>
      </div>
    </form>
  </div>
</div>
