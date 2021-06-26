@extends('layouts/contentLayoutMaster')

@section('title', 'Site General Settings')

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
  <div class="content-header row"></div>
  @if(session('success'))
    <div class='alert alert-success'>{{session('success')}}</div>
  @endif
  <div class="content-body">
    <div class="row">
      <div class="col-lg-12 ">
        @if(Session::has('message'))
          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
        @endif
        <div class="card">
          <h4 class='card-header'>Site General Settings</h4>
          <div class="card-body">
            <form action="{{route('SiteGeneralSettingsUpdate')}}" method="POST">
              @csrf
              <div class="table-responsive">
                <table class="table table-striped">
                  <tbody>

                  <tr>
                    <td>Site Title</td>
                    <td>
                      <input type="text" class="form-control " value="{{$site_title}}" name="site_title">
                  </tr>
                  <tr>
                    <td>Site Keywords</td>
                    <td>
                      <input type="text" class="form-control " value="{{$site_keywords}}" name="site_keywords">
                  </tr>
                  <tr>
                    <td>Site Description</td>
                    <td>
                      <input type="text" class="form-control " value="{{$site_description}}" name="site_description">
                  </tr>
                  <tr>
                    <td>Site About OnTrack</td>
                    <td>
                      <input type="text" class="form-control " value="{{$site_about_ontrack}}"
                             name="site_about_ontrack">
                  </tr>
                  <tr>
                    <td>Site Copyrights Text</td>
                    <td>
                      <input type="text" class="form-control " value="{{$site_copyrights_text}}"
                             name="site_copyrights_text">
                  </tr>
                  <tr>
                    <td>Site Maintenance Mode</td>
                    <td>
                      <select name="site_maintenance_mode" class="form-control ">
                        <option value="down" @if($site_maintenance_mode == 'down') selected @endif>On</option>
                        <option value="up" @if($site_maintenance_mode == 'up') selected @endif>Off</option>
                      </select>
                  </tr>

                  </tbody>
                </table>
              </div>

              <div>
                <button type="submit" class="btn btn-primary float-right">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
