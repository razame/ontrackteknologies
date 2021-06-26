<!-- BEGIN: Footer-->

<!------------------ FILTER BTN AND MODAL ---------------------->
<div class="filter-fix-btn">
  <button class="btn text-white" data-toggle="modal" data-target="#filter-modal"><i class="fa fa-sliders fa-fw"></i>
    Filter
  </button>
</div>
<!--MODAL-->
<div class="modal fade text-left" id="filter-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Filter</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card collapse-icon accordion-icon-rotate" style="box-shadow: none !important">
          <div class="card-body p-0">
            <div class="accordion" id="accordionFilter" data-toggle-hover="true">
              <div class="collapse-margin">
                <div class="card-header" role="button" aria-expanded="false">
                                            <span class="lead collapse-title">
                                            Hotel name
                                        </span>
                </div>

                <div id="collapseOne">
                  <div class="card-body">
                    <form action="">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="search..."
                               aria-describedby="button-addon2">
                        <div class="input-group-append" id="button-addon2">
                          <button class="btn btn-sm btn-primary search-hotel-name-btn" type="button"><i
                              class="feather icon-search"></i></button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              <div class="collapse-margin">
                <div class="card-header" role="button" aria-expanded="false">
                                            <span class="lead collapse-title">
                                            Order by
                                        </span>
                </div>

                <div id="collapseTwo">
                  <div class="card-body">
                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" class="custom-control-input" id="modal-cheap" name="order">
                      <label class="custom-control-label" for="modal-cheap">Low price</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" class="custom-control-input" id="modal-expensive" name="order">
                      <label class="custom-control-label" for="modal-expensive">High price</label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" class="custom-control-input" id="modal-low-score" name="order">
                      <label class="custom-control-label" for="modal-low-score">1 - 5 <i
                          class="fa fa-star fa-fw text-warning"></i></label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" class="custom-control-input" id="modal-high-score" name="order">
                      <label class="custom-control-label" for="modal-high-score">5 - 1 <i
                          class="fa fa-star fa-fw text-warning"></i></label>
                    </div>

                    <div class="custom-control custom-radio mb-1">
                      <input type="radio" class="custom-control-input" id="modal-alphabet" name="order">
                      <label class="custom-control-label" for="modal-alphabet">Alphabet</label>
                    </div>

                  </div>
                </div>
              </div>

              <div class="collapse-margin">
                <div class="card-header" role="button" aria-expanded="false">
                                            <span class="lead collapse-title">
                                            Category
                                        </span>
                </div>

                <div id="collapseThree">
                  <div class="card-body">
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-1star" name="rate">
                      <label class="custom-control-label" for="modal-1star">
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                      </label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-2star" name="rate">
                      <label class="custom-control-label" for="modal-2star">
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                      </label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-3star" name="rate">
                      <label class="custom-control-label" for="modal-3star">
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                      </label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-4star" name="rate">
                      <label class="custom-control-label" for="modal-4star">
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-warning"></i>
                        <i class="fa fa-star fa-fw text-muted"></i>
                      </label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-5star" name="rate">
                      <label class="custom-control-label" for="modal-5star">
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

              <div class="collapse-margin">
                <div class="card-header" role="button" aria-expanded="false">
                                            <span class="lead collapse-title">
                                            Meals
                                        </span>
                </div>

                <div id="collapseFour">
                  <div class="card-body">
                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-room-only" name="meals">
                      <label class="custom-control-label" for="modal-room-only">Room Only</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-breakfast" name="meals">
                      <label class="custom-control-label" for="modal-breakfast">Breakfast</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-halfboard" name="meals">
                      <label class="custom-control-label" for="modal-halfboard">Halfboard</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-fullboard" name="meals">
                      <label class="custom-control-label" for="modal-fullboard">Fullboard</label>
                    </div>

                    <div class="custom-control custom-checkbox mb-1">
                      <input type="checkbox" class="custom-control-input" id="modal-all" name="meals">
                      <label class="custom-control-label" for="modal-all">All inclusive</label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Filter</button>
      </div>
    </div>
  </div>
</div>

<!--------------------- MODIFY SEARCH MODAL ------------------>
<!--MODAL-->

<div class="modal fade text-left" id="modify-search-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
     aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel1">Modify search</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-lg-12 search-box">
          <form action="">
            <div class="row pr-1 pl-1">
              <div class="col-lg-12 search-field">
                <div class="form-group t-datepicker flight-datepicker mb-0">
                  <i class="feather icon-x remove-checkout"></i>
                  <div><label class="search-label text-bold-600">check in - check out</label></div>
                  <div class="t-check-in"></div>
                  <div class="t-check-out"></div>
                </div>
              </div>
              <div class="col-lg-12 search-field">
                <div class="form-group mb-0 mb-0 mb-0 mb-0 mb-0 mb-0 mb-0">
                  <label for="" class="search-label text-bold-600">City or hotel</label>
                  <select name="" class="select2-hotel select2 form-control"></select>
                </div>
              </div>
              <div class="col-lg-12 search-field">
                <div class="dropdown count-box">
                  <label for="" class="search-label text-bold-600">Occupancy</label>
                  <button class="btn btn-block dropdown-toggle bg-white text-left" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="feather icon-user"></i>
                    <span class="hotel-adult">1</span> adults, <span class="hotel-children">2</span> children, <span
                      class="hotel-rooms">3</span> rooms
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item adults-box">
                      <ul class="list-unstyled list-inline">
                        <li class="list-inline-item text-bold-600">Adults</li>
                        <li class="list-inline-item">
                          <div class="input-group input-group-sm">
                            <input type="number" class="touchspin" value="1">
                          </div>
                        </li>
                      </ul>
                    </a>

                    <a class="dropdown-item rooms-box">
                      <ul class="list-unstyled list-inline">
                        <li class="list-inline-item text-bold-600">rooms</li>
                        <li class="list-inline-item">
                          <div class="input-group input-group-sm">
                            <input type="number" class="touchspin" value="1">
                          </div>
                        </li>
                      </ul>
                    </a>

                    <a class="dropdown-item children-box">
                      <ul class="list-unstyled list-inline">
                        <li class="list-inline-item text-bold-600">children</li>
                        <li class="list-inline-item">
                          <div class="input-group input-group-sm">
                            <input type="number" class="touchspin" value="1">
                          </div>
                        </li>
                      </ul>
                    </a>

                    <div class="children-age"></div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 search-field">
                <div class="dropdown select-nationality">
                  <label for="" class="search-label text-bold-600">Nationality</label>
                  <button class="btn btn-block dropdown-toggle bg-white text-left" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>Singapore</span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item">Algania</a>
                    <a class="dropdown-item">Algeria</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 search-field">
                <div class="dropdown select-currency">
                  <label for="" class="search-label text-bold-600">Currency</label>
                  <button class="btn btn-block dropdown-toggle bg-white text-left" type="button" id="dropdownMenuButton"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span>USD</span>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item">CNY</a>
                    <a class="dropdown-item">CAD</a>
                    <a class="dropdown-item">EUR</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 search-field text-center">
                <button type="submit" class="btn has-secondary-bg search-btn">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>
@if($configData["mainLayoutType"] == 'horizontal' && isset($configData["mainLayoutType"]))
  <footer
    class="footer {{ $configData['footerType'] }} {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light navbar-shadow">
    @else
      <footer
        class="footer {{ $configData['footerType'] }}  {{($configData['footerType']=== 'footer-hidden') ? 'd-none':''}} footer-light">
        @endif
        <p class="clearfix blue-grey lighten-2 mb-0">
        <!-- <span>COPYRIGHT &copy; <?=date("Y") ?> ON TRACK TRAVEL MANAGEMENT, All rights Reserved</span> -->
          <span>{{$site_copyrights_text}}</span>
          <span
            class="float-md-right d-none d-md-block"></span>
          <button class="btn btn-primary btn-icon scroll-top" type="button"><i
              class="feather icon-arrow-up"></i></button>
        </p>
      </footer>
      <!-- END: Footer-->
