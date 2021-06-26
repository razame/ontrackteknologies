@extends('layouts/contentLayoutMaster')

@section('title', 'Dashboard Analytics')

@section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
@endsection

@section('content')
  {{-- Dashboard Analytics Start --}}
  <section class="affiliate-payment-status">
    <div class="card">
      <h4 class="card-header text-bold-600 mb-1">Affiliate Payment Status</h4>
      <div class="card-body">
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="day-tab-justified" data-toggle="tab" href="#day-just" role="tab"
               aria-controls="day-just" aria-selected="true">Day</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="week-tab-justified" data-toggle="tab" href="#week-just" role="tab"
               aria-controls="week-just" aria-selected="true">Week</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="month-tab-justified" data-toggle="tab" href="#month-just" role="tab"
               aria-controls="month-just" aria-selected="false">Month</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="year-tab-justified" data-toggle="tab" href="#year-just" role="tab"
               aria-controls="year-just" aria-selected="false">Year</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content pt-1">
          <div class="tab-pane active" id="day-just" role="tabpanel" aria-labelledby="day-tab-justified">
            <div class="col-10 mx-auto">
              <div class="row">
                <div class="col-lg-4 text-center">
                  <div class="card bg-success text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-warning text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-danger text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="week-just" role="tabpanel" aria-labelledby="week-tab-justified">
            <div class="col-10 mx-auto">
              <div class="row">
                <div class="col-lg-4 text-center">
                  <div class="card bg-success text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-warning text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-danger text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="month-just" role="tabpanel" aria-labelledby="month-tab-justified">
            <div class="col-10 mx-auto">
              <div class="row">
                <div class="col-lg-4 text-center">
                  <div class="card bg-success text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-warning text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-danger text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="year-just" role="tabpanel" aria-labelledby="year-tab-justified">
            <div class="col-10 mx-auto">
              <div class="row">
                <div class="col-lg-4 text-center">
                  <div class="card bg-success text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-warning text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>

                <div class="col-lg-4 text-center">
                  <div class="card bg-danger text-white">
                    <div class="card-body">
                      <h4 class="text-white mb-3">Approved</h4>
                      <div class="d-flex justify-content-between mb-1">
                        <div>0</div>
                        <div>USD 0.00</div>
                      </div>
                    </div>
                    <div class="card-footer text-bold-600 p-1">
                      <a href="" class="text-white">View Report</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="quick-links">
    <div class="card">
      <h4 class="card-header text-bold-600 mb-1">Quick Links</h4>
      <div class="card-body">
        <ul class="list-unstyled list-inline">
          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-hotel"></i>
              </div>
              <div class="quick-text">Hotels</div>
            </a>
          </li>

          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-plane"></i>
              </div>
              <div class="quick-text">Flights</div>
            </a>
          </li>

          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-car"></i>
              </div>
              <div class="quick-text">Transfer</div>
            </a>
          </li>

          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-suitcase"></i>
              </div>
              <div class="quick-text">Tours</div>
            </a>
          </li>

          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-id-card-o"></i>
              </div>
              <div class="quick-text">My profile</div>
            </a>
          </li>

          <li class="list-inline-item">
            <a href="">
              <div class="quick-circle">
                <i class="fa fa-ticket"></i>
              </div>
              <div class="quick-text">Booking</div>
            </a>
          </li>

        </ul>
      </div>
    </div>
  </section>

  <sectin>
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <ul class="nav nav-tabs chart-tabs" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="sales-tab" data-toggle="tab" href="#sales" aria-controls="sales"
                   role="tab" aria-selected="false">Sales</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="transactions-tab" data-toggle="tab" href="#transactions"
                   aria-controls="transactions" role="tab" aria-selected="true">Transactions</a>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="sales" aria-labelledby="sales-tab" role="tabpanel">
                <div class="height-300">
                  <canvas id="line-chart"></canvas>
                </div>
              </div>
              <div class="tab-pane" id="transactions" aria-labelledby="transactions-tab" role="tabpanel">
                <div class="height-300">
                  <canvas id="line-chart2"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="card daily-sales">
          <h4 class="card-header text-bold-600 mb-1">Daily Sales Focus</h4>
          <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex justify-content-between">
              <div>Hotel (Invoiced)</div>
              <div class="text-bold-600">USD 0 (0)</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>Flight (Invoiced)</div>
              <div class="text-bold-600">USD 0 (0)</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>No. of Quotes (Hotels)</div>
              <div class="text-bold-600">0</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div>No. of Quotes (Flights)</div>
              <div class="text-bold-600">0</div>
            </li>
            <li class="list-group-item d-flex justify-content-between">
              <div></div>
              <div class="text-bold-600">Total USD 0 (0)</div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
    </section>

    <section>
      <div class="card">
        <div class="card-body">
          <ul class="nav nav-tabs chart-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="flight-tab" data-toggle="tab" href="#flight" aria-controls="flight"
                 role="tab" aria-selected="false">Flight</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="hotel-tab" data-toggle="tab" href="#hotel" aria-controls="hotel" role="tab"
                 aria-selected="true">Hotel</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="flight" aria-labelledby="flight-tab" role="tabpanel">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Flight Sales</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="horizontal-bar"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Departures</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="simple-pie-chart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Arrivals</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="simple-doughnut-chart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Sales (Departures)</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="bar-chart"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Sales (Arrivals)</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="bar-chart2"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane" id="hotel" aria-labelledby="hotel-tab" role="tabpanel">
              <div class="row">
                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top Hotels Sales</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="horizontal-bar2"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top City Sales</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="bar-chart3"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top City Searches</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="simple-pie-chart2"></canvas>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="card border">
                    <h4 class="card-header text-bold-600 mb-1">Top City Search vs Sales (Arivals)</h4>
                    <div class="card-body">
                      <div class="height-300">
                        <canvas id="bar-chart4"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="queue">
      <div class="card">
        <h4 class="card-header text-bold-600 mb-1">Booking Queue</h4>
        <div class="card-body">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="agency" class="text-bold-600">Agency</label>
                <select name="" id="agency" class="form-control">
                  <option value="">Select Agency</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="branch" class="text-bold-600">Branch</label>
                <select name="" id="branch" class="form-control">
                  <option value="">No Branch</option>
                </select>
              </div>
            </div>

            <div class="col-lg-4 col-md-4">
              <div class="form-group">
                <label for="users">Users</label>
                <select name="" id="users" class="form-control">
                  <option value="">No Users</option>
                </select>
              </div>
            </div>

            <div class="col-lg-12 mt-1">
              <ul class="nav nav-tabs chart-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="s-flight-tab" data-toggle="tab" href="#s-flight"
                     aria-controls="s-flight" role="tab" aria-selected="false">Flight</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="s-hotel-tab" data-toggle="tab" href="#s-hotel" aria-controls="s-hotel"
                     role="tab" aria-selected="true">Hotel</a>
                </li>
              </ul>
              <div class="tab-content mt-2">
                <div class="tab-pane active" id="s-flight" aria-labelledby="s-flight-tab" role="tabpanel">
                  <div class="table-responsive">
                    <table class="table table-hover services-table">
                      <tbody>
                      <tr class="bg--blue">
                        <td>
                          <div class="w-100px">Booking ID</div>
                        </td>
                        <td>
                          <div class="w-100px">Airline</div>
                        </td>
                        <td>
                          <div class="w-100px">Travel Date</div>
                        </td>
                        <td>Sector</td>
                        <td>
                          <div class="w-100px">Lead - Traveller</div>
                        </td>
                        <td>
                          <div class="w-100px">PAX</div>
                        </td>
                        <td>
                          <div class="w-100px">Price</div>
                        </td>
                      </tr>
                      <tr>
                        <td>IT20202210</td>
                        <td>Flynas</td>
                        <td>01 May 2020</td>
                        <td>DXB-JED</td>
                        <td>MR Sumit Khan</td>
                        <td>1 + 0 + 0</td>
                        <td>USD 22856.31</td>
                      </tr>
                      <tr>
                        <td>IT20202210</td>
                        <td>Flynas</td>
                        <td>01 May 2020</td>
                        <td>DXB-JED</td>
                        <td>MR Sumit Khan</td>
                        <td>1 + 0 + 0</td>
                        <td>USD 22856.31</td>
                      </tr>
                      <tr>
                        <td>IT20202210</td>
                        <td>Flynas</td>
                        <td>01 May 2020</td>
                        <td>DXB-JED</td>
                        <td>MR Sumit Khan</td>
                        <td>1 + 0 + 0</td>
                        <td>USD 22856.31</td>
                      </tr>
                      <tr>
                        <td>IT20202210</td>
                        <td>Flynas</td>
                        <td>01 May 2020</td>
                        <td>DXB-JED</td>
                        <td>MR Sumit Khan</td>
                        <td>1 + 0 + 0</td>
                        <td>USD 22856.31</td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="tab-pane" id="s-hotel" aria-labelledby="s-hotel-tab" role="tabpanel">
                  <div class="table-responsive">
                    <table class="table table-hover services-table">
                      <tbody>
                      <tr class="bg--blue">
                        <td>
                          <div class="w-100px">Booking ID</div>
                        </td>
                        <td>
                          <div class="w-100px">Hotel Name</div>
                        </td>
                        <td>
                          <div class="w-100px">Check-In</div>
                        </td>
                        <td>
                          <div class="w-100px">Check-Out</div>
                        </td>
                        <td>
                          <div class="w-100px">Lead - Guest</div>
                        </td>
                        <td>
                          <div class="w-100px">PAX</div>
                        </td>
                        <td>
                          <div class="w-100px">Price</div>
                        </td>
                      </tr>
                      <tr>
                        <td>TMH201955</td>
                        <td>Panorama Grand</td>
                        <td>25 May 2019</td>
                        <td>27 May 2019</td>
                        <td>Pappu Test</td>
                        <td>1 + 0</td>
                        <td>USD 4349.00</td>
                      </tr>
                      <tr>
                        <td>TMH201955</td>
                        <td>Panorama Grand</td>
                        <td>25 May 2019</td>
                        <td>27 May 2019</td>
                        <td>Pappu Test</td>
                        <td>1 + 0</td>
                        <td>USD 4349.00</td>
                      </tr>
                      <tr>
                        <td>TMH201955</td>
                        <td>Panorama Grand</td>
                        <td>25 May 2019</td>
                        <td>27 May 2019</td>
                        <td>Pappu Test</td>
                        <td>1 + 0</td>
                        <td>USD 4349.00</td>
                      </tr>
                      <tr>
                        <td>TMH201955</td>
                        <td>Panorama Grand</td>
                        <td>25 May 2019</td>
                        <td>27 May 2019</td>
                        <td>Pappu Test</td>
                        <td>1 + 0</td>
                        <td>USD 4349.00</td>
                      </tr>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
    </section>


  @endsection

  @section('vendor-script')
    <!-- vendor files -->
      <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
      <script src="{{ asset(mix('vendors/js/charts/chart.min.js')) }}"></script>

  @endsection
  @section('page-script')
    <!-- Page js files -->
      <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
      <script src="{{ asset(mix('js/scripts/charts/chart-chartjs.js')) }}"></script>


@endsection
