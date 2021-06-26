@extends('layouts/contentLayoutMaster')

@section('title', 'Branches')

@section('vendor-style')
  {{-- vendor files --}}
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/datatables.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/file-uploaders/dropzone.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css')) }}">
@endsection
@section('page-style')
  {{-- Page css files --}}
  <link rel="stylesheet" href="{{ asset(mix('css/plugins/file-uploaders/dropzone.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/pages/data-list-view.css')) }}">
@endsection

@section('content')
  {{-- Data list view starts --}}
  <section id="data-list-view" class="data-list-view-header">
    @if(session('success'))
      <div class='alert alert-success'>{{session('success')}}</div>
    @endif
    <div class="action-btns d-none">
      <div class="btn-dropdown mr-1 mb-1">
        <div class="btn-group dropdown actions-dropodown">
          <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Actions
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
          </div>
        </div>
      </div>
    </div>

    {{-- DataTable starts --}}
    <div class="table-responsive">
      <table class="table data-list-view">
        <thead>
        <tr>
          <th></th>
          <th>NAME</th>
          <th>EMAIL</th>
          <th>PHONE</th>
          <th>MOBILE</th>
          <th>STATUS</th>
          <th>COUNTRY</th>
          <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
          @if($user["approved"])
            <?php $color = "success" ?>
          @else
            <?php $color = "danger" ?>
          @endif
          <?php
          $arr = array('success', 'danger');
          ?>

          <tr>
            <td></td>
            <td class="product-name">{{ $user["name"] }}</td>
            <td class="product-category">{{ $user["email"] }}</td>
            <td class="product-category">{{ $user["phone_number_1"] }}</td>
            <td class="product-category">{{ $user["mobile"] }}</td>

            <td>
              <div class="chip chip-{{$color}}">
                <div class="chip-body">
                  <div class="chip-text">
                    @if($user['approved'])
                      Active
                    @else
                      Deactive
                    @endif
                  </div>
                </div>
              </div>
            </td>
            <td class="product-category">{{ $user["country"] }}</td>
            <td class="product-category">

              <a href="{{ url('B2B-Branches/'.$user["id"].'/edit') }}"
                 class="btn btn-icon btn-icon rounded-circle btn-flat-success mr-1 mb-1 waves-effect waves-light">
                <i class="feather icon-edit"></i>
              </a>
            </td>

          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
    {{-- DataTable ends --}}

    {{-- add new sidebar starts --}}
    <div class="add-new-data-sidebar">
      <div class="overlay-bg"></div>
      <div class="add-new-data">
        <form action="data-list-view" method="POST">
          @csrf
          <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
            <div>
              <h4 class="text-uppercase">List View Data</h4>
            </div>
            <div class="hide-data-sidebar">
              <i class="feather icon-x"></i>
            </div>
          </div>
          <div class="data-items pb-3">
            <div class="data-fields px-2 mt-1">
              <div class="row">
                <div class="col-sm-12 data-field-col">
                  <label for="data-name">Name</label>
                  <input type="text" class="form-control" name="name" id="data-name">
                </div>
                <div class="col-sm-12 data-field-col">
                  <label for="data-category"> Category </label>
                  <select class="form-control" name="category" id="data-category">
                    <option>Audio</option>
                    <option>Computers</option>
                    <option>Fitness</option>
                    <option>Appliance</option>
                  </select>
                </div>
                <div class="col-sm-12 data-field-col">
                  <label for="data-status">Order Status</label>
                  <select class="form-control" id="data-status" name="order_status">
                    <option>Pending</option>
                    <option>Cancelled</option>
                    <option>Delivered</option>
                    <option>On Hold</option>
                  </select>
                </div>
                <div class="col-sm-12 data-field-col">
                  <label for="data-price">Price</label>
                  <input type="text" class="form-control" name="price" id="data-price">
                </div>
                <div class="col-sm-12 data-field-col">
                  <label for="data-popularity">Popularity</label>
                  <input type="number" class="form-control" name="popularity" id="data-popularity">
                </div>
                <div class="col-sm-12 data-field-col data-list-upload">
                  <div class="dropzone dropzone-area" action="#" id="dataListUpload" name="img">
                    <div class="dz-message">Upload Image</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
            <div class="add-data-btn">
              <input type="submit" class="btn btn-primary" value="Add Data">
            </div>
            <div class="cancel-data-btn">
              <input type="reset" class="btn btn-outline-danger" value="Cancel">
            </div>
          </div>
        </form>
      </div>
    </div>
    {{-- add new sidebar ends --}}
  </section>
  {{-- Data list view end --}}
@endsection
@section('vendor-script')
  {{-- vendor js files --}}
  <script src="{{ asset(mix('vendors/js/extensions/dropzone.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.buttons.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.bootstrap4.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/buttons.bootstrap.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/dataTables.select.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/tables/datatable/datatables.checkboxes.min.js')) }}"></script>
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script>
    /*=========================================================================================
File Name: data-list-view.js
Description: List View
----------------------------------------------------------------------------------------
Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
Author: PIXINVENT
Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

    $(document).ready(function () {
      "use strict"
      // init list view datatable
      var dataListView = $(".data-list-view").DataTable({
        responsive: false,
        columnDefs: [
          {
            orderable: true,
            targets: 0,
            checkboxes: {selectRow: true}
          }
        ],
        dom:
          '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
          sLengthMenu: "_MENU_",
          sSearch: ""
        },
        aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
        select: {
          style: "multi"
        },
        order: [[1, "asc"]],
        bInfo: false,
        pageLength: 4,
        buttons: [
          {
            text: "<i class='feather icon-plus'></i> Add New Branch",
            action: function () {

              window.location.replace("/B2B-Branches/create");
            },
            className: "btn-outline-primary"
          }
        ],
        initComplete: function (settings, json) {
          $(".dt-buttons .btn").removeClass("btn-secondary")
        }
      });

      dataListView.on('draw.dt', function () {
        setTimeout(function () {
          if (navigator.userAgent.indexOf("Mac OS X") != -1) {
            $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
          }
        }, 50);
      });

      // init thumb view datatable
      var dataThumbView = $(".data-thumb-view").DataTable({
        responsive: false,
        columnDefs: [
          {
            orderable: true,
            targets: 0,
            checkboxes: {selectRow: true}
          }
        ],
        dom:
          '<"top"<"actions action-btns"B><"action-filters"lf>><"clear">rt<"bottom"<"actions">p>',
        oLanguage: {
          sLengthMenu: "_MENU_",
          sSearch: ""
        },
        aLengthMenu: [[4, 10, 15, 20], [4, 10, 15, 20]],
        select: {
          style: "multi"
        },
        order: [[1, "asc"]],
        bInfo: false,
        pageLength: 4,
        buttons: [
          {
            text: "<i class='feather icon-plus'></i> Add New",
            action: function () {
              $(this).removeClass("btn-secondary")
              $(".add-new-data").addClass("show")
              $(".overlay-bg").addClass("show")
            },
            className: "btn-outline-primary"
          }
        ],
        initComplete: function (settings, json) {
          $(".dt-buttons .btn").removeClass("btn-secondary")
        }
      })

      dataThumbView.on('draw.dt', function () {
        setTimeout(function () {
          if (navigator.userAgent.indexOf("Mac OS X") != -1) {
            $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
          }
        }, 50);
      });

      // To append actions dropdown before add new button
      var actionDropdown = $(".actions-dropodown")
      actionDropdown.insertBefore($(".top .actions .dt-buttons"))


      // Scrollbar
      if ($(".data-items").length > 0) {
        new PerfectScrollbar(".data-items", {wheelPropagation: false})
      }

      // Close sidebar
      $(".hide-data-sidebar, .cancel-data-btn, .overlay-bg").on("click", function () {
        $(".add-new-data").removeClass("show")
        $(".overlay-bg").removeClass("show")
        $("#data-name, #data-price").val("")
        $("#data-category, #data-status").prop("selectedIndex", 0)
      })

      // On Edit
      $('.action-edit').on("click", function (e) {
        e.stopPropagation();
        $('#data-name').val('Altec Lansing - Bluetooth Speaker');
        $('#data-price').val('$99');
        $(".add-new-data").addClass("show");
        $(".overlay-bg").addClass("show");
      });

      // On Delete
      $('.action-delete').on("click", function (e) {
        e.stopPropagation();
        $(this).closest('td').parent('tr').fadeOut();
      });

      // dropzone init
      Dropzone.options.dataListUpload = {
        complete: function (files) {
          var _this = this
          // checks files in class dropzone and remove that files
          $(".hide-data-sidebar, .cancel-data-btn, .actions .dt-buttons").on(
            "click",
            function () {
              $(".dropzone")[0].dropzone.files.forEach(function (file) {
                file.previewElement.remove()
              })
              $(".dropzone").removeClass("dz-started")
            }
          )
        }
      }
      Dropzone.options.dataListUpload.complete()

      // mac chrome checkbox fix
      if (navigator.userAgent.indexOf("Mac OS X") != -1) {
        $(".dt-checkboxes-cell input, .dt-checkboxes").addClass("mac-checkbox")
      }
    })

  </script>
@endsection
